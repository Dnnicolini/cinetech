<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Lista de Filmes</h2>
    <a href="/filmes/create" class="btn btn-primary mb-3">Cadastrar Novo Filme</a>

            <?php foreach ($filmes as $filme): ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="<?= htmlspecialchars($filme['capa']) ?>" class="card-img-top" alt="<?= htmlspecialchars($filme['titulo']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($filme['titulo']) ?></h5>
                            <p class="card-text"><strong>Gêneros:</strong> <?= htmlspecialchars($filme['generos']) ?></p>
                            <p class="card-text text-truncate"> <?= htmlspecialchars($filme['sinopse']) ?> </p>
                        </div>
                        <div class="card-footer text-center">
                            <small class="text-muted">Lançamento: <?= date('d/m/Y', strtotime($filme['data_lancamento'])) ?> | Duração: <?= htmlspecialchars($filme['duracao']) ?> min</small>
                            <br>
                            <a href="<?= htmlspecialchars($filme['trailer']) ?>" class="btn btn-primary mt-2" target="_blank">Assistir Trailer</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
