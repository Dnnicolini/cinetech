<?php
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CINETECH</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/main.css">
  <style>
    .navbar {
      background-color: #343a40 !important;
    }

    .navbar-brand,
    .nav-link {
      color: #ffffff !important;
    }

    .navbar-toggler {
      border-color: rgba(255, 255, 255, 0.1);
    }

    .navbar-toggler-icon {
      filter: invert(1);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a class="navbar-brand" href="#">CineTech</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/filmes">Filmes</a>
          </li>
          <?php if (isset($_SESSION['usuario_id'])): ?>
          <li class="nav-item">
            <a class="nav-link" href="/generos">Gêneros</a>
          </li>

          <li class="nav-item">
            <form id="logout-form" action="/logout" method="POST" style="display: inline;">
              <button type="submit" class="btn btn-outline-danger">
                <i class="bi bi-box-arrow-right"></i> Sair
              </button>
            </form>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link btn btn-primary" href="/auth/login">
              <i class="bi bi-person"></i> Login
            </a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <div class="body">