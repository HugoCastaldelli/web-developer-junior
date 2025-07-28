<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - Meu Sistema</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts (opcional) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(120deg, #dc2fffff, #8848ffff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-card {
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
        }

        .login-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            text-align: center;
            color: #333;
        }

        .form-label {
            font-weight: 500;
        }

        .btn-primary {
            background-color: #5900ffff;
            border: none;
            font-weight: 600;
        }

        .btn-primary:hover {
            background-color: #9900ffff;
        }

        .alert {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="login-title">Acesso ao Sistema</div>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        
        <form method="post" action="<?= site_url('/login') ?>">
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" id="email" required autofocus>
            </div>

            <div class="mb-4">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
            <div class="text-center mt-3">
                <a href="<?= site_url('/registrar') ?>" class="btn btn-outline-secondary w-100">Criar Conta</a>
            </div>

        </form>
    </div>

</body>
</html>
