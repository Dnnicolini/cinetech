<?php require_once '../app/views/includes/header.php'; ?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 ><i class="bi bi-film"></i> Lista de Filmes</h2>
        <?php if (isset($_SESSION['usuario_id'])): ?>
            <a href="/filmes/create" class="btn btn-success">
                <i class="bi bi-plus-circle"></i> Novo Filme
            </a>
        <?php endif; ?>
    </div>

    <form method="GET" class="mb-4 p-3 shadow-sm rounded bg-light">
        <div class="row g-2">
            <div class="col-md-6">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" name="titulo" class="form-control" placeholder="Buscar por nome..." value="<?php echo isset($_GET['titulo']) ? htmlspecialchars($_GET['titulo']) : '' ?>">
                </div>
            </div>
            <div class="col-md-4">
                <select name="genero" class="form-control">
                    <option value="">Todos os Gêneros</option>
                    <?php foreach ($generos as $genero): ?>
                        <option value="<?php echo $genero['nome'] ?>" <?php echo (isset($_GET['genero']) && $_GET['genero'] == $genero['nome']) ? 'selected' : '' ?>>
                            <?php echo htmlspecialchars($genero['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-filter"></i> Filtrar
                </button>
            </div>
        </div>
    </form>

    <div class="row">
        <?php foreach ($filmes as $filme):
            $filme['generos'] = explode(', ', $filme['generos']);
            if (!empty($_GET['titulo']) && stripos($filme['titulo'], $_GET['titulo']) === false) {
                continue;
            }
            if (!empty($_GET['genero']) && !in_array($_GET['genero'], $filme['generos'])) {
                continue;
            }
            $dataFormatada = date("d/m/Y", strtotime($filme['data_lancamento']));
        ?>
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0">
                    <img src="<?php echo htmlspecialchars($filme['capa']) ?>" class="card-img-top rounded-top" alt="Capa do Filme">
                    <div class="card-body">
                        <h5 class="card-title text-primary">
                            <i class="bi bi-camera-reels"></i> <?php echo htmlspecialchars($filme['titulo']) ?>
                        </h5>
                        <p class="card-text"><i class="bi bi-file-text"></i> <?php echo htmlspecialchars($filme['sinopse']) ?></p>
                        <p><strong><i class="bi bi-tags"></i> Gêneros:</strong> <?php echo htmlspecialchars(implode(', ', $filme['generos'])) ?></p>
                        <p><strong><i class="bi bi-clock"></i> Duração:</strong> <?php echo htmlspecialchars($filme['duracao']) ?> min</p>
                        <p><strong><i class="bi bi-calendar"></i> Lançamento:</strong> <?php echo $dataFormatada ?></p>

                        <p><strong><i class="bi bi-play-circle"></i> Trailer:</strong>
                            <a href="<?php echo htmlspecialchars($filme['trailer']) ?>" target="_blank" class="text-decoration-none text-primary">
                                Assistir <i class="bi bi-box-arrow-up-right"></i>
                            </a>
                        </p>

                        <div class="d-flex justify-content-between">
                            <a href="/filmes/show/<?php echo $filme['id']; ?>" class="btn btn-info">
                                <i class="bi bi-eye"></i> Ver Detalhes
                            </a>
                            <?php if (isset($_SESSION['usuario_id'])): ?>
                                <a href="/filmes/edit/<?php echo $filme['id']; ?>" class="btn btn-warning">
                                    <i class="bi bi-pencil-square"></i> Editar
                                </a>
                                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalExcluir<?php echo $filme['id']; ?>">
                                    <i class="bi bi-trash"></i> Excluir
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalExcluir<?php echo $filme['id']; ?>" tabindex="-1" aria-labelledby="modalLabel<?php echo $filme['id']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel<?php echo $filme['id']; ?>">Confirmar Exclusão</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Tem certeza que deseja excluir o filme "<strong><?php echo htmlspecialchars($filme['titulo']); ?></strong>"?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <a href="/filmes/destroy/<?php echo $filme['id']; ?>" class="btn btn-danger">Excluir</a>
                        </div>
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php require_once '../app/views/includes/footer.php'; ?>
