<?php

namespace App\Models;

use CodeIgniter\Model;

class BordaModel extends Model
{
    protected $table = 'tb_borda';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul', 'id_perpus', 'id_pemus', 'harga_buku', 'nilai_optimasi_perpustakaan', 'nilai_optimasi_pemustaka', 'hasil_borda'];
    protected $primaryKey = 'id_borda';

    public function getBuku($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_borda' => $id])->first();
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
        return $this->where(['id_borda' => $id_buku])->delete();
    }

    public function deleteAll()
    {
        return $this->emptyTable('tb_borda');
    }

    public function getRangking()
    {
        $query = $this->builder()
            ->select('*')
            ->orderBy('hasil_borda', 'desc');

        //echo $query->getCompiledSelect(false);

        return $query->get()->getResult();
    }

    public function getOptimasi()
    {
        $query = $this->builder()
            ->select('*')
            ->orderBy('nilai_optimasi_perpustakaan', 'desc');

        //echo $query->getCompiledSelect(false);

        return $query->get()->getResult();
    }
}
