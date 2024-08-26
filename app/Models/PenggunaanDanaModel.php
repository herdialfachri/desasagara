<?php

namespace App\Models;

use CodeIgniter\Model;

class PenggunaanDanaModel extends Model
{
    protected $table = 'penggunaan_dana';
    protected $primaryKey = 'id';
    protected $allowedFields = ['tanggal', 'jumlah', 'deskripsi', 'id_kategori', 'id_user', 'proyek'];

    public function getPenggunaanDana()
    {
        return $this->select('penggunaan_dana.*, kategori.nama as nama_kategori, users.username as nama_user')
                    ->join('kategori', 'kategori.id = penggunaan_dana.id_kategori')
                    ->join('users', 'users.id = penggunaan_dana.id_user')
                    ->findAll();
    }
}
