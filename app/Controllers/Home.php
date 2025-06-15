<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => 'ICT-ZR',
            'content' => 'view_landing-page',
        ];
        return view('template', $data);
    }
}
