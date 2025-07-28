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
        .posts-wrapper {
            max-width: 600px;
            margin: 0 auto;
        }
        .post-card {
            margin-bottom: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            background: #fff;
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .post-card img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: contain;
            border-radius: 8px;
            margin-bottom: 1rem;
            background: #f0f0f0;
            display: block;
        }
        .card-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
            text-align: center;
        }
        .card-text {
            text-align: justify;
            max-height: 4.5em;
            overflow: hidden;
            position: relative;
            transition: max-height 0.3s;
        }
        .card-text.expanded {
            max-height: 1000px;
        }
        .show-more {
            color: #5900ff;
            background: none;
            border: none;
            padding: 0;
            font-weight: 600;
            cursor: pointer;
            margin-top: 0.5rem;
        }
        .container.py-4 {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
    </style>
</head>

<body>

<!-- Barra de navegação -->
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-4" style="position:sticky;top:0;z-index:1100;">
  <div class="container" style="max-width: 700px;">
    <a class="navbar-brand fw-bold" href="#">Blog</a>
    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 flex-row gap-3">
      <li class="nav-item">
        <a class="nav-link<?php if (current_url() == site_url('/posts')) echo ' active'; ?>" href="<?= site_url('/') ?>">Início</a>
      </li>
      <li class="nav-item">
        <?php $usuario = session('usuario'); ?>
        <?php $nomeUsuario = $usuario ? explode('@', $usuario)[0] : ''; ?>
        <a class="nav-link<?php if (strpos(current_url(), site_url('/posts/' . urlencode($nomeUsuario))) === 0) echo ' active'; ?>" href="<?= site_url('/posts/' . urlencode($nomeUsuario)) ?>">
          Meus Posts<?= $nomeUsuario ? ' (' . esc($nomeUsuario) . ')' : '' ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link<?php if (current_url() == site_url('/posts/criar')) echo ' active'; ?>" href="<?= site_url('/posts/criar') ?>">Criar Post</a>
      </li>
    </ul>
  </div>
</nav>

<div class="container py-4">
    <div class="mb-4" style="width:100%;text-align:center;">
        <h2>Meus Posts</h2>
    </div>
    <style>
        .navbar .nav-link.active, .navbar .nav-link:focus {
            color: #fff !important;
            background: #5900ff;
            border-radius: 8px;
        }
        .navbar .nav-link {
            color: #5900ff !important;
            font-weight: 600;
            padding: 0.5rem 1.2rem;
            transition: background 0.2s, color 0.2s;
        }
        .navbar .nav-link:hover {
            background: #f0f0f0;
            color: #9900ff !important;
        }
        .navbar {
            border-bottom: 1px solid #eee;
        }
    </style>

    <div class="posts-wrapper w-100">
        <?php foreach ($posts as $post): ?>
            <div class="post-card">
                <img src="<?= esc($post['image']) ?>" alt="Imagem do Post">
                <h5 class="card-title"><?= esc($post['title']) ?></h5>
                <p class="card-text">
                    <?= esc($post['content']) ?>
                </p>
                <?php if (mb_strlen($post['content']) > 180): ?>
                    <button class="show-more" onclick="toggleDescription(this)">Ver mais</button>
                <?php endif; ?>
            </div>
        <?php endforeach ?>
    </div>
</div>

<script>
function toggleDescription(btn) {
    const text = btn.previousElementSibling;
    text.classList.toggle('expanded');
    if (text.classList.contains('expanded')) {
        btn.textContent = 'Ver menos';
    } else {
        btn.textContent = 'Ver mais';
    }
}
</script>
</body>
</html>
