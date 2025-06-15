<?php

namespace App\Controllers;

use App\Models\QuizModel;
use App\Models\ProfileModel;
use App\Models\QuestionModel;
use App\Models\ResponseModel;
use App\Models\ResultModel;
use CodeIgniter\Controller;

class Test extends Controller
{
    protected $quizModel;
    protected $userModel;

    public function __construct()
    {
        $this->quizModel = new QuizModel();
        $this->userModel = new ProfileModel();
        helper(['date']);
    }

    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        if (!$userId) {
            $session->setFlashdata('msg', 'Silakan login terlebih dahulu untuk mengikuti tes.');
            return redirect()->to('/login');
        }

        $user = $this->userModel->find($userId);
        if (!$user) {
            $session->setFlashdata('msg', 'Pengguna tidak ditemukan.');
            return redirect()->to('/login');
        }

        $data = [
            'content' => 'view_starter-page'
        ];
        return view('template', $data);
    }

    public function create()
    {
        $session = session();
        $userId = $session->get('user_id');
        if (!$userId) {
            $session->setFlashdata('msg', 'Silakan login terlebih dahulu untuk mengikuti tes.');
            return redirect()->to('/login');
        }

        $user = $this->userModel->find($userId);
        $dob = $user['tanggal_lahir'];

        if (!$user || empty($dob)) {
            $session->setFlashdata('msg', 'Silakan lengkapi profil kamu sebelum mengikuti tes.');
            $data = ['content' => 'view_profile', 'data' => $user];
            return view('template', $data);
        }

        $age = $this->calculateAge($dob);
        if ($age < 20 || $age > 45) {
            $session->setFlashdata('msg', 'Usia kamu belum memenuhi syarat untuk mengikuti tes.');
            $data = ['content' => 'view_profile', 'data' => $user];
            return view('template', $data);
        }

        $testData = [
            'user_id' => $userId,
            'created_at' => date('Y-m-d H:i:s'),
            'age' => $age,
        ];

        $quizId = $this->quizModel->insert($testData, true);
        return redirect()->to("/test/take/$quizId");
    }

    private function calculateAge($dob)
    {
        $birthDate = new \DateTime($dob);
        $testDate = new \DateTime();
        $age = $birthDate->diff($testDate)->y;
        return $age;
    }

    public function take($quizId, $index = 0)
    {
        $questionModel = new QuestionModel();
        $questions = $questionModel->findAll();

        if (!isset($questions[$index])) {
            return redirect()->to('/test/finish/' . $quizId);
        }

        $data = [
            'content' => 'view_test',
            'quiz_id' => $quizId,
            'index' => $index,
            'total' => count($questions),
            'question' => $questions[$index]
        ];
        return view('template', $data);
    }

    public function saveAnswer()
    {
        $responseModel = new ResponseModel();

        $quizId = $this->request->getPost('quiz_id');
        $questionId = $this->request->getPost('question_id');
        $answer = $this->request->getPost('answer');
        $index = (int)$this->request->getPost('index');
        $direction = (int)$this->request->getPost('direction');

        if ($answer === null) {
            return redirect()->to("/test/take/{$quizId}/{$index}")
                ->with('error', 'Silakan pilih jawaban terlebih dahulu.');
        }

        $questionModel = new QuestionModel();
        $question = $questionModel->find($questionId);
        $correctAnswers = json_decode($question['jawaban']);
        $isCorrect = in_array((int)$answer, $correctAnswers) ? 1 : 0;

        $existing = $responseModel
            ->where('test_id', $quizId)
            ->where('question_id', $questionId)
            ->first();

        if ($existing) {
            $responseModel->update($existing['id'], ['is_correct' => $isCorrect]);
        } else {
            $responseModel->insert([
                'test_id' => $quizId,
                'question_id' => $questionId,
                'is_correct' => $isCorrect
            ]);
        }

        return redirect()->to("/test/take/{$quizId}/" . ($index + $direction));
    }


    public function finish($quizId)
    {
        $resultModel = new ResultModel();
        $questionModel = new QuestionModel();
        $responseModel = new ResponseModel();

        $quiz = $this->quizModel->find($quizId);
        if (!$quiz) {
            return redirect()->to('/test');
        }

        $responses = $responseModel->where('test_id', $quizId)->findAll();
        $questions = $questionModel->findAll();
        $questions_per_category = [];
        foreach ($questions as $q) {
            $kategori = $q['kategori'];
            if (!isset($questions_per_category[$kategori])) {
                $questions_per_category[$kategori] = 0;
            }
            $questions_per_category[$kategori]++;
        }

        $score_test = 0;
        $correct_by_type = [];
        foreach ($questions_per_category as $kategori => $totalQ) {
            $correct_by_type[$kategori] = 0;
        }

        foreach ($responses as $res) {
            if ($res['is_correct']) {
                $score_test++;

                $question = $questionModel->find($res['question_id']);
                $kategori = $question['kategori'];

                if (!isset($correct_by_type[$kategori])) {
                    $correct_by_type[$kategori] = 0;
                }
                $correct_by_type[$kategori]++;
            }
        }

        $results = $resultModel->findAll();
        $score_sw = null;
        $result_text = null;

        foreach ($results as $r) {
            preg_match('/\[(\d+),\s*(\d+)\]/', $r['age_range'], $matches);
            $minAge = (int)$matches[1];
            $maxAge = (int)$matches[2];

            if ($quiz['age'] >= $minAge && $quiz['age'] <= $maxAge && $score_test == $r['score_test']) {
                $score_sw = $r['score_sw'];
                $result_text = $r['result'];
                break;
            }
        }

        // animalClass maps to CSS color class
        switch ($quiz['result']) {
            case 'Baik sekali':
                $animalClass = 'burunghantu';
                $animal = '🦉 Burung Hantu Analitik';
                $animalImg = 'burung_hantu.jpeg';
                $animalDesc = 'Kamu menyukai irama dan pola yang terstruktur!';
                $barColor = '#324e7b';
                break;
            case 'Baik':
                $animalClass = 'tupai';
                $animal = '🐿️ Tupai Strategis';
                $animalImg = 'tupai.jpeg';
                $animalDesc = 'Kamu menyusun strategi dalam berpikir dan cermat membaca pola!';
                $barColor = '#b79ced';
                break;
            case 'Cukup':
                $animalClass = 'rubah';
                $animal = '🦊 Rubah Cekatan';
                $animalImg = 'rubah.jpeg';
                $animalDesc = 'Cepat tanggap dan fleksibel dalam membaca deret angka!';
                $barColor = '#f78e4f';
                break;
            case 'Kurang':
                $animalClass = 'kurakura';
                $animal = '🐢 Kura-kura Tangguh';
                $animalImg = 'kurakura.jpeg';
                $animalDesc = 'Pelan tapi konsisten. Kamu kuat dalam stabilitas logika!';
                $barColor = '#4fc1b7';
                break;
            default:
                $animalClass = 'kelinci';
                $animal = '🐰 Kelinci Spontan';
                $animalImg = 'kelinci.jpeg';
                $animalDesc = 'Ceria dan aktif. Kamu punya insting cepat mengenali pola!';
                $barColor = '#ff92b2';
        }

        $bars = [];
        $iconMap = [
            'Aritmatika Dasar'     => '🔢',
            'Pola Naik Turun'      => '📈',
            'Kombinasi Logika'     => '🧩',
            'Pola Tetap Berubah'   => '🔄',
            'Pola Acak Visual'     => '🎲',
        ];

        foreach ($questions_per_category as $kategori => $totalQ) {
            $correct = $correct_by_type[$kategori] ?? 0;
            $pct = ($totalQ > 0) ? round(($correct / $totalQ) * 100) : 0;

            $bars[] = [
                'nama' => $kategori,
                'ikon' => $iconMap[$kategori] ?? '',
                'skor' => $pct,
            ];
        }

        // Update quiz
        $this->quizModel->update($quizId, [
            'score_test' => $score_test,
            'score_sw'   => $score_sw,
            'result'     => $result_text,
            'result_type' => json_encode($correct_by_type),
        ]);

        return view('template', [
            'quiz'        => $quiz,
            'bars'        => $bars,
            'animal'      => $animal,
            'animalImg'   => $animalImg,
            'animalDesc'  => $animalDesc,
            'animalClass' => $animalClass,
            'barColor'    => $barColor,
            'content'     => 'view_result'
        ]);
    }

    // public function finish($quizId)
    // {
    //     $responseModel = new ResponseModel();
    //     $questionModel = new QuestionModel();
    //     $resultModel = new ResultModel();

    //     $quiz = $this->quizModel->find($quizId);
    //     if (!$quiz) {
    //         return;
    //     }

    //     $responses = $responseModel->where('test_id', $quizId)->findAll();
    //     $score_test = 0;
    //     $correct_by_type = [];

    //     foreach ($responses as $res) {
    //         if ($res['is_correct']) {
    //             $score_test++;

    //             $question = $questionModel->find($res['question_id']);
    //             $kategori = $question['kategori'];

    //             if (!isset($correct_by_type[$kategori])) {
    //                 $correct_by_type[$kategori] = 0;
    //             }
    //             $correct_by_type[$kategori]++;
    //         }
    //     }

    //     $results = $resultModel->findAll();
    //     $score_sw = null;
    //     $result_text = null;

    //     foreach ($results as $r) {
    //         preg_match('/\[(\d+),\s*(\d+)\]/', $r['age_range'], $matches);
    //         $minAge = (int)$matches[1];
    //         $maxAge = (int)$matches[2];

    //         if ($quiz['age'] >= $minAge && $quiz['age'] <= $maxAge && $score_test == $r['score_test']) {
    //             $score_sw = $r['score_sw'];
    //             $result_text = $r['result'];
    //             break;
    //         }
    //     }

    //     $this->quizModel->update($quizId, [
    //         'score_test' => $score_test,
    //         'score_sw' => $score_sw,
    //         'result' => $result_text,
    //         'result_type' => json_encode($correct_by_type),
    //     ]);

    //     $quiz = $this->quizModel->find($quizId);
    //     $data = [
    //         'content' => 'view_result',
    //         'quiz' => $quiz,
    //         'result_type' => $correct_by_type
    //     ];
    //     return view('template', $data);
    // }
}
