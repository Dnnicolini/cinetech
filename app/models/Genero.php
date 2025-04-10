<?php 

namespace app\Models;

use app\config\Database;
use PDO;
class Genero {

    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function cadastrar($nome, $descricao) {
        $sql = "INSERT INTO generos (nome, descricao) VALUES (?, ?)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nome, $descricao]);
        $filme_id = $this->db->lastInsertId();
    
    }

    public function listar() {
        $sql = "SELECT * FROM generos";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function buscarPorId(int $id) {
        $sql = "SELECT * FROM generos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function atualizar($id, $nome, $descricao) {
        $sql = "UPDATE generos SET nome = ?, descricao = ? WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$nome, $descricao, $id]); 
    }
    

    public function excluir(int $id) {
        $sql = "DELETE FROM generos WHERE id = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
    }

}