<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Signup extends BaseController
{
    public function index() {
        helper('form');
        return view('\App\Modules\Auth\Views\v_signup');
    }

    public function auth()
    {
        $validation = \Config\Services::validation();
        $rules = [
            'email' => 'required',
            'password' => 'required',
        ];

        if ($this->validate($rules)) {
            $data = [
                'email' => $this->request->getPost('email'),
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
            return view('\App\Modules\Auth\Views\v_signup', $data);
        }
    }
}
