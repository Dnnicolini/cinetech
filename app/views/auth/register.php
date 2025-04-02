<?php require_once '../app/views/includes/header.php'; ?>
<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Registrar</h2>
        <?php if (isset($_SESSION['erro'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['erro']; unset($_SESSION['erro']); ?>
            </div>
        <?php endif; ?>
        <form action="/register" method="POST">
            <div class="mb-3">
                <label class="form-label">Nome</label>
                <input type="text" class="form-control" name="nome" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Senha</label>
                <input type="password" class="form-control" name="senha" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Registrar</button>
            <div class="text-center mt-3">
                <a href="/auth/login">Já tem uma conta? Faça login</a>
            </div>
        </form>
    </div>
</div>
<?php require_once '../app/views/includes/footer.php'; ?>
