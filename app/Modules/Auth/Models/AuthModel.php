<?php 
namespace App\Modules\Auth\Models;

use CodeIgniter\Model;

class AuthModel extends Model {
    protected $table = 'users';

    public function insertData($data) {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->insert($data);
    }

    public function checkData($email, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->getWhere([
            'email' => $email,
            'password' => $password
        ])->getRow();
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}