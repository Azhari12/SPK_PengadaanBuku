<?php

namespace App\Controllers;

use App\Models\BukuModel;
use App\Models\KriteriaPerpusModel;
use App\Models\NilaiHargaBuku;
use App\Models\NilaiJumlahPeminjamModel;
use App\Models\NilaiKetersediaanModel;
use App\Models\NilaiPenerbit;
use App\Models\NilaiTahunTerbit;
use App\Models\PengadaanModel;

class rangkingbuku extends BaseController
{

    protected $bukuModel;
    protected $kriteriaPerpusModel;
    protected $nilaiPeminjaman;


    public function __construct()
    {
        $this->bukuModel = new PengadaanModel();
        $this->kriteriaPerpusModel = new KriteriaPerpusModel();
        $this->nilaiPeminjaman = new NilaiJumlahPeminjamModel();
        $this->nilaiHargaBuku = new NilaiHargaBuku();
        $this->nilaiPenerbitBuku = new NilaiPenerbit();
        $this->nilaiTahunTerbitBuku = new NilaiTahunTerbit();
        $this->nilaiKetersediaanBuku = new NilaiKetersediaanModel();
    }
    //--------------------------------------------------------------------

    public function kriteriaAnggaran()
    {

        return 50;
    }

    public function kriteriaJumlahPeminjam($nilai)
    {
        // $kriteria = $this->nilaiPeminjaman->getNilai();
        // $no = 0;
        // $arrayNilai = [];

        // foreach ($kriteria as $n) {
        //     $arrayNilai[$no] = $n['ukuran'];
        //     $no++;
        //     d($n['ukuran']);
        // }

        // if ($nilai >= $arrayNilai[0]) {
        //     return 50;
        // } else if ($nilai >= $arrayNilai[1] && $nilai <= $arrayNilai[0] - 1) {
        //     return 40;
        // } else if ($nilai >= $arrayNilai[2] && $nilai <= $arrayNilai[1] - 1) {
        //     return 30;
        // } else if ($nilai >= $arrayNilai[3] && $nilai <= $arrayNilai[2] - 1) {
        //     return 20;
        // } else if ($nilai < $arrayNilai[4]) {
        //     return 10;
        // }

        if ($nilai > 20) {
            return 50;
        } else if ($nilai >= 15 && $nilai <= 20) {
            return 40;
        } else if ($nilai >= 11 && $nilai <= 14) {
            return 30;
        } else if ($nilai >= 1 && $nilai <= 10) {
            return 20;
        } else if ($nilai < 1) {
            return 10;
        }
    }

    public function hargaBuku($nilai)
    {
        // $kriteria = $this->nilaiHargaBuku->getNilai();
        // $no = 0;
        // $arrayNilai = [];

        // foreach ($kriteria as $n) {
        //     $arrayNilai[$no] = $n['ukuran'];
        //     $no++;
        //     d($n['ukuran']);
        // }
        // d($arrayNilai);
        // d($arrayNilai[0] + 1);
        // dd($nilai[1]);
        // if ($nilai <= $arrayNilai[0]) {
        //     return 50;
        // } else if ($nilai >= $arrayNilai[0] + 1 && $nilai <= $arrayNilai[1]) {
        //     return 40;
        // } else if ($nilai >= $arrayNilai[1] + 1 && $nilai <= $arrayNilai[2]) {
        //     return 30;
        // } else if ($nilai >= $arrayNilai[2] + 1 && $nilai <= $arrayNilai[3]) {
        //     return 20;
        // } else if ($nilai > $arrayNilai[4]) {
        //     return 10;
        // }

        if ($nilai <= 100) {
            return 50;
        } else if ($nilai > 100 && $nilai <= 200) {
            return 40;
        } else if ($nilai > 200  && $nilai <= 300) {
            return 30;
        } else if ($nilai > 300 && $nilai <= 400) {
            return 20;
        } else if ($nilai > 400) {
            return 10;
        }
    }

    public function penerbitBuku($nilai)
    {
        $kriteria = $this->nilaiPenerbitBuku->getNilai();

        d($kriteria);
        dd($kriteria[3]['ukuran']);

        // if ($nilai == $kriteria[0]['ukuran']) {
        //     return 50;
        // } else if ($nilai == $kriteria[1]['ukuran']) {
        //     return 40;
        // } else if ($nilai == $kriteria[2]['ukuran']) {
        //     return 30;
        // } else if ($nilai == $kriteria[3]['ukuran']) {
        //     return 20;
        // } else if ($nilai != $kriteria[0]['ukuran'] && $nilai != $kriteria[1]['ukuran'] && $nilai != $kriteria[2]['ukuran'] && $nilai != $kriteria[3]['ukuran']) {
        //     return 10;
        // }

        if ($nilai == "Erlangga") {
            return 50;
        } else if ($nilai == "Andi") {
            return 40;
        } else if ($nilai == "Ar-Ruzz Media") {
            return 30;
        } else if ($nilai == "Penebar Swadaya") {
            return 20;
        } else {
            return 10;
        }
    }



    public function tahunTerbit($nilai)
    {
        // $kriteria = $this->nilaiTahunTerbitBuku->getNilai();

        // d($kriteria);
        // dd($kriteria[3]['ukuran']);

        // if ($nilai >= $kriteria[0]['ukuran']) {
        //     return 50;
        // } else if ($nilai >= $kriteria[1]['ukuran'] && $nilai <= $kriteria[0]['ukuran'] - 1) {
        //     return 40;
        // } else if ($nilai >= $kriteria[2]['ukuran'] && $nilai <= $kriteria[1]['ukuran'] - 1) {
        //     return 30;
        // } else if ($nilai >= $kriteria[3]['ukuran'] && $nilai <= $kriteria[2]['ukuran'] - 1) {
        //     return 20;
        // } else if ($nilai < $kriteria[4]['ukuran']) {
        //     return 10;
        // }

        if ($nilai > 2020) {
            return 50;
        } else if ($nilai >= 2017 && $nilai <= 2020) {
            return 40;
        } else if ($nilai >= 2014 && $nilai <= 2016) {
            return 30;
        } else if ($nilai >= 2011 && $nilai <= 2013) {
            return 20;
        } else if ($nilai < 2011) {
            return 10;
        }
    }

    public function ketersediaanBuku($nilai)
    {
        // $kriteria = $this->nilaiKetersediaanBuku->getNilai();

        // d($kriteria);
        // dd($kriteria[1]['ukuran']);
        // if ($nilai == $kriteria[0]['ukuran']) {
        //     return 50;
        // } else if ($nilai == $kriteria[1]['ukuran']) {
        //     return 20;
        // }

        if ($nilai == "Tidak") {
            return 50;
        } else if ($nilai == "Tersedia") {
            return 20;
        }
    }

    // public function kurikulum($nilai)
    // {
    //     if ($nilai == 2015) {
    //         return 50;
    //     } else if ($nilai == 2013) {
    //         return 30;
    //     } else if ($nilai == 2010) {
    //         return 10;
    //     }
    // }

    // public function kebutuhanJurusan($nilai)
    // {
    //     if ($nilai == "Butuh") {
    //         return 40;
    //     } else if ($nilai == "Tidak") {
    //         return 30;
    //     }
    // }

    // public function jumlahMahasiswa($nilai)
    // {
    //     if ($nilai > 240) {
    //         return 50;
    //     } else if ($nilai >= 181 && $nilai <= 240) {
    //         return 40;
    //     } else if ($nilai >= 121 && $nilai <= 180) {
    //         return 30;
    //     } else if ($nilai >= 61 && $nilai <= 120) {
    //         return 20;
    //     } else if ($nilai < 61) {
    //         return 10;
    //     }
    // }



    public function proses()
    {



        // $this->normalisasiPerspektifJF();
        $this->ketersediaanBuku('as');

        return redirect()->to('/listbuku');
    }

    public function normalisasiPerspektifJF()
    {

        // $x[$baris][$kolom];
        // echo '<table>';
        // for ($i = 1; $i <= $baris; $i++) {
        //     echo '<tr>';
        //     for ($j = 1; $j <= $kolom; $j++) {
        //         echo '<td>';
        //         echo $i . $j;
        //         $x[i][j] = 
        //         echo '</td>';
        //     }
        //     echo '</tr>';
        // }
        // echo '</table>';

        $dataBuku = $this->bukuModel->getBuku();
        // for ($i = 0; $i <= $this->bukuModel->countAllResults(); $i++) {
        //     echo $i;
        // }

        $matrixKeputusan = array();
        $no = 0;

        foreach ($dataBuku as $data) {
            $nilaiAnggaran = $this->kriteriaAnggaran();
            $nilaiJumlahPeminjam = $this->kriteriaJumlahPeminjam($data['jumlah_peminjam']);
            $nilaiHargaBuku = $this->hargaBuku($data['harga_buku']);
            $nilaiPenerbit = $this->hargaBuku($data['penerbit_buku']);
            $nilaiTahunTerbit = $this->tahunTerbit($data['tahun_terbit']);
            $nilaiKetersediaanBuku = $this->ketersediaanBuku($data['ketersediaan_buku']);
            $matrixKeputusan[$no] = array(
                'anggaran' => $nilaiAnggaran,
                'jumlah_peminjam' => $nilaiJumlahPeminjam,
                'harga_buku'    => $nilaiHargaBuku,
                'tahun_terbit'  => $nilaiTahunTerbit,
                'ketersediaan_buku' => $nilaiKetersediaanBuku
            );
            $no++;
            echo " " . $data['anggaran'];
            echo " " . $data['jumlah_peminjam'];
            echo " " . $data['harga_buku'];
            echo " " . $data['edisi_buku'];
            echo " " . $data['tahun_berdiri'];
            echo " " . $data['tahun_terbit'];
            echo " " . $data['ketersediaan_buku'];
            echo " " . $data['kurikulum_jurusan'];
            echo " " . $data['kebutuhan_jurusan'];
            echo " " . $data['jumlah_mahasiswa'];
            echo "<br>";
        }
        d($dataBuku);

        $matrixnormalisasiPerspektifJurusan = array();
        $arrayAnggaran = array();
        $arrayJumlahPeminjam = array();
        $arrayHargaBuku = array();
        $arrayEdisiBuku = array();
        $arrayTahunBerdiri = array();
        $arrayTahunTerbit = array();
        $arrayKetersediaanBuku = array();
        $noNormalisasi = 0;
        $hasilnya = 0;
        foreach ($matrixKeputusan as $mk) {
            $arrayAnggaran[$noNormalisasi] = $mk['anggaran'];
            $arrayJumlahPeminjam[$noNormalisasi] = $mk['jumlah_peminjam'];
            $arrayHargaBuku[$noNormalisasi] = $mk['harga_buku'];
            $arrayEdisiBuku[$noNormalisasi] = $mk['edisi_buku'];
            $arrayTahunBerdiri[$noNormalisasi] = $mk['tahun_berdiri'];
            $arrayTahunTerbit[$noNormalisasi] = $mk['tahun_terbit'];
            $arrayKetersediaanBuku[$noNormalisasi] = $mk['ketersediaan_buku'];

            echo "anggaran " . $noNormalisasi . "adalah" . $mk['anggaran'];
            // d(count($arraySimpan));
            // if ($noNormalisasi > 0) {
            //     $hasilnya = $hasilnya + $arrayAnggaran[$noNormalisasi - 1];
            // } else {
            //     $hasilnya = $arrayAnggaran[$noNormalisasi];
            // }
            // d($hasilnya);
            $noNormalisasi++;
        }
        for ($i = 0; $i < count($arrayAnggaran); $i++) {
            // $normalisasiAnggaran[$i] = $arrayAnggaran[$i] / sqrt(pow($arrayAnggaran[0], 2) + pow($arrayAnggaran[1], 2) + pow($arrayAnggaran[2], 2) + pow($arrayAnggaran[3], 2) + pow($arrayAnggaran[4], 2));

            $jumlahNormalisasiAnggaran = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jumlahNormalisasiAnggaran = $jumlahNormalisasiAnggaran + pow($arrayAnggaran[$j], 2);
            }
            d(count($arrayAnggaran));
            d($jumlahNormalisasiAnggaran);

            $jumlahNormalisasiJumlahPeminjam = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jumlahNormalisasiJumlahPeminjam = $jumlahNormalisasiJumlahPeminjam + pow($arrayJumlahPeminjam[$j], 2);
            }


            $jnHargaBuku = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jnHargaBuku = $jnHargaBuku + pow($arrayHargaBuku[$j], 2);
            }

            $jnEdisiBuku = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jnEdisiBuku = $jnEdisiBuku + pow($arrayEdisiBuku[$j], 2);
            }

            $jnTahunBerdiri = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jnTahunBerdiri = $jnTahunBerdiri + pow($arrayTahunBerdiri[$j], 2);
            }

            $jnTahunTerbit = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jnTahunTerbit = $jnTahunTerbit + pow($arrayTahunTerbit[$j], 2);
            }

            $jnKetersediaanBuku = 0;
            for ($j = 0; $j < count($arrayAnggaran); $j++) {
                $jnKetersediaanBuku = $jnKetersediaanBuku + pow($arrayKetersediaanBuku[$j], 2);
            }

            // dd(sqrt($jumlahNormalisasiAnggaran));

            // $normalisasiJumlahPeminjam[$i] = $arrayJumlahPeminjam[$i] / sqrt(pow($arrayJumlahPeminjam[0], 2) + pow($arrayJumlahPeminjam[1], 2) + pow($arrayJumlahPeminjam[2], 2) + pow($arrayJumlahPeminjam[3], 2) + pow($arrayJumlahPeminjam[4], 2));



            $normalisasiAnggaran[$i] = $arrayAnggaran[$i] / sqrt($jumlahNormalisasiAnggaran);
            $normalisasiJumlahPeminjam[$i] = $arrayJumlahPeminjam[$i] / sqrt($jumlahNormalisasiJumlahPeminjam);
            $normalisasiHargaBuku[$i] = $arrayHargaBuku[$i] / sqrt($jnHargaBuku);
            $normalisasiEdisiBuku[$i] = $arrayEdisiBuku[$i] / sqrt($jnEdisiBuku);
            $normalisasiTahunBerdiri[$i] = $arrayTahunBerdiri[$i] / sqrt($jnTahunBerdiri);
            $normalisasiTahunTerbit[$i] = $arrayTahunTerbit[$i] / sqrt($jnTahunTerbit);
            $normalisasiKetersediaanBuku[$i] = $arrayKetersediaanBuku[$i] / sqrt($jnKetersediaanBuku);

            // dd(sqrt($jumlahNormalisasiAnggaran));

            // $normalisasiHargaBuku[$i] = $arrayHargaBuku[$i] / sqrt(pow($arrayHargaBuku[0], 2) + pow($arrayHargaBuku[1], 2) + pow($arrayHargaBuku[2], 2) + pow($arrayHargaBuku[3], 2) + pow($arrayHargaBuku[4], 2));

            // $normalisasiEdisiBuku[$i] = $arrayEdisiBuku[$i] / sqrt(pow($arrayEdisiBuku[0], 2) + pow($arrayEdisiBuku[1], 2) + pow($arrayEdisiBuku[2], 2) + pow($arrayEdisiBuku[3], 2) + pow($arrayEdisiBuku[4], 2));

            // $normalisasiTahunBerdiri[$i] = $arrayTahunBerdiri[$i] / sqrt(pow($arrayTahunBerdiri[0], 2) + pow($arrayTahunBerdiri[1], 2) + pow($arrayTahunBerdiri[2], 2) + pow($arrayTahunBerdiri[3], 2) + pow($arrayTahunBerdiri[4], 2));

            // $normalisasiTahunTerbit[$i] = $arrayTahunTerbit[$i] / sqrt(pow($arrayTahunTerbit[0], 2) + pow($arrayTahunTerbit[1], 2) + pow($arrayTahunTerbit[2], 2) + pow($arrayTahunTerbit[3], 2) + pow($arrayTahunTerbit[4], 2));

            // $normalisasiKetersediaanBuku[$i] = $arrayKetersediaanBuku[$i] / sqrt(pow($arrayKetersediaanBuku[0], 2) + pow($arrayKetersediaanBuku[1], 2) + pow($arrayKetersediaanBuku[2], 2) + pow($arrayKetersediaanBuku[3], 2) + pow($arrayKetersediaanBuku[4], 2));
        }

        for ($i = 0; $i < count($dataBuku); $i++) {
            // for($j=0; $j < count($arrayAnggaran))
            $matrixnormalisasiPerspektifJurusan[$i] = array(
                'anggaran'  => round($normalisasiAnggaran[$i], 2),
                'jumlah_peminjam' => round($normalisasiJumlahPeminjam[$i], 2),
                'harga_buku'    => round($normalisasiHargaBuku[$i], 2),
                'edisi_buku'    => round($normalisasiEdisiBuku[$i], 2),
                'tahun_berdiri' => round($normalisasiTahunBerdiri[$i], 2),
                'tahun_terbit'  => round($normalisasiTahunTerbit[$i], 2),
                'ketersediaan_buku' => round($normalisasiKetersediaanBuku[$i], 2)
            );
        }
        d($arrayAnggaran);
        d($normalisasiAnggaran);
        d($matrixnormalisasiPerspektifJurusan);
        d($matrixKeputusan);
        // $this->nilaiOptimisasi($matrixnormalisasi);
        $this->normalisasiPerspektifP($matrixnormalisasiPerspektifJurusan);
    }

    public function normalisasiPerspektifP($matrixnormalisasiPerspektifJurusan)
    {
        $dataBuku = $this->bukuModel->getBuku();

        $matrixKeputusan = array();
        $no = 0;

        foreach ($dataBuku as $data) {

            $nilaiKurikulum = $this->kriteriaAnggaran($data['kurikulum_jurusan']);
            $nilaiKebutuhanJurusan = $this->kriteriaAnggaran($data['kebutuhan_jurusan']);
            $nilaiJumlahMahasiswa = $this->kriteriaAnggaran($data['jumlah_mahasiswa']);

            $matrixKeputusan[$no] = array(
                'kurikulum_jurusan' => $nilaiKurikulum,
                'kebutuhan_jurusan' => $nilaiKebutuhanJurusan,
                'jumlah_mahasiswa'    => $nilaiJumlahMahasiswa,

            );
            $no++;
        }
        d($dataBuku);

        $matrixnormalisasiPerspektifPerpus = array();

        $arrayKurikulumJurusan = array();
        $arrayKebutuhanJurusan = array();
        $arrayJumlahMahasiswa = array();

        $noNormalisasi = 0;
        $hasilnya = 0;
        foreach ($matrixKeputusan as $mk) {
            $arrayKurikulumJurusan[$noNormalisasi] = $mk['kurikulum_jurusan'];
            $arrayKebutuhanJurusan[$noNormalisasi] = $mk['kebutuhan_jurusan'];
            $arrayJumlahMahasiswa[$noNormalisasi] = $mk['jumlah_mahasiswa'];

            $noNormalisasi++;
        }

        for ($i = 0; $i < count($dataBuku); $i++) {



            $jnKurikulum = 0;
            for ($j = 0; $j < count($dataBuku); $j++) {
                $jnKurikulum = $jnKurikulum + pow($arrayKurikulumJurusan[$j], 2);
            }

            $jnKebutuhanJurusan = 0;
            for ($j = 0; $j < count($dataBuku); $j++) {
                $jnKebutuhanJurusan = $jnKebutuhanJurusan + pow($arrayKebutuhanJurusan[$j], 2);
            }

            $jnJumlahMahasiswa = 0;
            for ($j = 0; $j < count($dataBuku); $j++) {
                $jnJumlahMahasiswa = $jnJumlahMahasiswa + pow($arrayJumlahMahasiswa[$j], 2);
            }




            $normalisasiKurikulum[$i] = $arrayKurikulumJurusan[$i] / sqrt($jnKurikulum);
            $normalisasiKebutuhanJurusan[$i] = $arrayKebutuhanJurusan[$i] / sqrt($jnKebutuhanJurusan);
            $normalisasiJumlahMahasiswa[$i] = $arrayJumlahMahasiswa[$i] / sqrt($jnJumlahMahasiswa);
        }

        for ($i = 0; $i < count($dataBuku); $i++) {
            // for($j=0; $j < count($arrayAnggaran))
            $matrixnormalisasiPerspektifPerpus[$i] = array(
                'kurikulum_jurusan'  => round($normalisasiKurikulum[$i], 2),
                'kebutuhan_jurusan' => round($normalisasiKebutuhanJurusan[$i], 2),
                'jumlah_mahasiswa'    => round($normalisasiJumlahMahasiswa[$i], 2),

            );
        }
        // d($arrayAnggaran);
        // d($normalisasiAnggaran);
        d($matrixnormalisasiPerspektifPerpus);
        d($matrixKeputusan);
        $this->nilaiOptimisasi($matrixnormalisasiPerspektifJurusan, $matrixnormalisasiPerspektifPerpus);
    }

    public function nilaiOptimisasi($matrixnormalisasiPerspektifJurusan, $matrixnormalisasiPerspektifPerpus)
    {
        $data = [];
        $nomor = 0;

        foreach ($this->kriteriaPerpusModel->getKriteria() as $d) {
            d($d['bobot_kriteria']);

            $data[$nomor] = $d['bobot_kriteria'];
            $nomor++;
            // $wjumlahPeminjam = 2.1;
            // $wHargaBuku = 2.1;
            // $wEdisiBuku = 1.8;
            // $wTahunBerdiri = 1.8;
            // $wtahunTerbit = 1.9;
            // $wKetersediaanBuku = 2.1;
        }
        // $wAnggaran = $data[0];
        // $wjumlahPeminjam = $data[1];
        // $wHargaBuku = $data[2];
        // $wPenerbitBuku = $data[3];
        // $wtahunTerbit = $data[4];
        // $wKetersediaanBuku = $data[5];
        $wAnggaran = $data[0];
        $wjumlahPeminjam = $data[1];
        $wHargaBuku = $data[2];
        $wPenerbitBuku = $data[3];
        $wtahunTerbit = $data[4];
        $wKetersediaanBuku = $data[5];
        d($wAnggaran);
        d($wjumlahPeminjam);
        d($wHargaBuku);
        d($wPenerbitBuku);
        d($wtahunTerbit);
        dd($wKetersediaanBuku);

        $bankUrutanPerspektifJurusan = array();
        $itungBuku = $this->bukuModel->countAllResults();

        // for ($i = 0; $i < $itungBuku; $i++) {


        // }

        $i = 0;
        foreach ($matrixnormalisasiPerspektifJurusan as $mn) {
            // dd($mn['anggaran']);
            $kali1 = ($wAnggaran * $mn['anggaran']);
            $kali2 = ($wjumlahPeminjam * $mn['jumlah_peminjam']);
            $kali3 = ($wAnggaran * $mn['edisi_buku']);
            $kali4 = ($wtahunTerbit * $mn['tahun_terbit']);

            $tambah1 = round($kali1, 2) + round($kali2, 2) + round($kali3, 2) + round($kali4, 2);

            d($tambah1);
            $kali5 = ($wHargaBuku * $mn['harga_buku']);
            $kali6 = ($wAnggaran * $mn['tahun_berdiri']);
            $kali7 = ($wKetersediaanBuku * $mn['ketersediaan_buku']);

            $tambah2 = round($kali5, 2) + round($kali6, 2) + round($kali7, 2);
            d($tambah2);
            $hasil = $tambah1 - $tambah2;
            $bankUrutanPerspektifJurusan[$i] = $hasil;
            // d($kali1);
            // d($kali2);
            // d($kali3);
            // d($kali4);
            // d($kali5);
            // d($kali6);
            // d($kali7);
            // d($tambah2);
            // d($tambah1);
            // dd($hasil);
            // $bankUrutan[$i] = ($wAnggaran * $mn['anggaran'] + $wjumlahPeminjam * $mn['jumlah_peminjam'] + $wEdisiBuku * $mn['edisi_buku'] + $wtahunTerbit + $mn['tahun_terbit']) - ($wHargaBuku * $mn['harga_buku'] + $wTahunBerdiri * $mn['tahun_berdiri'] + $wKetersediaanBuku * $mn['ketersediaan_buku']);

            $i++;
        }
        // $urutanFix = array();
        // // $hapusCek = 0;
        // for ($j = 0; $j < 5; $j++) {
        //     $nilaiBesar = 0;
        //     $urutanKE = 0;
        //     $tampung = 0;
        //     for ($i = 0; $i < count($bankUrutan); $i++) {
        //         $tampung = $bankUrutan[$i];
        //         if ($i > 0) {
        //             if ($tampung > $nilaiBesar) {
        //                 $nilaiBesar = $tampung;
        //                 $urutanKE = $i;
        //             }
        //         } else {
        //             $nilaiBesar = $tampung;
        //             $urutanKE = $i;
        //         }
        //     }
        //     $urutanFix[$j] = $urutanKE;
        //     // $hapusCek = $urutanKE;
        // }
        $bankUrutanPerspektifPerpus = array();

        $j = 0;
        d($matrixnormalisasiPerspektifPerpus);
        foreach ($matrixnormalisasiPerspektifPerpus as $mn) {

            $kali1 = ($wAnggaran * $mn['kurikulum_jurusan']);
            $kali2 = ($wAnggaran * $mn['kebutuhan_jurusan']);
            $kali3 = ($wAnggaran * $mn['jumlah_mahasiswa']);

            d($kali1);
            d($kali2);
            d($kali3);

            $tambah1 = round($kali1, 2) + round($kali2, 2) + round($kali3, 2);



            $hasil = $tambah1;
            $bankUrutanPerspektifPerpus[$j] = $hasil;

            $j++;
            d($j);
        }
        d($bankUrutanPerspektifJurusan);
        d($bankUrutanPerspektifPerpus);


        $datanya = $this->bukuModel->first();
        $idBuku = $datanya['id_buku'];

        $alternatif = array();
        for ($i = 0; $i < count($bankUrutanPerspektifJurusan); $i++) {
            $alternatif[$i] = ($bankUrutanPerspektifJurusan[$i] + $bankUrutanPerspektifPerpus[$i]) / 2;

            $this->bukuModel->update($idBuku, [
                'nilai_optimasi' => $alternatif[$i]

            ]);
            $idBuku++;
        }
        // dd($alternatif);
        // dd($bankUrutanPerspektifJurusan);
        // dd($itungBuku);
    }
}
