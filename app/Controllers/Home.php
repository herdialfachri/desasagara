<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('index');
    }

    public function pengguna(): string
    {
        return view('master_pengguna');
    }

    public function addpengguna(): string
    {
        return view('master_add_pengguna');
    }
}
