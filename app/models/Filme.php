<?php 

include "../config/database.php";

class Filme {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function cadastrar($titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao) {
        $sql = "INSERT INTO filmes (titulo, sinopse, genero, capa, trailer, data_lancamento, duracao) VALUES (?, ?,?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao]);
        $filme_id = $this->db->lastInsertId();
        
      
    }

    public function listar() {
        $sql = "SELECT * FROM filmes";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM filmes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao) {
        $sql = "UPDATE filmes SET titulo = ?, sinopse = ?, genero = ?, capa = ?, trailer = ?, data_lancamento = ?, duracao = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao, $id]);

    }

    public function excluir($id) {
        $sql = "DELETE FROM filmes WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }
}