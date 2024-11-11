<?php

namespace App\Controllers;

use App\Models\PemasukanModel;
use App\Models\KategoriModel;
use Dompdf\Dompdf;
use Dompdf\Options;

class PemasukanController extends BaseController
{
    protected $pemasukanModel;
    protected $kategoriModel;

    public function __construct()
    {
        $this->pemasukanModel = new PemasukanModel();
        $this->kategoriModel = new KategoriModel();
    }

    public function index()
    {
        $bulan = $this->request->getGet('bulan');
        $bulan = $bulan ? $bulan : date('Y-m'); // Default to current month if not provided

        $data['bulan'] = $bulan;
        $data['pemasukan'] = $this->pemasukanModel->getPemasukanByMonth($bulan);
        return view('admin_pemasukan', $data);
    }

    public function create()
    {
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_add_pemasukan', $data);
    }

    public function store()
    {
        $this->pemasukanModel->save([
            'tanggal'    => $this->request->getPost('tanggal'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/pemasukan');
    }

    public function edit($id)
    {
        $data['pemasukan'] = $this->pemasukanModel->find($id);
        $data['kategori'] = $this->kategoriModel->findAll(); // Ambil data kategori untuk dropdown
        return view('admin_edit_pemasukan', $data);
    }

    public function update($id)
    {
        $this->pemasukanModel->update($id, [
            'tanggal'    => $this->request->getPost('tanggal'),
            'jumlah'     => $this->request->getPost('jumlah'),
            'id_kategori' => $this->request->getPost('id_kategori'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/pemasukan');
    }

    public function delete($id)
    {
        $this->pemasukanModel->delete($id);
        return redirect()->to('/pemasukan');
    }

    public function exportPdf()
    {
        // Load data dari model
        $pemasukanModel = new PemasukanModel();
        $data['pemasukan'] = $pemasukanModel->findAll();

        // Inisialisasi DomPDF
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $dompdf = new Dompdf($options);

        // Load tampilan view untuk PDF
        $html = view('pemasukanpdf', $data);

        // Load HTML ke DomPDF
        $dompdf->loadHtml($html);

        // (Opsional) Set ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');

        // Render ke PDF
        $dompdf->render();

        // Output file PDF dengan opsi langsung download
        $dompdf->stream("Laporan_Pemasukan.pdf", array("Attachment" => true));
    }
}

