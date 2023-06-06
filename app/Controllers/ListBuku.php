<?php

namespace App\Controllers;

use App\Models\BukuModel;

class ListBuku extends BaseController
{

    protected $bukuModel;
    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }


    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'validation' => \config\Services::validation(),
            'daftar_buku' => $this->bukuModel->getBuku(),
            'rangking'  => $this->bukuModel->getUrutan()
        ];

        return view('/listbuku', $data);
    }

    //--------------------------------------------------------------------
    public function save()
    {
        // if (!$this->validate([
        //     // 'judul' => 'required|is_unique[komik.judul]',
        //     'carabayar' => [
        //         'rules' => 'required|is_unique[tb_carabayar.cara_bayar]',
        //         'errors' => [
        //             'required'  => '{field} isi sebelum disimpan.',
        //             'is_unique' => '{field} cara bayar sudah terdaftar.'
        //         ]
        //     ],

        // ])) {
        //     // $validation = \config\Services::validation();
        //     // dd($validasi);
        //     // return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
        //     return redirect()->to('/carabayar')->withInput();
        // }

        $this->bukuModel->save([
            'nama_buku' => $this->request->getVar('nama_buku'),
            'anggaran'  => 500,
            'jumlah_peminjam' => $this->request->getVar('jumlah_peminjam'),
            'harga_buku' => $this->request->getVar('harga_buku'),
            'edisi_buku' => $this->request->getVar('edisi_buku'),
            'tahun_berdiri' => $this->request->getVar('tahun_berdiri'),
            'tahun_terbit' => $this->request->getVar('tahun_terbit'),
            'ketersediaan_buku' => $this->request->getVar('ketersediaan_buku'),
            'kurikulum_jurusan' => $this->request->getVar('kurikulum_jurusan'),
            'kebutuhan_jurusan' => $this->request->getVar('kebutuhan_jurusan'),
            'jumlah_mahasiswa' => $this->request->getVar('jumlah_mahasiswa'),

        ]);
        // $user = $this->caraBayarModel->getCaraBayar();
        // dd($user);

        session()->setFlashdata('pesan_tambah', 'Data Berhasil Di Tambahkan');

        return redirect()->to('/listbuku');
    }

    public function delete($id_buku)
    {

        $this->bukuModel->hapus($id_buku);

        session()->setFlashdata('pesan_hapus', 'Data Berhasil Di Hapus');
        return redirect()->to(base_url() . '/listbuku');
    }
}
