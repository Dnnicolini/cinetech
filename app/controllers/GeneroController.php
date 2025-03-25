<?php

namespace app\controllers;

use app\models\Genero;

class GeneroController {
    public function index() {
        $GeneroModel = new Genero();
        $generos = $GeneroModel->listar();
        include "../app/views/generos/index.php";
    }

    public function create() {
        include "../app/views/generos/create.php";
    }

    public function store() {
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
        $GeneroModel = new Genero();
        $genero = $GeneroModel->buscarPorId($id);
        include "../app/views/generos/edit.php";
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            
            $GeneroModel = new Genero();
            $GeneroModel->atualizar($nome, $descricao);
            header("Location: /generos");
        }
    }

    public function destroy($id) {
        $GeneroModel = new Genero();
        $GeneroModel->excluir($id);
        header("Location: /generos");
    }
}