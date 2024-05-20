<?php
namespace App\Controllers;

use App\Models\LetterModel;
use CodeIgniter\Controller;

class Letter extends Controller {
    public function create() {
        if (!session()->get('user_id')) {
            return redirect()->to('/user/login');
        }
        return view('create_letter');
    }

    public function createLetter() {
        $letterModel = new LetterModel();
        $data = [
            'user_id' => session()->get('user_id'),
            'type' => $this->request->getPost('type'),
            'content' => $this->request->getPost('content')
        ];
        $letterModel->createLetter($data);
        return redirect()->to('/letter/list');
    }

    public function list() {
        if (!session()->get('user_id')) {
            return redirect()->to('/user/login');
        }
        $letterModel = new LetterModel();
        $data['letters'] = $letterModel->getLetters();
        return view('list_letters', $data);
    }

    public function admin() {
        $letterModel = new LetterModel();
        $data['letters'] = $letterModel->getLetters();
        return view('admin_letters', $data);
    }

    public function markAsRead($id) {
        $letterModel = new LetterModel();
        $data = ['status' => 'read'];
        $letterModel->updateLetter($id, $data);
        return redirect()->to('/letter/admin');
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
        return redirect()->to('/letter/admin');
    }

    public function delete($id) {
        $letterModel = new LetterModel();
        $letterModel->deleteLetter($id);
        return redirect()->to('/letter/admin');
    }
}
