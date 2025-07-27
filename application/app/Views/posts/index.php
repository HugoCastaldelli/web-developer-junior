<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Meus Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .post-card img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Meus Posts</h2>
        <a href="<?= site_url('/posts/criar') ?>" class="btn btn-success">Criar Post</a>
    </div>

    <div class="row">
        <?php foreach ($posts as $post): ?>
            <div class="col-md-4 mb-4">
                <div class="card post-card h-100">
                    <img src="<?= esc($post['image']) ?>" class="card-img-top" alt="Imagem do Post">
                    <div class="card-body">
                        <h5 class="card-title"><?= esc($post['title']) ?></h5>
                        <p class="card-text"><?= esc($post['content']) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
