<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Editar Gênero <?= htmlspecialchars($genero['nome']); ?></h2>
    <form action="/generos/update/<?= $genero['id']; ?>" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($genero['nome']); ?>" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" name="descricao" rows="3" required>
                <?= htmlspecialchars($genero['descricao']); ?>
            </textarea>
        </div>
        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="/generos" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
