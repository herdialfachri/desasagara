<?php

namespace App\Controllers;

class DashboardController extends BaseController
{
    public function master()
    {
        return view('dashboard_master');
    }

    public function admin()
    {
        return view('dashboard_admin');
    }
}
