<?php

namespace App\Controllers;

use App\Models\PengeluaranModel;
use App\Models\KategoriModel;

class PengeluaranController extends BaseController
{
    protected $pengeluaranModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->pengeluaranModel = new PengeluaranModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $bulan = $this->request->getGet('bulan');
        $bulan = $bulan ? $bulan : date('Y-m'); // Default to current month if not provided

        $data['bulan'] = $bulan;
        $data['pengeluaran'] = $this->pengeluaranModel->getPengeluaranByMonth($bulan);
        return view('admin_pengeluaran', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_add_pengeluaran', $data);
    }

    public function store()
    {
        $this->pengeluaranModel->save([
            'tanggal'    => $this->request->getPost('tanggal'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/pengeluaran');
    }

    public function edit($id)
    {
        $data['pengeluaran'] = $this->pengeluaranModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_edit_pengeluaran', $data);
    }

    public function update($id)
    {
        $this->pengeluaranModel->update($id, [
            'tanggal'    => $this->request->getPost('tanggal'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/pengeluaran');
    }

    public function delete($id)
    {
        $this->pengeluaranModel->delete($id);
        return redirect()->to('/pengeluaran');
    }
}
