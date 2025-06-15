<?php

namespace App\Controllers;

use App\Models\ProfileModel;
use CodeIgniter\Controller;

class Profile extends Controller
{
    protected $model;

    public function __construct()
    {
        $this->model = new ProfileModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');
        $getData = $this->model->find($userId);

        $data = [
            'content' => 'view_profile',
            'data' => $getData,
        ];
        return view('template', $data);
    }

    public function edit()
    {
        $session = session();
        $userId = $session->get('user_id');
        $getData = $this->model->find($userId);

        $data = [
            'content' => 'view_profile-edit',
            'data' => $getData,
        ];
        return view('template', $data);
    }

    public function update()
    {
        $session = session();
        $userId = $session->get('user_id');
        $data = [
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
        ];

        if ($this->model->update($userId, $data)) {
            return redirect()->to('/profile')->with('success', 'Profil berhasil diperbarui');
        }

        return redirect()->back()->with('error', 'Gagal memperbarui profil');
    }
}
