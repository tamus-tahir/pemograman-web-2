<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table      = 'tabel_mahasiswa';
    protected $primaryKey = 'id_mahasiswa';
    protected $useTimestamps    = true;
    protected $createdField     = 'mahasiswa_created_at';
    protected $updatedField     = 'mahasiswa_updated_at';
    protected $allowedFields    = ['nama', 'nim'];


    public function get()
    {
        return $this->orderBy($this->primaryKey, 'DESC')->findAll();
    }

    public function getId($id_mahasiswa)
    {
        return $this->where([$this->primaryKey => $id_mahasiswa])->first();
    }
}
