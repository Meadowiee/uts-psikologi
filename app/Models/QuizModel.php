<?php

namespace App\Models;

use CodeIgniter\Model;

class QuizModel extends Model
{
    protected $table = 'quiz';
    protected $primaryKey = 'id';
    protected $allowedFields = ['user_id', 'score_test', 'score_sw', 'result', 'created_at', 'age', 'result_type'];
    protected $useTimestamps = false;
    protected $returnType = 'array';

    public function getTestResults()
    {
        $userId = session()->get('user_id');
        return $this->where('user_id', $userId)
            ->where('result IS NOT NULL')
            ->where('result_type IS NOT NULL')
            ->findAll();
    }
}
