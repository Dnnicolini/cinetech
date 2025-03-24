<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Editar Filme <?= htmlspecialchars($filme['titulo']); ?></h2>
    <form action="/filmes/update/<?= $filme['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" value="<?= htmlspecialchars($filme['titulo']); ?>" class="form-control" name="titulo" required>
        </div>

        <div class="mb-3">
            <label for="sinopse" class="form-label">Sinopse</label>
            <textarea class="form-control" value="<?= htmlspecialchars($filme['sinopse']); ?>" name="sinopse" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <input type="text" class="form-control" value="<?= htmlspecialchars($filme['genero']); ?>" name="genero" required>
        </div>

        <? if (!empty($filme['capa'])): ?>
        <img src="/uploads/<?= htmlspecialchars($filme['capa']); ?>" alt="Capa do Filme" class="img-fluid" style="max-width: 300px;">
        <input type="hidden" name="capa" value="<?= htmlspecialchars($filme['capa']); ?>">

        <? else: ?>
        <div class="mb-3">
            <label for="capa" class="form-label">Capa do Filme</label>
            <input type="file" class="form-control"  name="capa" required>
        </div>
        <? endif; ?>


        <div class="mb-3">
            <label for="trailer" class="form-label">Link para Trailer</label>
            <input type="url" class="form-control" value="<?= htmlspecialchars($filme['trailer']); ?>" name="trailer">
        </div>

        <div class="mb-3">
            <label for="data_lancamento" class="form-label">Data de Lançamento</label>
            <input type="date" class="form-control" value="<?= htmlspecialchars($filme['data_lancamento']); ?>" name="data_lancamento">
        </div>

        <div class="mb-3">
            <label for="duracao" class="form-label">Duração (minutos)</label>
            <input type="number" class="form-control"  value="<?= htmlspecialchars($filme['duracao']); ?>" name="duracao" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar</button>
        <a href="/filmes" class="btn btn-secondary">Voltar</a>
    </form>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
