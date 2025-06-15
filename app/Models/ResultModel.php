<?php

namespace App\Models;

use CodeIgniter\Model;

class ResultModel extends Model
{
    protected $table = 'result';
    protected $primaryKey = 'id';
    protected $allowedFields = ['score_test', 'score_sw', 'age_range', 'result'];
    protected $returnType = 'array';
}
