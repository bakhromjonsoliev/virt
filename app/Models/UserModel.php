<?php
namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'password', 'email'];

    public function register($data) {
        return $this->insert($data);
    }

    public function login($username, $password) {
        return $this->where(['username' => $username, 'password' => md5($password)])
                    ->first();
    }
}
