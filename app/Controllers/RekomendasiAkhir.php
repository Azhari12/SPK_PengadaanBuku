<?php

namespace App\Controllers;

use App\Models\BordaModel;
use App\Models\PengadaanModel;
use App\Models\UsulanModel;

class RekomendasiAkhir extends BaseController
{
    protected $usulanModel;
    protected $pengadaanModel;
    protected $borda;

    public function __construct()
    {

        $this->usulanModel = new UsulanModel();
        $this->pengadaanModel = new PengadaanModel();
        $this->borda = new BordaModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Pengadaan',
            'validation' => \config\Services::validation(),
            'pemustaka' => $this->usulanModel->getBuku(),
            'borda'     => $this->borda->getRangking(),
            'optimasi'     => $this->borda->getOptimasi()
            // 'rangking'  => $this->p->getUrutan()
        ];

        return view('/rekomendasiakhir', $data);
    }


    public function proses()
    {
        $dataPerpus = $this->pengadaanModel->getRangking();
        $dataPemus = $this->usulanModel->getRangking();


        $d = json_decode(json_encode($dataPerpus), true);
        d($d);
        $no = 0;
        $nilaiAtas = 0;
        if (count($dataPerpus) >= count($dataPemus)) {
            $nilaiAtas = count($dataPerpus);
        } else if (count($dataPemus) >= count($dataPemus)) {
            $nilaiAtas = count($dataPemus);
        }


        $bordaPerpus = $nilaiAtas;
        foreach ($d as $de) {
            d($de['nilai_optimasi']);
            $idBuku = $d[$no]['id_buku'];

            d(count($dataPerpus));
            d();

            // $alternatif[$i] = ($bankUrutanPerspektifPemustaka[$i]);

            $this->pengadaanModel->update($idBuku, [
                'borda_perpus' => $bordaPerpus--

            ]);
            d($idBuku, $bordaPerpus);
            $no++;
        }
        // d($d[1]['id_buku']);




        d();

        $pemus = json_decode(json_encode($dataPemus), true);
        d($pemus);
        $no = 0;
        $nilaiAtasP = 0;
        if (count($dataPemus) >= count($dataPerpus)) {
            $nilaiAtasP = count($dataPemus);
            d("pemustrue");
        } else if (count($dataPerpus) >= count($dataPemus)) {
            $nilaiAtasP = count($dataPerpus);
            d("perpustrue");
        }
        $bordaPemus = $nilaiAtasP;
        d($bordaPemus);
        foreach ($pemus as $de) {
            d($de['nilai_optimasi']);
            $idBuku = $pemus[$no]['id_usulan'];

            d(count($dataPemus));
            d();

            // $alternatif[$i] = ($bankUrutanPerspektifPemustaka[$i]);

            $this->usulanModel->update($idBuku, [
                'borda_pemus' => $bordaPemus--

            ]);
            d($idBuku, $bordaPemus);
            $no++;
        }

        d($nilaiAtas);
        d($nilaiAtasP);
        $this->prosesPenggabungan();
    }

    public function prosesPenggabungan()
    {
        $dataPerpus = $this->pengadaanModel->getBuku();
        $dataPemus = $this->usulanModel->getBuku();

        $dataPenggabungan = array();
        $countGabung = count($dataPerpus) + count($dataPemus);
        $judulSama = array();
        $angka = 0;
        $a = 0;
        $b = 0;
        for ($i = 0; $i < $countGabung; $i++) {
            $bordaSama = 0;
            if ($i < count($dataPerpus)) {
                $hasil_borda = $dataPerpus[$i]['borda_perpus'];
                for ($j = 0; $j < count($dataPemus); $j++) {
                    if ($dataPerpus[$i]['judul_buku'] == $dataPemus[$j]['judul_usulan']) {
                        $hasil_borda = $dataPerpus[$i]['borda_perpus'] + $dataPemus[$j]['borda_pemus'];
                        $judulSama[$angka] = $i;
                        $angka++;
                    }
                }
                $dataPenggabungan[$i] = array(
                    'id_perpus' => $dataPerpus[$i]['id_buku'],
                    'id_pemus'  => null,
                    'judul' => $dataPerpus[$i]['judul_buku'],
                    'harga_buku' => $dataPerpus[$i]['harga_buku'],
                    'nilai_optimasi_perpustakaan' => $dataPerpus[$i]['nilai_optimasi'],
                    'nilai_optimasi_pemustaka' => null,
                    'hasil_borda' => $hasil_borda
                );
                // d($dataPerpus[1]['id_buku']);
            }
        }

        $nomornya = count($dataPenggabungan);
        $nomorSama = 0;
        $nomorTidakSama = 0;

        for ($a = 0; $a < count($dataPemus); $a++) {


            // if ($dataPerpus[$a]['judul_buku'] != $dataPenggabungan[0]['judul'] && $dataPerpus[$a]['judul_buku'] != $dataPenggabungan[1]['judul'] && $dataPerpus[$a]['judul_buku'] != $dataPenggabungan[2]['judul']) {
            //     $dataPenggabungan[$nomornya] = array(
            //         'id_perpus' => null,
            //         'id_pemus' => $dataPemus[$a]['id_usulan'],
            //         'judul' => $dataPemus[$a]['judul_usulan'],
            //         'hasil_borda' => $dataPemus[$a]['borda_pemus']
            //     );
            // }
            // $batas = 0;
            // if (count($judulSama) > 0) {
            //     d($countGabung);
            //     if ($nomorSama >= count($judulSama)) {
            //         $batas = count($judulSama) + 1;
            //     } else {
            //         $batas =  count($judulSama);
            //     }
            //     if ($nomorSama < $batas) {
            //         // d($dataPemus[$a]['judul_usulan']);
            //         // d($dataPenggabungan[$judulSama[$nomorSama]]['judul']);
            //         // d($nomorSama);

            //         if ($dataPemus[$a]['judul_usulan'] != $dataPenggabungan[$judulSama[$nomorSama]]['judul']) {
            //             $dataPenggabungan[$nomornya] = array(
            //                 'id_perpus' => null,
            //                 'id_pemus' => $dataPemus[$a]['id_usulan'],
            //                 'judul' => $dataPemus[$a]['judul_usulan'],
            //                 'nilai_optimasi' => $dataPemus[$a]['nilai_optimasi'],
            //                 'hasil_borda' => $dataPemus[$a]['borda_pemus']
            //             );
            //         } else {
            //             $nomorSama++;
            //         }
            //         d($dataPenggabungan);
            //         d($nomorSama);
            //     }
            // } else {
            //     d(true);
            //     $dataPenggabungan[$nomornya] = array(
            //         'id_perpus' => null,
            //         'id_pemus' => $dataPemus[$a]['id_usulan'],
            //         'judul' => $dataPemus[$a]['judul_usulan'],
            //         'nilai_optimasi' => $dataPemus[$a]['nilai_optimasi'],
            //         'hasil_borda' => $dataPemus[$a]['borda_pemus']
            //     );
            // }
            $sama = "tidak";
            for ($i = 0; $i < count($judulSama); $i++) {
                d(count($judulSama));
                d($judulSama);
                $nomorsamo = $judulSama[$i];
                d($nomorsamo);

                if ($dataPemus[$a]['judul_usulan'] == $dataPenggabungan[$judulSama[$i]]['judul']) {
                    $sama = "iya";


                    $dataPenggabungan[$nomorsamo] = array(
                        'id_perpus' => $dataPerpus[$nomorsamo]['id_buku'],
                        'id_pemus'  => $dataPemus[$a]['id_usulan'],
                        'judul' => $dataPerpus[$nomorsamo]['judul_buku'],
                        'harga_buku' => $dataPerpus[$nomorsamo]['harga_buku'],
                        'nilai_optimasi_perpustakaan' => $dataPerpus[$nomorsamo]['nilai_optimasi'],
                        'nilai_optimasi_pemustaka' => $dataPemus[$a]['nilai_optimasi'],
                        'hasil_borda' => $dataPerpus[$nomorsamo]['borda_perpus'] + $dataPemus[$a]['borda_pemus']

                    );
                }
            }
            if ($sama == "iya") {
            } else {
                $dataPenggabungan[$nomornya] = array(
                    'id_perpus' => null,
                    'id_pemus' => $dataPemus[$a]['id_usulan'],
                    'judul' => $dataPemus[$a]['judul_usulan'],
                    'harga_buku' => null,
                    'nilai_optimasi_perpustakaan' => null,
                    'nilai_optimasi_pemustaka' => $dataPemus[$a]['nilai_optimasi'],
                    'hasil_borda' => $dataPemus[$a]['borda_pemus']
                );
            }

            $nomornya++;
        }

        d($dataPenggabungan);

        d($judulSama);
        d($dataPenggabungan);

        $this->borda->insertBatch($dataPenggabungan);
    }

    public function prosesBorda()
    {
        d("ini bisa");

        $this->proses();
        return redirect()->to('/rekomendasiakhir');
        d("kok ga bis");
    }

    public function delete()
    {
        $this->borda->deleteAll();
    }
}
