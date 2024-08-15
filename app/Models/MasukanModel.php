<?php

namespace App\Models;

use CodeIgniter\Model;

class MasukanModel extends Model
{
    protected $table = 'masukan';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_pengunjung', 'whatsapp_pengunjung', 'pesan'];
}
