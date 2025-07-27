<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Criar Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <h2 class="mb-4">Criar Novo Post</h2>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('/posts/criar') ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Título do Post</label>
            <input type="text" class="form-control" name="title" id="title" required value="<?= old('title') ?>">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Conteúdo</label>
            <textarea class="form-control" name="content" id="content" rows="4" required><?= old('content') ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Imagem do Post</label>
            <input type="file" class="form-control mb-2" name="image_upload">
            <span class="form-text">Ou insira uma URL de imagem:</span>
            <input type="url" class="form-control mt-1" name="image_url" placeholder="https://exemplo.com/imagem.jpg">
        </div>

        <button type="submit" class="btn btn-primary">Publicar</button>
        <a href="<?= site_url('/posts') ?>" class="btn btn-secondary ms-2">Cancelar</a>
    </form>
</div>

</body>
</html>
