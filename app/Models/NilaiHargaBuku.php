<?php

namespace App\Models;

use CodeIgniter\Model;

class NilaiHargaBuku extends Model
{
    protected $table = 'tb_nilai_harga_buku';
    protected $useTimestamps = false;
    protected $allowedFields = ['nilai', 'ukuran'];
    protected $primaryKey = 'id';

    public function getNilai($id = false)
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
        return $this->where(['id' => $id_buku])->delete();
    }
}
