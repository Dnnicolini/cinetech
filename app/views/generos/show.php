<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2><?= htmlspecialchars($filme['titulo']); ?></h2>
    
    <img src="/uploads/<?= htmlspecialchars($filme['capa']); ?>" alt="Capa do Filme" class="img-fluid" style="max-width: 300px;">

    <p><strong>Gênero:</strong> <?= htmlspecialchars($filme['genero']); ?></p>
    <p><strong>Duração:</strong> <?= $filme['duracao'] . " min"; ?></p>
    <p><strong>Data de Lançamento:</strong> <?= date('d/m/Y', strtotime($filme['data_lancamento'])); ?></p>
    <p><strong>Sinopse:</strong> <?= nl2br(htmlspecialchars($filme['sinopse'])); ?></p>

    <?php if (!empty($filme['trailer'])): ?>
        <p><strong>Trailer:</strong> <a href="<?= htmlspecialchars($filme['trailer']); ?>" target="_blank">Assistir</a></p>
    <?php endif; ?>

    <a href="/filmes" class="btn btn-secondary">Voltar</a>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
