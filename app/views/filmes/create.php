<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Cadastrar Novo Filme</h2>
    <form action="/filmes/store" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="sinopse" class="form-label">Sinopse</label>
            <textarea class="form-control" name="sinopse" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select class="form-select" name="generos[]" id="generos" multiple required>
                <option value="">Selecione um gênero</option>
                <?php foreach ($generos as $genero): ?>
                <option value="<?php echo $genero['id']; ?>"><?php echo $genero['nome']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="capa" class="form-label">Capa do Filme</label>
            <input type="file" class="form-control" name="capa" required>
        </div>

        <div class="mb-3">
            <label for="trailer" class="form-label">Link para Trailer</label>
            <input type="url" class="form-control" name="trailer">
        </div>

        <div class="mb-3">
            <label for="data_lancamento" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control" name="data_lancamento">
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração (minutos)</label>
            <input type="number" class="form-control" name="duracao" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="/filmes" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
