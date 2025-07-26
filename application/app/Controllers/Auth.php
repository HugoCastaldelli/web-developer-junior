<?php

namespace App\Controllers;

use App\Models\User;
use CodeIgniter\Controller;

class Auth extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $usuario = $this->request->getPost('email');
        $senha = $this->request->getPost('senha');

        // Busca pelo campo "usuario" usando o Model do CodeIgniter
        $user = (new User())->where('usuario', $usuario)->first();

        if ($user && password_verify($senha, $user->senha)) {
            // Login bem-sucedido (armazenar na sessão se desejar)
            session()->set('usuario', $user->usuario);
            return redirect()->to('/dashboard');
        }

        return redirect()->back()->withInput()->with('error', 'Usuário ou senha inválidos.');
    }

    public function register()
    {
        return view('register');
    }

    public function createAccount()
    {
        $validation = \Config\Services::validation();

        $rules = [
            'usuario' => 'required|min_length[4]|is_unique[users.usuario]',
            'senha' => 'required|min_length[6]',
            'confirmar_senha' => 'required|matches[senha]',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Cria e salva novo usuário com o Model do CodeIgniter
        $userModel = new User();
        $userModel->save([
            'usuario' => $this->request->getPost('usuario'),
            'senha' => password_hash($this->request->getPost('senha'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/')->with('success', 'Conta criada com sucesso! Faça login.');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
