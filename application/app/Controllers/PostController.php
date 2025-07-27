<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends BaseController
{
    public function index()
    {
        $posts = (new Post())->findAll();
        return view('posts/index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store()
    {
        helper(['form']);

        $rules = [
            'title'      => 'required|min_length[3]',
            'content' => 'required|min_length[5]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Determinar se é upload de imagem ou URL
        $image = null;
        $arquivo = $this->request->getFile('image_upload');
        $image_url = $this->request->getPost('image_url');

        if ($arquivo && $arquivo->isValid() && !$arquivo->hasMoved()) {
            $nomeArquivo = $arquivo->getRandomName();
            $arquivo->move('uploads/posts', $nomeArquivo);
            $image = base_url("uploads/posts/$nomeArquivo");
        } elseif (!empty($image_url)) {
            $image = $image_url;
        }

        $postModel = new Post();
        $postModel->save([
            'title' => $this->request->getPost('title'),
            'content' => $this->request->getPost('content'),
            'image' => $image ?? ''
        ]);

        return redirect()->to('/posts')->with('success', 'Post criado com sucesso!');
    }
}
