<?php

namespace App\Controllers;

use App\Models\KriteriaPerpusModel;
use App\Models\NilaiHargaBuku;
use App\Models\NilaiJumlahPeminjamModel;
use App\Models\NilaiKetersediaanModel;
use App\Models\NilaiNomorAnggotaModel;
use App\Models\NilaiPenerbit;
use App\Models\NilaiPenerbitPemustakaModel;
use App\Models\NilaiTahunTerbit;
use App\Models\NilaiTahunTerbitPemustaka;

class NilaiKriteriaPemustaka extends BaseController
{

    //--------------------------------------------------------------------

    protected $nilaiPenerbit;
    protected $nilaiTahunTerbit;
    protected $nilaiNomorAnggota;
    protected $nilaiJumlahKunjungan;
    protected $nilaiJumlahMeminjamBuku;
    protected $nilaiJumlahUsulan;


    public function __construct()
    {
        $this->nilaiPenerbit = new NilaiPenerbitPemustakaModel();
        $this->nilaiTahunTerbit = new NilaiTahunTerbitPemustaka();
        $this->nilaiNomorAnggota = new NilaiNomorAnggotaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'nilai_penerbit' => $this->nilaiPenerbit->getNilai(),
            'nilai_tahun_terbit' => $this->nilaiTahunTerbit->getNilai(),
            'nilai_nomor_anggota' => $this->nilaiNomorAnggota->getNilai(),
            // 'rangking'  => $this->p->getUrutan()
        ];

        return view('/nilaikriteriapemustaka', $data);
    }




    public function updatePenerbit($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiPenerbit->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriapemustaka');
    }

    public function updateTahunTerbit($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiTahunTerbit->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaiKriteriaPemustaka');
    }

    public function updateNomorAnggota($id)
    {
        // dd($this->request->getVar('ukuran'));
        $this->nilaiNomorAnggota->update($id, [
            'id' => $id,
            'ukuran' => $this->request->getVar('ukuran'),

        ]);

        session()->setFlashdata('pesan_ubah', 'Data Berhasil Di Ubah');

        return redirect()->to('/nilaikriteriapemustaka');
    }
}
