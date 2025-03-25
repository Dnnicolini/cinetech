<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Cadastrar Novo Genêro</h2>
    <form action="/generos/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="/filmes" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
