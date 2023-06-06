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
use App\Models\UsulanModel;

class rangkingbuku extends BaseController
{

    protected $bukuModel;
    protected $kriteriaPerpusModel;
    protected $nilaiPeminjaman;
    protected $nilaiHargaBuku;
    protected $nilaiPenerbitBuku;
    protected $nilaiTahunTerbitBuku;
    protected $nilaiKetersediaanBuku;
    protected $bukuPengadaan;
    protected $bukuPemustaka;


    public function __construct()
    {
        $this->bukuModel = new PengadaanModel();
        $this->kriteriaPerpusModel = new KriteriaPerpusModel();
        $this->nilaiPeminjaman = new NilaiJumlahPeminjamModel();
        $this->nilaiHargaBuku = new NilaiHargaBuku();
        $this->nilaiPenerbitBuku = new NilaiPenerbit();
        $this->nilaiTahunTerbitBuku = new NilaiTahunTerbit();
        $this->nilaiKetersediaanBuku = new NilaiKetersediaanModel();
        $this->bukuPengadaan = new PengadaanModel();
        $this->bukuPemustaka = new UsulanModel();
    }
    //--------------------------------------------------------------------

    // public function kriteriaAnggaran()
    // {

    //     return 50;
    // }

    public function kriteriaJumlahPeminjam($nilai)
    {
        $kriteria = $this->nilaiPeminjaman->getNilai();
        $no = 0;
        $arrayNilai = [];

        foreach ($kriteria as $n) {
            $arrayNilai[$no] = $n['ukuran'];
            $no++;
        }

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

        if ($nilai > 60) {
            return 5;
        } else if ($nilai >= 41 && $nilai <= 60) {
            return 4;
        } else if ($nilai >= 21 && $nilai <= 40) {
            return 3;
        } else if ($nilai >= 1 && $nilai <= 20) {
            return 2;
        } else if ($nilai == 0) {
            return 1;
        }
    }

    public function hargaBuku($nilai)
    {
        $kriteria = $this->nilaiHargaBuku->getNilai();
        $no = 0;
        $arrayNilai = [];

        foreach ($kriteria as $n) {
            $arrayNilai[$no] = $n['ukuran'];
            $no++;
        }

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
        if ($nilai < 50000) {
            return 5;
        } else if ($nilai >= 50000 && $nilai <= 80000) {
            return 4;
        } else if ($nilai > 80000  && $nilai <= 120000) {
            return 3;
        } else if ($nilai > 120000 && $nilai <= 150000) {
            return 2;
        } else if ($nilai > 150000) {
            return 1;
        }
    }

    public function penerbitBuku($nilai)
    {
        $kriteria = $this->nilaiPenerbitBuku->getNilai();


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
        if ($nilai > 1500) {
            return 5;
        } else if ($nilai >= 1001 && $nilai <= 1500) {
            return 4;
        } else if ($nilai >= 501 && $nilai <= 1000) {
            return 3;
        } else if ($nilai >= 1 && $nilai <= 500) {
            return 2;
        } else {
            return 1;
        }
    }



    public function tahunTerbit($nilai)
    {
        $kriteria = $this->nilaiTahunTerbitBuku->getNilai();


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

        if ($nilai > 2021) {
            return 5;
        } else if ($nilai >= 2019 && $nilai <= 2021) {
            return 4;
        } else if ($nilai >= 2016 && $nilai <= 2018) {
            return 3;
        } else if ($nilai >= 2013 && $nilai <= 2015) {
            return 2;
        } else if ($nilai < 2013) {
            return 1;
        }
    }

    public function ketersediaanBuku($nilai)
    {
        $kriteria = $this->nilaiKetersediaanBuku->getNilai();

        // if ($nilai == $kriteria[0]['ukuran']) {
        //     return 50;
        // } else if ($nilai == $kriteria[1]['ukuran']) {
        //     return 20;
        // }
        if ($nilai == 0) {
            return 5;
        } else if ($nilai >= 1 && $nilai <= 10) {
            return 4;
        } else if ($nilai >= 11 && $nilai <= 20) {
            return 3;
        } else if ($nilai >= 21 && $nilai <= 30) {
            return 2;
        } else {
            return 1;
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

    public function penerbitPemustaka($nilai)
    {
        if ($nilai > 1500) {
            return 5;
        } else if ($nilai >= 1001 && $nilai <= 1500) {
            return 4;
        } else if ($nilai >= 501 && $nilai <= 1000) {
            return 3;
        } else if ($nilai >= 1 && $nilai <= 500) {
            return 2;
        } else {
            return 1;
        }
    }

    public function tahunTerbitPemustaka($nilai)
    {
        if ($nilai > 2021) {
            return 5;
        } else if ($nilai >= 2019 && $nilai <= 2021) {
            return 4;
        } else if ($nilai >= 2016 && $nilai <= 2018) {
            return 3;
        } else if ($nilai >= 2013 && $nilai <= 2015) {
            return 2;
        } else if ($nilai < 2013) {
            return 1;
        }
    }

    // public function pemustaka($nilai)
    // {
    //     if ($nilai == "Dosen") {
    //         return 50;
    //     } else if ($nilai == "Mahasiswa") {
    //         return 40;
    //     }
    // }


    // public function jumlahKunjunganPemustaka($nilai)
    // {
    //     if ($nilai > 20) {
    //         return 50;
    //     } else if ($nilai >= 15 && $nilai <= 20) {
    //         return 40;
    //     } else if ($nilai >= 10 && $nilai <= 14) {
    //         return 30;
    //     } else if ($nilai >= 5 && $nilai <= 9) {
    //         return 20;
    //     } else if ($nilai < 5) {
    //         return 10;
    //     }
    // }

    public function jumlahPeminjamanPemustaka($nilai)
    {
        if ($nilai > 15) {
            return 5;
        } else if ($nilai >= 11 && $nilai <= 15) {
            return 4;
        } else if ($nilai >= 6 && $nilai <= 10) {
            return 3;
        } else if ($nilai >= 1 && $nilai <= 5) {
            return 2;
        } else if ($nilai == 0) {
            return 1;
        }
    }

    public function jumlahUsulan($nilai)
    {
        if ($nilai >= 4) {
            return 5;
        } else if ($nilai == 3) {
            return 4;
        } else if ($nilai == 2) {
            return 3;
        } else if ($nilai == 1) {
            return 2;
        } else if ($nilai <= 1) {
            return 1;
        }
    }

    public function proses()
    {



        $this->normalisasiPerspektifJF();
        // $this->ketersediaanBuku('as');

        return redirect()->to('/rekomendasiperspektifperpustakaan');
    }

    public function prosesPemustaka()
    {
        $this->normalisasiPerspektifPemustaka();
        // $this->ketersediaanBuku('as');

        return redirect()->to('/pemustaka');
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

        $dataBuku = $this->bukuPengadaan->getBuku();
        // for ($i = 0; $i <= $this->bukuModel->countAllResults(); $i++) {
        //     echo $i;
        // }

        $matrixKeputusan = array();
        $no = 0;
        d($dataBuku);
        foreach ($dataBuku as $data) {

            // $nilaiAnggaran = $this->kriteriaAnggaran();

            $nilaiJumlahPeminjam = $this->kriteriaJumlahPeminjam($data['buku_dipinjam']);

            $nilaiHargaBuku = $this->hargaBuku($data['harga_buku']);
            $nilaiPenerbitBuku = $this->penerbitBuku($data['jumlah_penerbit_buku']);
            $nilaiTahunTerbit = $this->tahunTerbit($data['tahun_terbit_buku']);
            $nilaiKetersediaanBuku = $this->ketersediaanBuku($data['ketersediaan_buku']);

            $matrixKeputusan[$no] = array(
                // 'anggaran' => $nilaiAnggaran,
                'jumlah_peminjam' => $nilaiJumlahPeminjam,
                'harga_buku'    => $nilaiHargaBuku,
                'penerbit_buku'    => $nilaiPenerbitBuku,
                'tahun_terbit'  => $nilaiTahunTerbit,
                'ketersediaan_buku' => $nilaiKetersediaanBuku
            );

            $no++;
            // echo " " . $data['anggaran_buku'];
            echo " " . $data['buku_dipinjam'];
            echo " " . $data['harga_buku'];
            echo " " . $data['penerbit_buku'];
            echo " " . $data['tahun_terbit_buku'];
            echo " " . $data['ketersediaan_buku'];
            echo "<br>";
        }
        // dd($matrixKeputusan);
        // dd($dataBuku);

        $matrixnormalisasiPerspektifJurusan = array();
        // $arrayAnggaran = array();
        $arrayJumlahPeminjam = array();
        $arrayHargaBuku = array();
        $arrayPenerbit = array();
        $arrayTahunTerbit = array();
        $arrayKetersediaanBuku = array();
        $noNormalisasi = 0;
        $hasilnya = 0;
        foreach ($matrixKeputusan as $mk) {
            // $arrayAnggaran[$noNormalisasi] = $mk['anggaran'];
            $arrayJumlahPeminjam[$noNormalisasi] = $mk['jumlah_peminjam'];
            $arrayHargaBuku[$noNormalisasi] = $mk['harga_buku'];
            $arrayPenerbit[$noNormalisasi] = $mk['penerbit_buku'];
            $arrayTahunTerbit[$noNormalisasi] = $mk['tahun_terbit'];
            $arrayKetersediaanBuku[$noNormalisasi] = $mk['ketersediaan_buku'];

            // echo "anggaran " . $noNormalisasi . "adalah" . $mk['anggaran'];
            // d(count($arraySimpan));
            // if ($noNormalisasi > 0) {
            //     $hasilnya = $hasilnya + $arrayAnggaran[$noNormalisasi - 1];
            // } else {
            //     $hasilnya = $arrayAnggaran[$noNormalisasi];
            // }
            // d($hasilnya);
            $noNormalisasi++;
        }
        for ($i = 0; $i < count($arrayJumlahPeminjam); $i++) {
            // $normalisasiAnggaran[$i] = $arrayAnggaran[$i] / sqrt(pow($arrayAnggaran[0], 2) + pow($arrayAnggaran[1], 2) + pow($arrayAnggaran[2], 2) + pow($arrayAnggaran[3], 2) + pow($arrayAnggaran[4], 2));

            // $jumlahNormalisasiAnggaran = 0;
            // for ($j = 0; $j < count($arrayAnggaran); $j++) {
            //     $jumlahNormalisasiAnggaran = $jumlahNormalisasiAnggaran + pow($arrayAnggaran[$j], 2);
            // }
            // d(count($arrayAnggaran));
            // d($jumlahNormalisasiAnggaran);

            $jumlahNormalisasiJumlahPeminjam = 0;
            for ($j = 0; $j < count($arrayJumlahPeminjam); $j++) {
                $jumlahNormalisasiJumlahPeminjam = $jumlahNormalisasiJumlahPeminjam + pow($arrayJumlahPeminjam[$j], 2);
            }


            $jnHargaBuku = 0;
            for ($j = 0; $j < count($arrayJumlahPeminjam); $j++) {
                $jnHargaBuku = $jnHargaBuku + pow($arrayHargaBuku[$j], 2);
            }



            $jnPenerbit = 0;
            for ($j = 0; $j < count($arrayJumlahPeminjam); $j++) {
                $jnPenerbit = $jnPenerbit + pow($arrayPenerbit[$j], 2);
            }

            $jnTahunTerbit = 0;
            for ($j = 0; $j < count($arrayJumlahPeminjam); $j++) {
                $jnTahunTerbit = $jnTahunTerbit + pow($arrayTahunTerbit[$j], 2);
            }

            $jnKetersediaanBuku = 0;
            for ($j = 0; $j < count($arrayJumlahPeminjam); $j++) {
                $jnKetersediaanBuku = $jnKetersediaanBuku + pow($arrayKetersediaanBuku[$j], 2);
            }

            // dd(sqrt($jumlahNormalisasiAnggaran));

            // $normalisasiJumlahPeminjam[$i] = $arrayJumlahPeminjam[$i] / sqrt(pow($arrayJumlahPeminjam[0], 2) + pow($arrayJumlahPeminjam[1], 2) + pow($arrayJumlahPeminjam[2], 2) + pow($arrayJumlahPeminjam[3], 2) + pow($arrayJumlahPeminjam[4], 2));



            // $normalisasiAnggaran[$i] = $arrayAnggaran[$i] / sqrt($jumlahNormalisasiAnggaran);
            $normalisasiJumlahPeminjam[$i] = $arrayJumlahPeminjam[$i] / sqrt($jumlahNormalisasiJumlahPeminjam);
            $normalisasiHargaBuku[$i] = $arrayHargaBuku[$i] / sqrt($jnHargaBuku);
            $normalisasiPenerbit[$i] = $arrayPenerbit[$i] / sqrt($jnPenerbit);
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
            $matrixnormalisasiPerspektifPerpus[$i] = array(
                // 'anggaran'  => round($normalisasiAnggaran[$i], 2),
                'jumlah_peminjam' => round($normalisasiJumlahPeminjam[$i], 2),
                'harga_buku'    => round($normalisasiHargaBuku[$i], 2),
                'penerbit' => round($normalisasiPenerbit[$i], 2),
                'tahun_terbit'  => round($normalisasiTahunTerbit[$i], 2),
                'ketersediaan_buku' => round($normalisasiKetersediaanBuku[$i], 2)
            );
        }
        // d($arrayAnggaran);
        // d($normalisasiAnggaran);
        d($matrixnormalisasiPerspektifJurusan);
        d($matrixKeputusan);
        // $this->nilaiOptimisasi($matrixnormalisasi);

        $this->nilaiOptimisasi($matrixnormalisasiPerspektifPerpus);
    }

    public function normalisasiPerspektifPemustaka()
    {

        $dataBuku = $this->bukuPemustaka->getBuku();


        $matrixKeputusan = array();
        $no = 0;
        d($dataBuku);
        foreach ($dataBuku as $data) {

            $nilaiPenerbit = $this->penerbitPemustaka($data['jumlah_penerbit']);

            $nilaiTahunTerbit = $this->tahunTerbitPemustaka($data['tahun_terbit_usulan']);

            // $nilaiPemustaka = $this->pemustaka($data['nomor_anggota']);
            // $nilaiJumlahKunjunganPemustaka = $this->jumlahKunjunganPemustaka($data['jumlah_kunjungan']);
            $nilaiJumlahPeminjamanPemustaka = $this->jumlahPeminjamanPemustaka($data['jumlah_meminjam_buku']);
            $nilaiJumlahUsulan = $this->jumlahUsulan($data['jumlah_usulan']);

            $matrixKeputusan[$no] = array(
                'penerbit_buku' => $nilaiPenerbit,
                'tahun_terbit_buku' => $nilaiTahunTerbit,
                // 'pemustaka'    => $nilaiPemustaka,
                // 'jumlah_kunjungan_pemustaka'    => $nilaiJumlahKunjunganPemustaka,
                'jumlah_peminjaman_pemustaka'  => $nilaiJumlahPeminjamanPemustaka,
                'jumlah_usulan' => $nilaiJumlahUsulan
            );

            $no++;
            echo " " . $data['penerbit_usulan'];
            echo " " . $data['tahun_terbit_usulan'];
            // echo " " . $data['nomor_anggota'];
            // echo " " . $data['jumlah_kunjungan'];
            echo " " . $data['jumlah_meminjam_buku'];
            echo " " . $data['jumlah_usulan'];
            echo "<br>";
        }
        // dd($matrixKeputusan);
        // dd($dataBuku);

        $matrixnormalisasiPerspektifPemustaka = array();
        $arrayPenerbitPemustaka = array();
        $arrayTahunTerbitPemustaka = array();
        // $arrayPemustaka = array();
        // $arrayJumlahKunjungan = array();
        $arrayJumlahPeminjaman = array();
        $arrayJumlahUsulan = array();
        $noNormalisasi = 0;
        $hasilnya = 0;
        foreach ($matrixKeputusan as $mk) {
            $arrayPenerbitPemustaka[$noNormalisasi] = $mk['penerbit_buku'];
            $arrayTahunTerbitPemustaka[$noNormalisasi] = $mk['tahun_terbit_buku'];
            // $arrayPemustaka[$noNormalisasi] = $mk['pemustaka'];
            // $arrayJumlahKunjungan[$noNormalisasi] = $mk['jumlah_kunjungan_pemustaka'];
            $arrayJumlahPeminjaman[$noNormalisasi] = $mk['jumlah_peminjaman_pemustaka'];
            $arrayJumlahUsulan[$noNormalisasi] = $mk['jumlah_usulan'];

            echo "penerbit " . $noNormalisasi . "adalah" . $mk['penerbit_buku'];
            // d(count($arraySimpan));
            // if ($noNormalisasi > 0) {
            //     $hasilnya = $hasilnya + $arrayAnggaran[$noNormalisasi - 1];
            // } else {
            //     $hasilnya = $arrayAnggaran[$noNormalisasi];
            // }
            // d($hasilnya);
            $noNormalisasi++;
        }
        for ($i = 0; $i < count($arrayPenerbitPemustaka); $i++) {
            // $normalisasiAnggaran[$i] = $arrayAnggaran[$i] / sqrt(pow($arrayAnggaran[0], 2) + pow($arrayAnggaran[1], 2) + pow($arrayAnggaran[2], 2) + pow($arrayAnggaran[3], 2) + pow($arrayAnggaran[4], 2));

            $jumlahNormalisasiPenerbit = 0;
            for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
                $jumlahNormalisasiPenerbit = $jumlahNormalisasiPenerbit + pow($arrayPenerbitPemustaka[$j], 2);
            }
            d(count($arrayPenerbitPemustaka));
            d($jumlahNormalisasiPenerbit);

            $jumlahNormalisasiTahunTerbit = 0;
            for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
                $jumlahNormalisasiTahunTerbit = $jumlahNormalisasiTahunTerbit + pow($arrayTahunTerbitPemustaka[$j], 2);
            }


            // $jnPemustaka = 0;
            // for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
            //     $jnPemustaka = $jnPemustaka + pow($arrayPemustaka[$j], 2);
            // }



            // $jnJumlahKunjungan = 0;
            // for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
            //     $jnJumlahKunjungan = $jnJumlahKunjungan + pow($arrayJumlahKunjungan[$j], 2);
            // }

            $jnJumlahPeminjaman = 0;
            for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
                $jnJumlahPeminjaman = $jnJumlahPeminjaman + pow($arrayJumlahPeminjaman[$j], 2);
            }

            $jnJumlahUsulan = 0;
            for ($j = 0; $j < count($arrayPenerbitPemustaka); $j++) {
                $jnJumlahUsulan = $jnJumlahUsulan + pow($arrayJumlahUsulan[$j], 2);
            }

            // dd(sqrt($jumlahNormalisasiAnggaran));




            $normalisasiPenerbitPemustaka[$i] = $arrayPenerbitPemustaka[$i] / sqrt($jumlahNormalisasiPenerbit);

            $normalisasiTahunTerbit[$i] = $arrayTahunTerbitPemustaka[$i] / sqrt($jumlahNormalisasiTahunTerbit);

            // $normalisasiPemustaka[$i] = $arrayPemustaka[$i] / sqrt($jnPemustaka);

            // $normalisasiJumlahKunjungan[$i] = $arrayJumlahKunjungan[$i] / sqrt($jnJumlahKunjungan);

            $normalisasiJumlahPeminjaman[$i] = $arrayJumlahPeminjaman[$i] / sqrt($jnJumlahPeminjaman);

            $normalisasiJumlahUsulan[$i] = $arrayJumlahUsulan[$i] / sqrt($jnJumlahUsulan);
        }

        for ($i = 0; $i < count($dataBuku); $i++) {
            // for($j=0; $j < count($arrayAnggaran))
            $matrixnormalisasiPerspektifPemustaka[$i] = array(
                'penerbit_usulan'  => round($normalisasiPenerbitPemustaka[$i], 2),
                'tahun_terbit_usulan' => round($normalisasiTahunTerbit[$i], 2),
                // 'nomor_anggota'    => round($normalisasiPemustaka[$i], 2),
                // 'jumlah_kunjungan' => round($normalisasiJumlahKunjungan[$i], 2),
                'jumlah_meminjam_buku'  => round($normalisasiJumlahPeminjaman[$i], 2),
                'jumlah_usulan' => round($normalisasiJumlahUsulan[$i], 2)
            );
        }
        // d($arrayAnggaran);
        // d($normalisasiAnggaran);
        // d($matrixnormalisasiPerspektifJurusan);
        d($matrixKeputusan);
        // $this->nilaiOptimisasi($matrixnormalisasi);
        $this->nilaiOptimisasiPemustaka($matrixnormalisasiPerspektifPemustaka);
    }

    // public function normalisasiPerspektifP($matrixnormalisasiPerspektifJurusan)
    // {
    //     $dataBuku = $this->bukuModel->getBuku();

    //     $matrixKeputusan = array();
    //     $no = 0;

    //     foreach ($dataBuku as $data) {

    //         $nilaiKurikulum = $this->kriteriaAnggaran($data['kurikulum_jurusan']);
    //         $nilaiKebutuhanJurusan = $this->kriteriaAnggaran($data['kebutuhan_jurusan']);
    //         $nilaiJumlahMahasiswa = $this->kriteriaAnggaran($data['jumlah_mahasiswa']);

    //         $matrixKeputusan[$no] = array(
    //             'kurikulum_jurusan' => $nilaiKurikulum,
    //             'kebutuhan_jurusan' => $nilaiKebutuhanJurusan,
    //             'jumlah_mahasiswa'    => $nilaiJumlahMahasiswa,

    //         );
    //         $no++;
    //     }
    //     d($dataBuku);

    //     $matrixnormalisasiPerspektifPerpus = array();

    //     $arrayKurikulumJurusan = array();
    //     $arrayKebutuhanJurusan = array();
    //     $arrayJumlahMahasiswa = array();

    //     $noNormalisasi = 0;
    //     $hasilnya = 0;
    //     foreach ($matrixKeputusan as $mk) {
    //         $arrayKurikulumJurusan[$noNormalisasi] = $mk['kurikulum_jurusan'];
    //         $arrayKebutuhanJurusan[$noNormalisasi] = $mk['kebutuhan_jurusan'];
    //         $arrayJumlahMahasiswa[$noNormalisasi] = $mk['jumlah_mahasiswa'];

    //         $noNormalisasi++;
    //     }

    //     for ($i = 0; $i < count($dataBuku); $i++) {



    //         $jnKurikulum = 0;
    //         for ($j = 0; $j < count($dataBuku); $j++) {
    //             $jnKurikulum = $jnKurikulum + pow($arrayKurikulumJurusan[$j], 2);
    //         }

    //         $jnKebutuhanJurusan = 0;
    //         for ($j = 0; $j < count($dataBuku); $j++) {
    //             $jnKebutuhanJurusan = $jnKebutuhanJurusan + pow($arrayKebutuhanJurusan[$j], 2);
    //         }

    //         $jnJumlahMahasiswa = 0;
    //         for ($j = 0; $j < count($dataBuku); $j++) {
    //             $jnJumlahMahasiswa = $jnJumlahMahasiswa + pow($arrayJumlahMahasiswa[$j], 2);
    //         }




    //         $normalisasiKurikulum[$i] = $arrayKurikulumJurusan[$i] / sqrt($jnKurikulum);
    //         $normalisasiKebutuhanJurusan[$i] = $arrayKebutuhanJurusan[$i] / sqrt($jnKebutuhanJurusan);
    //         $normalisasiJumlahMahasiswa[$i] = $arrayJumlahMahasiswa[$i] / sqrt($jnJumlahMahasiswa);
    //     }

    //     for ($i = 0; $i < count($dataBuku); $i++) {
    //         // for($j=0; $j < count($arrayAnggaran))
    //         $matrixnormalisasiPerspektifPerpus[$i] = array(
    //             'kurikulum_jurusan'  => round($normalisasiKurikulum[$i], 2),
    //             'kebutuhan_jurusan' => round($normalisasiKebutuhanJurusan[$i], 2),
    //             'jumlah_mahasiswa'    => round($normalisasiJumlahMahasiswa[$i], 2),

    //         );
    //     }
    //     // d($arrayAnggaran);
    //     // d($normalisasiAnggaran);
    //     d($matrixnormalisasiPerspektifPerpus);
    //     d($matrixKeputusan);
    //     $this->nilaiOptimisasi($matrixnormalisasiPerspektifJurusan, $matrixnormalisasiPerspektifPerpus);
    // }

    public function nilaiOptimisasi($matrixnormalisasiPerspektifPerpus)
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
        // $wAnggaran = ;
        $wjumlahPeminjam = 0.11;
        $wHargaBuku = 0.17;
        $wPenerbitBuku = 0.22;
        $wtahunTerbit = 0.22;
        $wKetersediaanBuku = 0.28;
        // d($wAnggaran);
        d($wjumlahPeminjam);
        d($wHargaBuku);
        d($wPenerbitBuku);
        d($wtahunTerbit);
        d($wKetersediaanBuku);

        $bankUrutanPerspektifJurusan = array();
        $itungBuku = $this->bukuModel->countAllResults();

        // for ($i = 0; $i < $itungBuku; $i++) {


        // }
        $bankUrutanPerspektifPerpus = array();
        $i = 0;
        foreach ($matrixnormalisasiPerspektifPerpus as $mn) {
            // dd($mn['anggaran']);
            // $kali1 = ($wAnggaran * $mn['anggaran']);
            $kali2 = ($wjumlahPeminjam * $mn['jumlah_peminjam']);
            $kali3 = ($wPenerbitBuku * $mn['penerbit']);
            $kali4 = ($wtahunTerbit * $mn['tahun_terbit']);

            $tambah1 = round($kali2, 6) + round($kali3, 6) + round($kali4, 6);

            d($tambah1);
            $kali5 = ($wHargaBuku * $mn['harga_buku']);
            $kali6 = ($wKetersediaanBuku * $mn['ketersediaan_buku']);

            $tambah2 = round($kali5, 6) + round($kali6, 6);
            d($tambah2);
            $hasil = $tambah1 - $tambah2;
            $bankUrutanPerspektifPerpus[$i] = $hasil;
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


        $j = 0;
        d($matrixnormalisasiPerspektifPerpus);
        // foreach ($matrixnormalisasiPerspektifPerpus as $mn) {

        //     $kali1 = ($wAnggaran * $mn['kurikulum_jurusan']);
        //     $kali2 = ($wAnggaran * $mn['kebutuhan_jurusan']);
        //     $kali3 = ($wAnggaran * $mn['jumlah_mahasiswa']);

        //     d($kali1);
        //     d($kali2);
        //     d($kali3);

        //     $tambah1 = round($kali1, 2) + round($kali2, 2) + round($kali3, 2);



        //     $hasil = $tambah1;
        //     $bankUrutanPerspektifPerpus[$j] = $hasil;

        //     $j++;
        //     d($j);
        // }
        // d($bankUrutanPerspektifJurusan);
        d($bankUrutanPerspektifPerpus);


        $datanya = $this->bukuPengadaan->first();
        $idBuku = $datanya['id_buku'];

        $alternatif = array();
        for ($i = 0; $i < count($bankUrutanPerspektifPerpus); $i++) {
            $alternatif[$i] = ($bankUrutanPerspektifPerpus[$i]);

            $this->bukuModel->update($idBuku, [
                'nilai_optimasi' => $alternatif[$i]

            ]);
            $idBuku++;
        }
        d($bankUrutanPerspektifPerpus);


        // dd($alternatif);
        // dd($bankUrutanPerspektifJurusan);
        // dd($itungBuku);
    }

    public function nilaiOptimisasiPemustaka($matrixnormalisasiPerspektifPemustaka)
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

        $wPenerbitPemustaka = 0.25;
        $wTahunTerbitPemustaka = 0.25;
        // $wPemustaka = 3;
        // $wJumlahKunjungan = 2;
        $wJumlahPeminjaman = 0.17;
        $wJumlahUsulan = 0.33;

        // d($wAnggaran);
        // d($wjumlahPeminjam);
        // d($wHargaBuku);
        // d($wPenerbitBuku);
        // d($wtahunTerbit);
        // d($wKetersediaanBuku);

        $bankUrutanPerspektifPemustaka = array();
        $itungBuku = $this->bukuPemustaka->countAllResults();

        // for ($i = 0; $i < $itungBuku; $i++) {


        // }
        $bankUrutanPerspektifPemustaka = array();
        $i = 0;
        foreach ($matrixnormalisasiPerspektifPemustaka as $mn) {
            // dd($mn['anggaran']);
            $kali1 = ($wPenerbitPemustaka * $mn['penerbit_usulan']);
            d($mn['penerbit_usulan']);
            d($kali1);
            $kali2 = ($wTahunTerbitPemustaka * $mn['tahun_terbit_usulan']);
            // $kali3 = ($wPemustaka * $mn['nomor_anggota']);
            // $kali4 = ($wJumlahKunjungan * $mn['jumlah_kunjungan']);
            $kali5 = ($wJumlahPeminjaman * $mn['jumlah_meminjam_buku']);
            $kali6 = ($wJumlahUsulan * $mn['jumlah_usulan']);

            $tambah1 = round($kali1, 6) + round($kali2, 6) + round($kali5, 6) + round($kali6, 6);

            d($tambah1);



            $bankUrutanPerspektifPemustaka[$i] = $tambah1;
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


        $j = 0;
        d($matrixnormalisasiPerspektifPemustaka);
        // foreach ($matrixnormalisasiPerspektifPerpus as $mn) {

        //     $kali1 = ($wAnggaran * $mn['kurikulum_jurusan']);
        //     $kali2 = ($wAnggaran * $mn['kebutuhan_jurusan']);
        //     $kali3 = ($wAnggaran * $mn['jumlah_mahasiswa']);

        //     d($kali1);
        //     d($kali2);
        //     d($kali3);

        //     $tambah1 = round($kali1, 2) + round($kali2, 2) + round($kali3, 2);



        //     $hasil = $tambah1;
        //     $bankUrutanPerspektifPerpus[$j] = $hasil;

        //     $j++;
        //     d($j);
        // }
        // d($bankUrutanPerspektifJurusan);
        d($bankUrutanPerspektifPemustaka);


        $datanya = $this->bukuPemustaka->first();
        $idBuku = $datanya['id_usulan'];


        $alternatif = array();
        for ($i = 0; $i < count($bankUrutanPerspektifPemustaka); $i++) {
            $alternatif[$i] = ($bankUrutanPerspektifPemustaka[$i]);

            $this->bukuPemustaka->update($idBuku, [
                'nilai_optimasi' => $alternatif[$i]

            ]);
            $idBuku++;
        }
        d($bankUrutanPerspektifPemustaka);
        // dd($alternatif);
        // dd($bankUrutanPerspektifJurusan);
        // dd($itungBuku);
    }
}
