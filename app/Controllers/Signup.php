<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Signup extends BaseController
{
    public function index() {
        helper('form');
        return view('signup');
    }

    public function auth()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
            ];

            $model = new AuthModel();
            $result = $model->insertData($data);
            if ($result) {
                return redirect()->to('/login');
            } else {
                $data = ['error' => 'Data gagal tersimpan'];
            }
        } else {
            $data = ['error' => $validation->listErrors()];
            return view('signup', $data);
        }
    }
}
