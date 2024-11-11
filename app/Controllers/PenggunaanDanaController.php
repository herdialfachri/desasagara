<?php

namespace App\Controllers;

use App\Models\PenggunaanDanaModel;
use App\Models\KategoriModel;
use App\Models\UserModel;
use CodeIgniter\Controller;
use Dompdf\Dompdf;
use Dompdf\Options;

class PenggunaanDanaController extends Controller
{
    protected $penggunaanDanaModel;
    protected $kategoriModel;
    protected $userModel;

    public function __construct()
    {
        $this->penggunaanDanaModel = new PenggunaanDanaModel();
        $this->kategoriModel = new KategoriModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $data['penggunaan_dana'] = $this->penggunaanDanaModel->getPenggunaanDana();
        return view('admin_dana', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        $data['users'] = $this->userModel->findAll(); // Ambil data users untuk dropdown
        return view('admin_add_dana', $data);
    }

    public function store()
    {
        $this->penggunaanDanaModel->save([
            'tanggal'     => $this->request->getPost('tanggal'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_user'     => $this->request->getPost('id_user'),
            'proyek'      => $this->request->getPost('proyek'),
        ]);

        return redirect()->to('/penggunaan_dana');
    }

    public function edit($id)
    {
        $data['penggunaan_dana'] = $this->penggunaanDanaModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        $data['users'] = $this->userModel->findAll(); // Ambil data users untuk dropdown
        return view('admin_edit_dana', $data);
    }

    public function update($id)
    {
        $this->penggunaanDanaModel->update($id, [
            'tanggal'     => $this->request->getPost('tanggal'),
            'jumlah'      => $this->request->getPost('jumlah'),
            'deskripsi'   => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'id_user'     => $this->request->getPost('id_user'),
            'proyek'      => $this->request->getPost('proyek'),
        ]);

        return redirect()->to('/penggunaan_dana');
    }

    public function delete($id)
    {
        $this->penggunaanDanaModel->delete($id);
        return redirect()->to('/penggunaan_dana');
    }

    public function exportPdf()
    {
        // Load data dari model
        $penggunaanDanaModel = new PenggunaanDanaModel();
        $data['penggunaan_dana'] = $penggunaanDanaModel->findAll();

        // Inisialisasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Load tampilan view untuk PDF
        $html = view('penggunaanpdf', $data);

        // Load HTML ke DomPDF
        $dompdf->loadHtml($html);

        // (Opsional) Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render ke PDF
        $dompdf->render();

        // Output file PDF dengan opsi langsung download
        $dompdf->stream("Laporan_Penggunaan_Dana.pdf", array("Attachment" => true));
    }
}
