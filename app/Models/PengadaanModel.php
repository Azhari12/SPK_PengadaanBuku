<?php

namespace App\Models;

use CodeIgniter\Model;

class PengadaanModel extends Model
{
    protected $table = 'tb_pengadaan_buku_perpustakaan';
    protected $useTimestamps = false;
    protected $allowedFields = ['nomor', 'judul_buku', 'anggaran_buku', 'buku_dipinjam', 'harga_buku', 'pengarang_buku', 'penerbit_buku', 'jumlah_penerbit_buku', 'tahun_terbit_buku', 'eks', 'total', 'ketersediaan_buku', 'nilai_optimasi', 'borda_perpus'];
    protected $primaryKey = 'id_buku';

    public function getBuku($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_buku' => $id])->first();
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
        return $this->where(['id_buku' => $id_buku])->delete();
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
