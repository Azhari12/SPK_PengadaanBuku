<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PengadaanModel;
use App\Models\UsulanModel;
use Shuchkin\SimpleXLSX;

class MenuBaru extends BaseController
{

    protected $pengadaanModel;
    protected $usulanModel;

    public function __construct()
    {
        $this->pengadaanModel = new PengadaanModel();
        $this->usulanModel = new UsulanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'pengadaan' => $this->pengadaanModel->getBuku(),
            'pemustaka' => $this->usulanModel->getBuku(),
            // 'rangking'  => $this->p->getUrutan()
        ];

        return view('/menubaru', $data);
    }


    //--------------------------------------------------------------------

    public function upload()
    {
        $file = $this->request->getFile('upload_file');

        new SimpleXLSX();
        ini_set("memory_limit", "512M");

        $data = array();
        $xlsx = SimpleXLSX::parse($file);

        $baris = 0;
        foreach ($xlsx->rows() as $r) {
            // d($r[0]);
            if ($r[0] != "NO") {
                d("berhasil" . $r[0]);

                $baris++;

                $data[$baris] = array(


                    'nomor' => $baris,
                    'judul_buku' => $r[1],
                    'buku_dipinjam' => $r[2],
                    'harga_buku'    => $r[3],
                    'penerbit_buku'    => $r[4],
                    'jumlah_penerbit_buku' => $r[5],
                    'tahun_terbit_buku'    => $r[6],
                    'ketersediaan_buku' => $r[7],
                );
            }
        }



        d($data);

        $this->pengadaanModel->insertBatch($data);
        return redirect()->to('/menubaru');
    }

    public function uploadUsulan()
    {
        $file = $this->request->getFile('upload_file');

        new SimpleXLSX();
        ini_set("memory_limit", "512M");

        $data = array();
        $xlsx = SimpleXLSX::parse($file);

        $baris = 0;
        foreach ($xlsx->rows() as $r) {
            // d($r[0]);
            if ($r[0] != "NO") {
                d("berhasil" . $r[0]);

                $baris++;
                $data[$baris] = array(


                    'nomor' => $baris,
                    'judul_usulan' => $r[1],
                    'pengarang_usulan'   => $r[2],
                    'penerbit_usulan' => $r[3],
                    'jumlah_penerbit' => $r[4],
                    'tahun_terbit_usulan'    => $r[5],
                    'tanggal_usulan'    => $r[6],
                    'nomor_anggota'    => $r[7],
                    'jumlah_meminjam_buku' => $r[8],
                    'jumlah_usulan' => $r[9],


                );
            }
        }



        // dd($data);

        $this->usulanModel->insertBatch($data);
        return redirect()->to('/menubaru');
    }

    public function delete()
    {
        $this->pengadaanModel->deleteAll();
        return redirect()->to('/menubaru');
    }
}
