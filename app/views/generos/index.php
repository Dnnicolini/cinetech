<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-4">
    <h2>Lista de Generos</h2>
    <a href="/generos/create" class="btn btn-primary mb-3">Cadastrar Novo Genero</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($filmes as $filme): ?>
                <tr>
                    <td><?= htmlspecialchars($filme['nome']); ?></td>
                    <td><?= htmlspecialchars($filme['descricao']); ?></td>
                    <td>
                        <a href="/generos/show/<?= $filme['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                        <a href="/generos/edit/<?= $filme['id']; ?>" class="btn btn-info btn-sm">Editar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
