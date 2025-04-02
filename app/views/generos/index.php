<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class=""><i class="bi bi-list"></i> Lista de Gêneros</h2>
        
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="/generos/create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo Gênero
            </a>
        <?php endif; ?>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover text-center bg-white">
            <thead class="bg-primary text-white">
                <tr>
                    <th><i class="bi bi-bookmark"></i> Nome</th>
                    <th><i class="bi bi-card-text"></i> Descrição</th>
                    <th><i class="bi bi-gear"></i> Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($generos as $genero): ?>
                    <tr>
                        <td class="fw-bold"><?= htmlspecialchars($genero['nome']); ?></td>
                        <td><?= htmlspecialchars($genero['descricao']); ?></td>
                        <td>
                            <a href="/generos/show/<?= $genero['id']; ?>" class="btn btn-outline-info btn-sm">
                                <i class="bi bi-eye"></i> Ver
                            </a>

                            <?php if (isset($_SESSION['usuario_id'])): ?>
                                <a href="/generos/edit/<?= $genero['id']; ?>" class="btn btn-outline-primary btn-sm">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>

                                <!-- Botão para abrir modal de exclusão -->
                                <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#modalDelete<?= $genero['id']; ?>">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>

                                <!-- Modal de Confirmação -->
                                <div class="modal fade" id="modalDelete<?= $genero['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?= $genero['id']; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalLabel<?= $genero['id']; ?>">Confirmar Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Tem certeza que deseja excluir o gênero "<b><?= htmlspecialchars($genero['nome']); ?></b>"?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <a href="/generos/destroy/<?= $genero['id']; ?>" class="btn btn-danger">Excluir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
