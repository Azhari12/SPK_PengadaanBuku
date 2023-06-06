<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\PengadaanModel;
use App\Models\UsulanModel;
use Shuchkin\SimpleXLSX;

class Pemustaka extends BaseController
{

    protected $usulanModel;

    public function __construct()
    {
        $this->usulanModel = new UsulanModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'pemustaka' => $this->usulanModel->getBuku(),
            // 'rangking'  => $this->p->getUrutan()
        ];

        return view('/pemustaka', $data);
    }


    //--------------------------------------------------------------------

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
            if ($r[0] != "NO" && $r[0] != '#') {
                // d("berhasil" . $r[0]);
                // d("berhasil" . $r[1]);

                $baris++;
                $profesi = "";
                if (strlen($r[6]) > 11) {

                    d("dosen" . $r[6] . "jumlah" . strlen($r[6]));
                    $profesi = "Dosen";
                } else {
                    d("Mahasiswa" . $r[6]);
                    $profesi = "Mahasiswa";
                }

                $data[$baris] = array(




                    'nomor' => $baris,
                    'judul_usulan' => $r[1],
                    'penerbit_usulan' => $r[3],
                    'jumlah_penerbit' => $r[4],
                    'tahun_terbit_usulan'    => $r[5],
                    'jumlah_meminjam_buku' => $r[8],
                    'jumlah_usulan' => $r[9],


                );
            }
        }



        // dd($data);

        $this->usulanModel->insertBatch($data);
        return redirect()->to('/pemustaka');
    }

    public function uploadMenuBaru()
    {
        $file = $this->request->getFile('upload_file');

        new SimpleXLSX();
        ini_set("memory_limit", "512M");

        $data = array();
        $xlsx = SimpleXLSX::parse($file);

        $baris = 0;
        foreach ($xlsx->rows() as $r) {
            // d($r[0]);
            if ($r[0] != "NO" && $r[0] != '#') {
                // d("berhasil" . $r[0]);
                // d("berhasil" . $r[1]);

                $baris++;
                $profesi = "";
                if (strlen($r[6]) > 11) {

                    d("dosen" . $r[6] . "jumlah" . strlen($r[6]));
                    $profesi = "Dosen";
                } else {
                    d("Mahasiswa" . $r[6]);
                    $profesi = "Mahasiswa";
                }

                $data[$baris] = array(




                    'nomor' => $baris,
                    'judul_usulan' => $r[1],
                    'penerbit_usulan' => $r[3],
                    'jumlah_penerbit' => $r[4],
                    'tahun_terbit_usulan'    => $r[5],
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
        $this->usulanModel->deleteAll();
        return redirect()->to('/pemustaka');
    }
}
