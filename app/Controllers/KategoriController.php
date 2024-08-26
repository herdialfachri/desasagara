<?php

namespace App\Controllers;

use App\Models\KategoriModel;
use CodeIgniter\Controller;

class KategoriController extends Controller
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $data['kategori'] = $this->kategoriModel->findAll();
        return view('admin_kategori', $data);
    }

    public function create()
    {
        return view('admin_add_kategori');
    }

    public function store()
    {
        $this->kategoriModel->save([
            'nama' => $this->request->getPost('nama'),
        ]);

        return redirect()->to('/kategori');
    }

    public function edit($id)
    {
        $data['kategori'] = $this->kategoriModel->find($id);
        return view('admin_edit_kategori', $data);
    }

    public function update($id)
    {
        $this->kategoriModel->update($id, [
            'nama' => $this->request->getPost('nama'),
        ]);

        return redirect()->to('/kategori');
    }

    public function delete($id)
    {
        $this->kategoriModel->delete($id);
        return redirect()->to('/kategori');
    }
}
