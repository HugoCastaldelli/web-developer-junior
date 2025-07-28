<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Registrar - Meu Sistema</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(120deg, #00c6ff, #007bff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .register-card {
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>

<div class="register-card">
    <h3 class="text-center mb-4">Criar Conta</h3>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form method="post" action="<?= site_url('/registrar') ?>">
        <div class="mb-3">
            <label for="usuario" class="form-label">Usuário</label>
            <input type="text" name="usuario" class="form-control" id="usuario" required value="<?= old('usuario') ?>">
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" name="senha" class="form-control" id="senha" required>
        </div>
        <div class="mb-4">
            <label for="confirmar_senha" class="form-label">Confirmar Senha</label>
            <input type="password" name="confirmar_senha" class="form-control" id="confirmar_senha" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Criar Conta</button>
        <a href="<?= site_url('/') ?>" class="btn btn-link mt-3 w-100">Voltar para o login</a>
    </form>
</div>

</body>
</html>
