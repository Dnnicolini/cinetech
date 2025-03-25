<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    
    <p><strong>Nome:</strong> <?= htmlspecialchars($genero['nome']); ?></p>
    <p><strong>Descrição:</strong> <?= nl2br(htmlspecialchars($genero['descricao'])); ?></p>


    <a href="/generos" class="btn btn-secondary">Voltar</a>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
