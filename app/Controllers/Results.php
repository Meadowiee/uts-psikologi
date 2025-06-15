<?php

namespace App\Controllers;

use App\Models\QuizModel;

class Results extends BaseController
{
    public function index()
    {
        $quizModel = new QuizModel();
        $getData = $quizModel->getTestResults();
        $data = [
            'results' => $getData,
            'content' => 'view_result-table',
        ];
        return view('template', $data);
    }
}
