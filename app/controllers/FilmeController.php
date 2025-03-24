<?php

include "../app/models/Filme.php";



class FilmeController {
    public function index() {
        $filmeModel = new Filme();
        $filmes = $filmeModel->listar();
        include "../app/views/filmes/index.php";
    }

    public function create() {
        include "../app/views/filmes/create.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titulo = $_POST["titulo"];
            $sinopse = $_POST["sinopse"];
            $genero = $_POST["genero"];
            $trailer = $_POST["trailer"];
            $dataLancamento = $_POST["data_lancamento"];
            $duracao = $_POST["duracao"];
            
            // Upload da Capa
            $capa = "";
            if (!empty($_FILES["capa"]["name"])) {
                $uploadDir = "../public/uploads/";
                $capa = $uploadDir . basename($_FILES["capa"]["name"]);
                move_uploaded_file($_FILES["capa"]["tmp_name"], $capa);
            }
            
            $filmeModel = new Filme();
            $filmeModel->cadastrar($titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao);
            header("Location: /filmes");
        }
    }

    public function show($id) {
        $filmeModel = new Filme();
        $filme = $filmeModel->buscarPorId($id);
        include "../app/views/filmes/show.php";
    }

    public function edit($id) {
        $filmeModel = new Filme();
        $filme = $filmeModel->buscarPorId($id);
        include "../app/views/filmes/edit.php";
    }

    public function update($id) {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $titulo = $_POST["titulo"];
            $sinopse = $_POST["sinopse"];
            $genero = $_POST["genero"];
            $trailer = $_POST["trailer"];
            $dataLancamento = $_POST["data_lancamento"];
            $duracao = $_POST["duracao"];
            
            // Upload da Capa
            $capa = "";
            if (!empty($_FILES["capa"]["name"])) {
                $uploadDir = "../public/uploads/";
                $capa = $uploadDir . basename($_FILES["capa"]["name"]);
                move_uploaded_file($_FILES["capa"]["tmp_name"], $capa);
            }
            
            $filmeModel = new Filme();
            $filmeModel->atualizar($id, $titulo, $sinopse, $genero, $capa, $trailer, $dataLancamento, $duracao);
            header("Location: /filmes");
        }
    }

    public function destroy($id) {
        $filmeModel = new Filme();
        $filmeModel->excluir($id);
        header("Location: /filmes");
    }
}