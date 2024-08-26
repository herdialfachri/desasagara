<?php

namespace App\Models;

use CodeIgniter\Model;

class PemasukanModel extends Model
{
    protected $table = 'pemasukan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'id_kategori', 'keterangan'];

    public function getPemasukanByMonth($bulan)
    {
        return $this->select('pemasukan.*, kategori.nama as nama_kategori')
                    ->join('kategori', 'kategori.id = pemasukan.id_kategori')
                    ->where('DATE_FORMAT(tanggal, "%Y-%m")', $bulan)
                    ->findAll();
    }
}
