<?php

namespace App\Controllers;

use App\Models\KriteriaPerpusModel;
use App\Models\NilaiHargaBuku;
use App\Models\NilaiJumlahPeminjamModel;
use App\Models\NilaiKetersediaanModel;
use App\Models\NilaiPenerbit;
use App\Models\NilaiTahunTerbit;

class NilaiKriteriaPerpus extends BaseController
{

    //--------------------------------------------------------------------

    protected $nilaiJumlahPeminjaman;
    protected $nilaiHargaBuku;
    protected $nilaiPenerbit;
    protected $nilaiTahunTerbit;
    protected $nilaiKetersediaan;


    public function __construct()
    {
        $this->nilaiJumlahPeminjaman = new NilaiJumlahPeminjamModel();
        $this->nilaiHargaBuku = new NilaiHargaBuku();
        $this->nilaiPenerbit = new NilaiPenerbit();
        $this->nilaiTahunTerbit = new NilaiTahunTerbit();
        $this->nilaiKetersediaan = new NilaiKetersediaanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'nilai_peminjaman' => $this->nilaiJumlahPeminjaman->getNilai(),
            'nilai_harga' => $this->nilaiHargaBuku->getNilai(),
            'nilai_penerbit' => $this->nilaiPenerbit->getNilai(),
            'nilai_tahun_terbit' => $this->nilaiTahunTerbit->getNilai(),
            'nilai_ketersediaan' => $this->nilaiKetersediaan->getNilai(),
            // 'rangking'  => $this->p->getUrutan()
        ];

        return view('/nilaikriteria', $data);
    }

    public function updatePeminjaman($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiJumlahPeminjaman->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),
        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriaperpus');
    }

    public function updateHargaBuku($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiHargaBuku->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriaperpus');
    }

    public function updatePenerbit($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiPenerbit->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriaperpus');
    }

    public function updateTahunTerbit($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiTahunTerbit->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriaperpus');
    }

    public function updateKetersediaan($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiKetersediaan->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriaperpus');
    }
}
