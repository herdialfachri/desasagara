<?php

namespace App\Controllers;

use App\Models\MasukanModel;

class MasukanController extends BaseController
{
    public function masukan()
    {
        $model = new MasukanModel();

        $data['masukan'] = $model->findAll();

        return view('admin_view_masukan', $data);
    }

    public function submit()
    {
        $model = new MasukanModel();

        $data = [
            'nama_pengunjung' => $this->request->getPost('nama_pengunjung'),
            'whatsapp_pengunjung' => $this->request->getPost('whatsapp_pengunjung'),
            'pesan' => $this->request->getPost('pesan'),
        ];

        $model->insert($data);

        // Setelah submit, kita bisa mengarahkan kembali ke halaman masukan atau memberikan pesan sukses
        return redirect()->to('/')->with('success', 'Masukan berhasil disimpan.');
    }
}
