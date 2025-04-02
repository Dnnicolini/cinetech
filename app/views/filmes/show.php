<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="row g-0">
            <div class="col-md-4 text-center p-4">
                <img src="<?= htmlspecialchars($filme['capa']); ?>" alt="Capa do Filme" class="img-fluid rounded shadow" style="max-width: 100%; max-height: 400px;">
            </div>
            
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title text-primary"><i class="bi bi-film"></i> <?= htmlspecialchars($filme['titulo']); ?></h2>
                    
                    <p><strong><i class="bi bi-tags"></i> Gênero:</strong> <?= htmlspecialchars($filme['generos']); ?></p>
                    <p><strong><i class="bi bi-clock"></i> Duração:</strong> <?= $filme['duracao'] . " min"; ?></p>
                    <p><strong><i class="bi bi-calendar"></i> Lançamento:</strong> <?= date('d/m/Y', strtotime($filme['data_lancamento'])); ?></p>
                    
                    <p class="mt-3"><strong><i class="bi bi-file-text"></i> Sinopse:</strong></p>
                    <p class="text-muted"><?= nl2br(htmlspecialchars($filme['sinopse'])); ?></p>

                    <?php if (!empty($filme['trailer'])): ?>
                        <p class="mt-3">
                            <a href="<?= htmlspecialchars($filme['trailer']); ?>" target="_blank" class="btn btn-danger">
                                <i class="bi bi-play-circle"></i> Assistir Trailer
                            </a>
                        </p>
                    <?php endif; ?>

                    <div class="mt-4">
                        <a href="/filmes" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
                        <a href="/filmes/edit/<?= $filme['id']; ?>" class="btn btn-warning"><i class="bi bi-pencil-square"></i> Editar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
