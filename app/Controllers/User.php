<?php
namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class User extends Controller {
    public function register() {
        return view('register');
    }

    public function registerUser() {
        $userModel = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => md5($this->request->getPost('password')),
            'email' => $this->request->getPost('email')
        ];
        $userModel->register($data);
        return redirect()->to('/user/login');
    }

    public function login() {
        return view('login');
    }

    public function loginUser() {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        $user = $userModel->login($username, $password);

        if ($user) {
            session()->set('user_id', $user['id']);
            return redirect()->to('/letter/create');
        } else {
            return redirect()->to('/user/login');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
