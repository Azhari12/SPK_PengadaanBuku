<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>




<?php //if (session()->get('level_akses') == 'admin') : 
?>







<!-- Nav tabs -->


<!-- Tab panes -->

<div class="content-wrap">

    <h3 class="box-title m-b-0">Pengadaan Perspektif Perpustakaan</h3>
    <p class="text-muted m-b-30"></p>

    <div class="white-box" style="padding-bottom: 50px;">
        <form action="menubaru/upload" method="POST" enctype="multipart/form-data">

        </form>

        </br>
        </br>
        </br>
        <h3 class="box-title m-b-0">Bordered Table</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kriteria</th>
                        <th>Bobot</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($perpus_bobot as $d) :
                        $no++;
                    ?>
                        <tr>
                            <td><?= $d['nama_kriteria']; ?></td>
                            <td><?= $d['bobot_kriteria']; ?></td>
                            <td class="text-nowrap">
                                <button type="button" class="btn btn-warning btn-outline btn-circle btn-md m-r-5" data-toggle="modal" data-target="#edit_modal<?= $no; ?>" data-whatever="@fat"><i class="ti-pencil-alt"></i></button>
                                <div class="modal fade" id="edit_modal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="bobotkriteria/update/<?= $d['id']; ?>" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Akun Bank</h4>
                                                </div>
                                                <div class="modal-body">
                                                    </b></p>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Bobot Kriteria</label>
                                                        <input value="<?= $d['bobot_kriteria']; ?>" name="bobot_kriteria" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Bank">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>

    </div>



</div>
<!-- /content -->




<?= $this->endSection(); ?>