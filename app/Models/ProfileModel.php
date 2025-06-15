<?php

namespace App\Models;

use CodeIgniter\Model;

class ProfileModel extends Model
{
    protected $table = 'pengguna';
    protected $primaryKey = 'id';
    protected $allowedFields = ['username', 'nama', 'tanggal_lahir', 'jenis_kelamin'];
    // protected $useTimestamps = true;
    protected $returnType = 'array';
}
