<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>




<?php //if (session()->get('level_akses') == 'admin') : 
?>







<!-- Nav tabs -->


<!-- Tab panes -->






<div class="content-wrap">

    <h3 class="box-title m-b-0">Pengadaan Perspektif Pemustaka</h3>
    <p class="text-muted m-b-30"></p>
    <div class="white-box" style="padding-bottom: 50px;">
        <form action="pemustaka/uploadUsulan" method="POST" enctype="multipart/form-data">
            <h3 class="box-title">Upload File Excel</h3>
            <label for="input-file-max-fs"></label>
            <input required="" name="upload_file" type="file" id="input-file-max-fs" class="dropify" data-max-file-size="512M" />
            <br>
            <div class="col-lg-2 col-sm-4 col-xs-12">
                <button class="btn btn-block btn-info btn-rounded">Upload File Excel</button>
            </div>
        </form>
        <a style="float: right;" href="rangkingbuku/prosesPemustaka" class="fcbtn btn btn-success btn-outline btn-1e">Proses Rekomendasi Buku</a>
    </div>

    <div class="table-responsive">
        <div class="col-lg-2 col-sm-4 col-xs-12">
            <a href="pemustaka/delete" class="fcbtn btn btn-danger btn-outline btn-1e">Hapus Data</a>
        </div>
        </br>
        </br>
        </br>
        <table id="myTable" class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penerbit (Jumlah Penerbit)</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah Meminjam Buku</th>
                    <th>Jumlah Usulan</th>
                    <th>Nilai Optimasi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($pemustaka as $d) :
                    $no++; ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $d['judul_usulan']; ?></td>
                        <td><?= $d['penerbit_usulan']; ?> ( <?= $d['jumlah_penerbit'] ?> )</td>
                        <td><?= $d['tahun_terbit_usulan']; ?></td>
                        <td><?= $d['jumlah_meminjam_buku']; ?></td>
                        <td><?= $d['jumlah_usulan']; ?></td>
                        <td><?= $d['nilai_optimasi']; ?></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>

</div>
<!-- /content -->



<?= $this->endSection(); ?>