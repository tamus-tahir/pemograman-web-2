<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function profil()
    {
        return view('home/profil');
    }
}
