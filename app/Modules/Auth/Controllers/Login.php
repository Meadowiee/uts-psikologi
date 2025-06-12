<?php

namespace App\Modules\Auth\Controllers;

use App\Controllers\BaseController;
use App\Modules\Auth\Models\AuthModel;

class Login extends BaseController
{
    public function index() {
        helper('form');
        return view('\App\Modules\Auth\Views\v_login');
    }

    public function auth()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $role = $email === 'admin@gmail.com' ? 'admin' : 'user';

        $model = new AuthModel();
        $data = $model->checkData($email, $password);
        if ($data) {
            $sessdata = [
                'email' => $data->email,
                'logged_in' => TRUE,
                'role' => $role,
            ];
            $session->set($sessdata);
            if ($role === 'admin') return redirect()->to('/');
            return redirect()->to('/landing-page');
        } else {
            $session->setFlashdata('msg', 'Username/Password salah');
            return redirect()->to('/login');
        }
    }
}
