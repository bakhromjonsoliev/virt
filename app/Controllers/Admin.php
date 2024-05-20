<?php
namespace App\Controllers;

use App\Models\LetterModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Admin extends Controller {

    public function login() {
        return view('admin_login');
    }

    public function loginAdmin() {
        $userModel = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
        // Add your own logic to validate admin credentials
        $admin = $userModel->login($username, $password);

        if ($admin && $admin['is_admin']) {
            session()->set('admin_id', $admin['id']);
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/admin/login');
        }
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('/admin/login');
    }

    public function dashboard() {
        $letterModel = new LetterModel();
        $data['letters'] = $letterModel->getLetters();
        return view('admin_dashboard', $data);
    }

    public function markAsRead($id) {
        $letterModel = new LetterModel();
        $data = ['status' => 'read'];
        $letterModel->updateLetter($id, $data);
        return redirect()->to('/admin/dashboard');
    }

    public function reply($id) {
        $letterModel = new LetterModel();
        $data['letter'] = $letterModel->getLetter($id);
        return view('reply_letter', $data);
    }

    public function sendReply($id) {
        $letterModel = new LetterModel();
        $data = [
            'admin_response' => $this->request->getPost('response'),
            'status' => 'read'
        ];
        $letterModel->updateLetter($id, $data);
        return redirect()->to('/admin/dashboard');
    }

    public function delete($id) {
        $letterModel = new LetterModel();
        $letterModel->deleteLetter($id);
        return redirect()->to('/admin/dashboard');
    }
}
