<?php

namespace App\Models;

use CodeIgniter\Model;

class UsulanModel extends Model
{
    protected $table = 'tb_pemustaka';
    protected $useTimestamps = false;
    protected $allowedFields = ['judul_usulan', 'pengarang_usulan', 'penerbit_usulan', 'jumlah_penerbit', 'tahun_terbit_usulan', 'tanggal_usulan', 'nomor_anggota', 'jumlah_kunjungan', 'jumlah_meminjam_buku', 'jumlah_usulan', 'nilai_optimasi', 'borda_pemus'];
    protected $primaryKey = 'id_usulan';

    public function getBuku($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_usulan' => $id])->first();
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

    public function deleteAll()
    {
        return $this->emptyTable('tb_pengadaan_buku_perpustakaan');
    }

    public function getRangking()
    {
        $query = $this->builder()
            ->select('*')
            ->orderBy('nilai_optimasi', 'desc');

        //echo $query->getCompiledSelect(false);

        return $query->get()->getResult();
    }
}
