<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaPerpusModel extends Model
{
    protected $table = 'tb_bobot_perpustakaan';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_kriteria', 'bobot_kriteria'];
    protected $primaryKey = 'id';

    public function getKriteria($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    // public function getUrutan()
    // {
    //     $query = $this->builder()
    //         ->select('*')
    //         ->orderBy('nilai_optimasi', 'desc');

    //     //echo $query->getCompiledSelect(false);

    //     return $query->get()->getResult();
    // }

    public function hapus($id_buku)
    {
        return $this->where(['id_usulan' => $id_buku])->delete();
    }
}
