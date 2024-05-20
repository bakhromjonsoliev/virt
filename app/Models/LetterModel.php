<?php
namespace App\Models;

use CodeIgniter\Model;

class LetterModel extends Model {
    protected $table = 'letters';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'type', 'content', 'status', 'admin_response', 'created_at'];

    public function createLetter($data) {
        return $this->insert($data);
    }

    public function getLetters($status = null) {
        if ($status) {
            return $this->where('status', $status)->findAll();
        }
        return $this->findAll();
    }

    public function getLetter($id) {
        return $this->find($id);
    }

    public function updateLetter($id, $data) {
        return $this->update($id, $data);
    }

    public function deleteLetter($id) {
        return $this->delete($id);
    }
}
