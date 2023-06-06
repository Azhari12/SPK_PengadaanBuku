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


<div class="content-wrap">


    <h3 class="box-title m-b-0">Pengadaan Perspektif Pemustaka</h3>
    <p class="text-muted m-b-30"></p>

    <div class="table-responsive">


        <table id="myTable" class="table table-striped">

            <thead>
                <tr>
                    <th>No</th>
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
                $belumRangking = true;
                foreach ($pemustaka as $de) :
                    $d = json_decode(json_encode($de), true);
                    // dd($d['nilai_optimasi']);
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

</div>
<!-- /content -->
</div>



<?= $this->endSection(); ?>