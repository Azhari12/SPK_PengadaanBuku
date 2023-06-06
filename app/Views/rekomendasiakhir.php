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

<?php
$no = 1;
$belumRangking = true;
$jumlah = 0;
foreach ($optimasi as $de) {

    $d = json_decode(json_encode($de), true);

    $jumlah = $jumlah + $d['hasil_borda'];
}
?>
<div class="content-wrap">


    <h3 class="box-title m-b-0">Rekomendasi Akhir Hasil Metode Borda</h3>
    <p class="text-muted m-b-30"></p>

    <div class="table-responsive">


        <table id="myTable" class="table table-striped">

            <thead>
                <tr>
                    <?php if ($jumlah == 2) : ?>
                        <th>Rangking</th>
                        <th>Judul Buku</th>
                        <th>Harga Buku</th>
                        <th>Nilai Yi Perpustakaan</th>
                        <th>Nilai Yi Pemustaka</th>
                        <th>Nilai Borda</th>

                    <?php else : ?>
                        <th>Rangking</th>
                        <th>Judul Buku</th>
                        <th>Harga Buku</th>
                        <th>Nilai Yi Perpustakaan</th>
                        <th>Nilai Yi Pemustaka</th>
                        <th>Nilai Borda</th>
                    <?php endif; ?>



                </tr>
            </thead>
            <tbody>

                <?php
                $no = 1;
                $belumRangking = true;
                // $jumlah = 0;
                // for ($i = 0; $i < count($borda); $i++) {
                //     $jumlah++;
                // }
                if ($jumlah == 2) :
                    foreach ($optimasi as $de) :

                        $d = json_decode(json_encode($de), true);


                        // dd($d['nilai_optimasi']);
                        if ($d['hasil_borda'] != 0) {
                            $belumRangking = false;
                        }
                        if ($belumRangking == false) :

                ?>
                            <tr>

                                <td><?= $no++; ?></td>
                                <td><?= $d['judul']; ?></td>
                                <td><?= $d['harga_buku']; ?></td>
                                <td><?= $d['nilai_optimasi_perpustakaan']; ?></td>
                                <td><?= $d['nilai_optimasi_pemustaka']; ?></td>
                                <td><?= $d['hasil_borda']; ?></td>


                            </tr>
                        <?php
                        endif;
                    endforeach;
                else :
                    foreach ($borda as $de) :

                        $d = json_decode(json_encode($de), true);


                        // dd($d['nilai_optimasi']);
                        if ($d['hasil_borda'] != 0) {
                            $belumRangking = false;
                        }
                        if ($belumRangking == false) :
                        ?>
                            <tr>

                                <td><?= $no++; ?></td>
                                <td><?= $d['judul']; ?></td>
                                <td><?= $d['harga_buku']; ?></td>
                                <td><?= $d['nilai_optimasi_perpustakaan']; ?></td>
                                <td><?= $d['nilai_optimasi_pemustaka']; ?></td>
                                <td><?= $d['hasil_borda']; ?></td>


                            </tr>
                <?php endif;
                    endforeach;
                endif; ?>

            </tbody>
        </table>
    </div>

</div>
<!-- /content -->
</div>



<?= $this->endSection(); ?>