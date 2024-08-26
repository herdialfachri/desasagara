<?php

namespace App\Controllers;

use App\Models\PenggunaanDanaModel;
use App\Models\KategoriModel;
use CodeIgniter\Controller;

class PenggunaanDanaController extends Controller
{
    protected $penggunaanDanaModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->penggunaanDanaModel = new PenggunaanDanaModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['penggunaan_dana'] = $this->penggunaanDanaModel->getPenggunaanDana();
        return view('admin_dana', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_add_dana', $data);
    }

    public function store()
    {
        $user_id = session()->get('user_id'); // Mengambil ID user yang login

        $this->penggunaanDanaModel->save([
            'tanggal'     => $this->request->getPost('tanggal'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_user'     => $user_id,
            'proyek'      => $this->request->getPost('proyek'),
        ]);

        return redirect()->to('/penggunaan_dana');
    }

    public function edit($id)
    {
        $data['penggunaan_dana'] = $this->penggunaanDanaModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_edit_dana', $data);
    }

    public function update($id)
    {
        $this->penggunaanDanaModel->update($id, [
            'tanggal'     => $this->request->getPost('tanggal'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'proyek'      => $this->request->getPost('proyek'),
        ]);

        return redirect()->to('/penggunaan_dana');
    }

    public function delete($id)
    {
        $this->penggunaanDanaModel->delete($id);
        return redirect()->to('/penggunaan_dana');
    }
}
