<?php

namespace App\Controllers;
use App\Models\UserModel;
use App\Models\PemasukanModel;
use App\Models\PengeluaranModel;
use App\Models\PenggunaanDanaModel;
use App\Models\MasukanModel;

class DashboardController extends BaseController
{
    public function master()
    {

        $userModel = new UserModel();
        $data['jmlAkun'] = $userModel->countAllResults();
    
        return view('dashboard_master', $data);
    }

    public function admin()
    {
        $pemasukanModel = new PemasukanModel();
        $data['jmlUangMasuk'] = $pemasukanModel->countAllResults();

        $pengeluaranModel = new PengeluaranModel();
        $data['jmlUangKeluar'] = $pengeluaranModel->countAllResults();

        $pengggunaanDanaModel = new PenggunaanDanaModel();
        $data['jmlPenggunaanDana'] = $pengggunaanDanaModel->countAllResults();

        $jumlahMasukan = new MasukanModel();
        $data['jmlMasukan'] = $jumlahMasukan->countAllResults();

        return view('dashboard_admin', $data);
    }
}
