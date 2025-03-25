<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Lista de Filmes</h2>
    <a href="/filmes/create" class="btn btn-primary mb-3">Cadastrar Novo Filme</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Título</th>
                <th>Gênero</th>
                <th>Duração</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
                <tr>
                    <td><?= htmlspecialchars($filme['titulo']); ?></td>
                    <td><?= htmlspecialchars($filme['generos']); ?></td>
                    <td><?= $filme['duracao'] . " min"; ?></td>
                    <td>
                        <a href="/filmes/show/<?= $filme['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="/filmes/edit/<?= $filme['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
