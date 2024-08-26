<?php

namespace App\Models;

use CodeIgniter\Model;

class PengeluaranModel extends Model
{
    protected $table = 'pengeluaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'id_kategori', 'keterangan'];

    public function getPengeluaranByMonth($bulan)
    {
        return $this->select('pengeluaran.*, kategori.nama as nama_kategori')
                    ->join('kategori', 'kategori.id = pengeluaran.id_kategori')
                    ->where('DATE_FORMAT(tanggal, "%Y-%m")', $bulan)
                    ->findAll();
    }
}
