<?php
namespace app\models;

use app\config\Database;
use PDO;

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function cadastrar(array $dados)
    {
        if ($this->emailExiste($dados['email'])) {
            return false; // Email já cadastrado
        }

        $senhaHash = password_hash($dados['senha'], PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$dados['nome'], $dados['email'], $senhaHash]);
    }

    public function listar()
    {
        $sql = "SELECT id, nome, email FROM usuarios ORDER BY nome ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id)
    {
        $sql = "SELECT id, nome, email FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar(array $dados, int $id)
    {
        $sql = "UPDATE usuarios SET nome = ?, email = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$dados['nome'], $dados['email'], $id]);
    }

    public function excluir(int $id)
    {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([$id]);
    }

    public function autenticar(string $email, string $senha)
    {
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($senha, $usuario['senha'])) {
            return $usuario;
        }
        return false;
    }

    private function emailExiste(string $email)
    {
        $sql = "SELECT id FROM usuarios WHERE email = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        return $stmt->fetch() !== false;
    }
}
