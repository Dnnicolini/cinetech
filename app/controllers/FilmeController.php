<?php

namespace app\controllers;

use app\models\Filme;
use app\models\Genero;
use app\config\Helpers;


class FilmeController {

    public $generos;

    public function __construct() {
        $generoModel = new Genero();
        $this->generos = $generoModel->listar();
    }
    public function index() {
        
        $filmeModel = new Filme();
        
        $titulo = $_GET['titulo'] ?? null;
        $genero = $_GET['genero'] ?? null;
    
        $filmes = $filmeModel->listar($titulo, $genero);
        $generos = $this->generos;

        include "../app/views/filmes/index.php";
    }
    

    public function create() {
        Helpers::requireAuth(); 
        $generos = $this->generos;
        include "../app/views/filmes/create.php";
    }

    public function store() {

        Helpers::requireAuth(); 

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $capa = "";
            if (!empty($_FILES["capa"]["name"])) {
                $uploadDir = "../public/uploads/";
                $capa = '/uploads/' . basename($_FILES["capa"]["name"]);
                move_uploaded_file($_FILES["capa"]["tmp_name"], $uploadDir . basename($_FILES["capa"]["name"]));
            }

            $dados = [
                "titulo" => $_POST["titulo"],
                "sinopse" => $_POST["sinopse"],
                "capa" => $capa,
                "trailer" => $_POST["trailer"],
                "data_lancamento" => $_POST["data_lancamento"],
                "duracao" => $_POST["duracao"],
                "generos" => $_POST["generos"]
            ];
            
            $filmeModel = new Filme();
            $filmeModel->cadastrar($dados);
            header("Location: /filmes");
        }
    }

    public function show(int $id) {
        $filmeModel = new Filme();
        $filme = $filmeModel->buscarPorId($id);
        $generos = $this->generos;
        include "../app/views/filmes/show.php";
    }

    public function edit(int $id) {
        Helpers::requireAuth(); 

        $filmeModel = new Filme();
        $filme = $filmeModel->buscarPorId($id);
        $generos = $this->generos;
        $filmesGeneros = $filmeModel->listarGenerosId($id);

 
        include "../app/views/filmes/edit.php";
    }

    public function update(int $id) {

        Helpers::requireAuth(); 

        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $capa = "";
            if (!empty($_FILES["capa"]["name"])) {
                $uploadDir = "../public/uploads/";
                $capa = $uploadDir . basename($_FILES["capa"]["name"]);
                move_uploaded_file($_FILES["capa"]["tmp_name"], $capa);
            }
            
            $filmeModel = new Filme();
            $filmeModel->atualizar($_POST, $id);
            header("Location: /filmes");
        }
    }

    public function destroy(int $id) {
        Helpers::requireAuth();
        $filmeModel = new Filme();
        $filmeModel->excluir($id);
        header("Location: /filmes");
    }
}