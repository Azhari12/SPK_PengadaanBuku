<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>




<?php //if (session()->get('level_akses') == 'admin') : 
?>







<!-- Nav tabs -->


<!-- Tab panes -->
<svg class="hidden">
    <defs>
        <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
    </defs>
</svg>

<a href="rekomendasiakhir/prosesborda" class="fcbtn btn btn-success btn-outline btn-1e">Proses Borda (Finalisasi Rekomendasi)</a>
</br>
</br>
</br>
<div class="sttabs tabs-style-shape">
    <nav>
        <ul>
            <li class="">
                <a href="#section-shape-1">
                    <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                        <use xlink:href="#tabshape"></use>
                    </svg> <span>Pengadaan Perspektif Perpustakaan</span> </a>


            </li>

            <li class="">
                <a href="#section-shape-5">
                    <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                        <use xlink:href="#tabshape"></use>
                    </svg> <span>Pengadaan Perspektif Pemustaka</span> </a>
            </li>
        </ul>
    </nav>
    <div class="content-wrap">

        <section id="section-shape-1" class="">

            <h3 class="box-title m-b-0">Pengadaan Perspektif Perpustakaan</h3>
            <p class="text-muted m-b-30"></p>


            <div class="table-responsive">


                <table id="myTable" class="table table-striped">

                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Judul Buku</th>
                            <th>Jumlah Peminjaman Buku</th>
                            <th>Harga Buku</th>
                            <th>Penerbit Buku (Jumlah Penerbit)</th>
                            <th>Tahun Terbit Buku</th>
                            <th>Stok Buku</th>
                            <th>Nilai Yi</th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        $belumRangking = true;
                        foreach ($rangking as $de) :
                            $d = json_decode(json_encode($de), true);
                            if ($d['nilai_optimasi'] != 0) {
                                $belumRangking = false;
                            }
                            if ($belumRangking == false) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['judul_buku']; ?></td>
                                    <td><?= $d['buku_dipinjam']; ?></td>
                                    <td><?= $d['harga_buku']; ?></td>
                                    <td><?= $d['penerbit_buku'];  ?> ( <?= $d['jumlah_penerbit_buku'] ?> )</td>
                                    <td><?= $d['tahun_terbit_buku']; ?></td>
                                    <td><?= $d['ketersediaan_buku']; ?></td>
                                    <td><?= $d['nilai_optimasi']; ?></td>
                                </tr>
                        <?php
                            endif;
                        endforeach; ?>

                    </tbody>
                </table>
            </div>
        </section>
        <section id="section-shape-5" class="">
            <h3 class="box-title m-b-0">Pengadaan Perspektif Pemustaka</h3>
            <p class="text-muted m-b-30"></p>

            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Rangking</th>
                            <th>Judul</th>
                            <th>Penerbit (Jumlah Penerbit)</th>
                            <th>Tahun Terbit</th>
                            <th>Jumlah Meminjam Buku</th>
                            <th>Jumlah Usulan</th>
                            <th>Nilai Yi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemustaka as $d) :
                            $d = json_decode(json_encode($d), true);
                            if ($d['nilai_optimasi'] != 0) {
                                $belumRangking = false;
                            }
                            if ($belumRangking == false) :
                        ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['judul_usulan']; ?></td>
                                    <td><?= $d['penerbit_usulan']; ?> ( <?= $d['jumlah_penerbit'] ?> )</td>
                                    <td><?= $d['tahun_terbit_usulan']; ?></td>

                                    <td><?= $d['jumlah_meminjam_buku']; ?></td>
                                    <td><?= $d['jumlah_usulan']; ?></td>
                                    <td><?= $d['nilai_optimasi']; ?></td>
                                </tr>
                        <?php
                            endif;
                        endforeach; ?>

                    </tbody>

                </table>
            </div>
        </section>

    </div>
    <!-- /content -->
</div>



<?= $this->endSection(); ?>