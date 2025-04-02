<?php 

require_once '../app/views/includes/header.php';

?>

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h2 class="text-center"><i class="bi bi-pencil-square"></i> Editar Gênero</h2>
            <hr>

            <form action="/generos/update/<?= $genero['id']; ?>" method="POST">
                <div class="mb-3">
                    <label for="nome" class="form-label"><i class="bi bi-tag"></i> Nome</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($genero['nome']); ?>" name="nome" required>
                </div>

                <div class="mb-3">
                    <label for="descricao" class="form-label"><i class="bi bi-file-text"></i> Descrição</label>
                    <textarea class="form-control" name="descricao" rows="3" ><?= htmlspecialchars($genero['descricao']); ?></textarea>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Salvar Alterações</button>
                    <a href="/generos" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
