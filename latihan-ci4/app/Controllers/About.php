<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index($param = 'Unitama', $nama = null)
    {
        echo "Ini Halaman About Dari " . $param . ' Nama Saya ' . $nama;
    }
}
