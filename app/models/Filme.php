<?php
namespace app\Models;

use app\config\Database;
use PDO;

class Filme
{

    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function cadastrar(array $dados)
    {
        $sql  = "INSERT INTO filmes (titulo, sinopse, capa, trailer, data_lancamento, duracao) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$dados['titulo'], $dados['sinopse'], $dados['capa'], $dados['trailer'], $dados['data_lancamento'], $dados['duracao']]);

        $filme_id = $this->db->lastInsertId();

        $this->saveGeneros($dados['generos'], $filme_id);
    }
    public function listar($titulo = null, $genero = null)
    {
        $sql = "
            SELECT
                f.id,
                f.titulo,
                f.sinopse,
                f.capa,
                f.trailer,
                f.data_lancamento,
                f.duracao
            FROM filmes f
            JOIN filmes_generos fg ON f.id = fg.filme_id
            JOIN generos g ON fg.genero_id = g.id
        ";
    
        $where = [];
        $params = [];
    
        if (!empty($titulo)) {
            $where[] = "f.titulo LIKE :titulo";
            $params[':titulo'] = "%$titulo%";
        }
    
        if (!empty($genero)) {
            $where[] = "g.nome = :genero";
            $params[':genero'] = $genero;
        }
    
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }
    
        $sql .= " GROUP BY f.id ORDER BY f.titulo ASC";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);
        $filmes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        foreach ($filmes as &$filme) {
            $stmt = $this->db->prepare("
                SELECT GROUP_CONCAT(DISTINCT g.nome ORDER BY g.nome SEPARATOR ', ') AS generos
                FROM generos g
                JOIN filmes_generos fg ON g.id = fg.genero_id
                WHERE fg.filme_id = :filme_id
            ");
            $stmt->execute([':filme_id' => $filme['id']]);
            $filme['generos'] = $stmt->fetchColumn();
        }
    
        return $filmes;
    }
    
    
    
    
    public function buscarPorId(int $id)
    {
        $sql = "
            SELECT
                f.id,
                f.titulo,
                f.sinopse,
                f.capa,
                f.trailer,
                f.data_lancamento,
                f.duracao,
                GROUP_CONCAT(g.nome SEPARATOR ', ') AS generos
            FROM filmes f
            LEFT JOIN filmes_generos fg ON f.id = fg.filme_id
            LEFT JOIN generos g ON fg.genero_id = g.id
            WHERE f.id = ?
            GROUP BY f.id
        ";

        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(array $dados, int $id)
    {
        $sql  = "UPDATE filmes SET titulo = ?, sinopse = ?, capa = ?, trailer = ?, data_lancamento = ?, duracao = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$dados['titulo'], $dados['sinopse'], $dados['capa'], $dados['trailer'], $dados['dataLancamento'], $dados['duracao'], $id]);

    }

    public function excluir(int $id)
    {
        $sql  = "DELETE FROM filmes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

    public function listarGenerosId(int $id)
    {
        $sql  = "SELECT genero_id FROM filmes_generos WHERE filme_id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);

        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'genero_id');
    }

    private function saveGeneros(array $generos, int $filme_id)
    {
        $sql  = "INSERT INTO filmes_generos (filme_id, genero_id) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        foreach ($generos as $genero_id) {
            $stmt->execute([$filme_id, $genero_id]);
        }
    }

}
