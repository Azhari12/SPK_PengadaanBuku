<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table = 'tb_buku';
    protected $useTimestamps = false;
    protected $allowedFields = ['nama_buku', 'anggaran', 'jumlah_peminjam', 'harga_buku', 'edisi_buku', 'tahun_berdiri', 'tahun_terbit', 'ketersediaan_buku', 'kurikulum_jurusan', 'kebutuhan_jurusan', 'jumlah_mahasiswa', 'nilai_optimasi'];
    protected $primaryKey = 'id_buku';

    public function getBuku($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id_buku' => $id])->first();
    }

    public function getUrutan()
    {
        $query = $this->builder()
            ->select('*')
            ->orderBy('nilai_optimasi', 'desc');

        //echo $query->getCompiledSelect(false);

        return $query->get()->getResult();
    }

    public function hapus($id_buku)
    {
        return $this->where(['id_buku' => $id_buku])->delete();
    }
}
