<?php

namespace App\Controllers;

use App\Models\UserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function logout()
    {
        $session = \Config\Services::session();
        $session->remove('loggedIn');
        $session->remove('id');
        $session->remove('name');
        $session->remove('username');
        $session->remove('role');
        $session->setFlashdata('success', 'Successfully logout!');

        return redirect()->to('/');
    }

    public function login()
    {
        $session = \Config\Services::session();
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = (string) $this->request->getPost('password');

        $user = $model
            ->where('username', $username)
            ->first();

        if (!$user) {
            $data = [
                'error' => 'Invalid username or password'
            ];
            return view('login', $data);
            // throw new \Exception("User not found!");
        }

        if (md5($password) != $user['password']) {
            $data = [
                'error' => 'Invalid username or password'
            ];
            return view('/', $data);
            // throw new \Exception("Credentials is invalid!");
        }

        $session->set('id', $user['id']);
        $session->set('name', $user['name']);
        $session->set('username', $user['username']);
        $session->set('role', $user['role']);
        $session->set('loggedIn', true);

        return redirect()->to('/admin/users');
    }

    public function register()
    {

        return view('register');
    }

    public function form()
    {
        $model = new UserModel();
        $pw = (string) $this->request->getPost('password');

        $payload = [
            "name" => $this->request->getPost('name'),
            "username" => $this->request->getPost('username'),
            "password" =>  md5($pw),
            "role" => 'USER',
        ];


        $model->insert($payload);
        return redirect()->to('/');
    }
}
