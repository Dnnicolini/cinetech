<?php 

require_once '../app/views/includes/header.php';

?>

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h2 class="text-center text-success">Novo Filme</h2>
            <hr>

            <form action="/filmes/store" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="titulo" class="form-label"><i class="bi bi-type"></i> Título</label>
                            <input type="text" class="form-control" name="titulo" required>
                        </div>

                        <div class="mb-3">
                            <label for="sinopse" class="form-label"><i class="bi bi-file-text"></i> Sinopse</label>
                            <textarea class="form-control" name="sinopse" rows="4" required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="genero" class="form-label"><i class="bi bi-tags"></i> Gênero</label>
                            <select class="form-select" name="generos[]" id="generos" multiple required>
                                <?php foreach ($generos as $genero): ?>
                                    <option value="<?php echo $genero['id']; ?>"><?php echo $genero['nome']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="trailer" class="form-label"><i class="bi bi-play-circle"></i> Link para Trailer</label>
                            <input type="url" class="form-control" name="trailer">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="capa" class="form-label"><i class="bi bi-image"></i> Capa do Filme</label>
                            <input type="file" class="form-control" name="capa" id="capa" required onchange="previewCapa()">
                            <div class="mt-3 text-center">
                                <img id="preview" src="" class="img-fluid rounded shadow" style="max-width: 200px; display: none;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="data_lancamento" class="form-label"><i class="bi bi-calendar"></i> Data de Lançamento</label>
                            <input type="date" class="form-control" name="data_lancamento">
                        </div>

                        <div class="mb-3">
                            <label for="duracao" class="form-label"><i class="bi bi-clock"></i> Duração (minutos)</label>
                            <input type="number" class="form-control" name="duracao" required>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-success"><i class="bi bi-check-circle"></i> Cadastrar</button>
                    <a href="/filmes" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Voltar</a>
                </div>
            </form>
        </div>
    </div>
</div>



<?php require_once '../app/views/includes/footer.php'; ?>
