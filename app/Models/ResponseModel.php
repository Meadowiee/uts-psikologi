<?php

namespace App\Models;

use CodeIgniter\Model;

class ResponseModel extends Model
{
    protected $table = 'response';
    protected $primaryKey = 'id';
    protected $allowedFields = ['test_id', 'question_id', 'is_correct'];
    protected $returnType = 'array';
}
