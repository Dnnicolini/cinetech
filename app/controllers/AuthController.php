<?php

namespace app\controllers;

use app\models\Usuario;

class AuthController {

    public function loginView() {
        include "../app/views/auth/login.php";
    }
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();

            $email = trim($_POST["email"]);
            $senha = trim($_POST["senha"]);

            $UsuarioModel = new Usuario();
            $usuario = $UsuarioModel->autenticar($email, $senha);

            if ($usuario) {
                $_SESSION['usuario_id'] = $usuario['id'];
                $_SESSION['usuario_nome'] = $usuario['nome'];
                header("Location: /filmes");
                exit;
            } else {
                $_SESSION['erro'] = "Email ou senha incorretos.";
                header("Location: /auth/login");
                exit;
            }
        }
    }

    public function logout() {
        Helpers::requireAuth();
        session_start();
        session_destroy();
        header("Location: /auth/login");
        exit;
    }

    public function create() {
        include "../app/views/auth/register.php";
    }

    public function store() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            session_start();

            $dados = [
                "nome" => $_POST["nome"],
                "email" => $_POST["email"],
                "senha" => $_POST["senha"],
            ];
     
            $UsuarioModel = new Usuario();
            if ($UsuarioModel->cadastrar($dados)) {
                $_SESSION['sucesso'] = "Cadastro realizado com sucesso. Faça login!";
                header("Location: /auth/login");
                exit;
            } else {
                $_SESSION['erro'] = "Erro ao registrar.";
                header("Location: /auth/register");
                exit;
            }
        }
    }
}
