<?php

namespace App\Modules\LandingPage\Controllers;

use App\Controllers\BaseController;

class LandingPage extends BaseController
{
    public function index() {
        return view('\App\Modules\LandingPage\Views\v_landing-page');
    }
}