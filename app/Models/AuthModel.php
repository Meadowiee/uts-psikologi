<?php 
namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model {
    protected $table = 'pengguna';

    public function insertData($data) {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->insert($data);
    }

    public function checkData($username, $password) {
        $db = \Config\Database::connect();
        $builder = $db->table($this->table);
        return $builder->getWhere([
            'username' => $username,
            'password' => $password
        ])->getRow();
    }

    public function logout() {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}