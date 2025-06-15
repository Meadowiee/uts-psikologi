<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Login extends BaseController
{
    public function index() {
        helper('form');
        return view('login');
    }

    public function auth()
    {
        $session = session();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new AuthModel();
        $data = $model->checkData($username, $password);
        if ($data) {
            $sessdata = [
                'username' => $data->username,
                'user_id' => $data->id,
                'logged_in' => TRUE,
            ];
            $session->set($sessdata);
            return redirect()->to('/');
        } else {
            $session->setFlashdata('msg', 'Username/Password salah');
            return redirect()->to('/login');
        }
    }
}
