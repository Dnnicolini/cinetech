<?php

namespace app\controllers;

use app\models\Genero;
use app\config\Helpers;

class GeneroController {
    public function index() {
        $GeneroModel = new Genero();
        $generos = $GeneroModel->listar();
        include "../app/views/generos/index.php";
    }

    public function create() {
        Helpers::requireAuth();
        include "../app/views/generos/create.php";
    }

    public function store() {
        Helpers::requireAuth();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];            
            $GeneroModel = new Genero();
            $GeneroModel->cadastrar($nome, $descricao);
            header("Location: /generos");
        }
    }

    public function show($id) {
        $GeneroModel = new Genero();
        $genero = $GeneroModel->buscarPorId($id);
        include "../app/views/generos/show.php";
    }

    public function edit($id) {
        Helpers::requireAuth();
        $GeneroModel = new Genero();
        $genero = $GeneroModel->buscarPorId($id);
        include "../app/views/generos/edit.php";
    }

    public function update($id) {
        Helpers::requireAuth();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            
            $GeneroModel = new Genero();
            $GeneroModel->atualizar($id, $nome, $descricao);
            header("Location: /generos");
            exit;
        }
    }
    public function destroy($id) {
        Helpers::requireAuth();
        $GeneroModel = new Genero();
        $GeneroModel->excluir($id);
        header("Location: /generos");
    }
}