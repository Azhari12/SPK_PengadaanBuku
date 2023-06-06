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
        <form action="menubaru/upload" method="POST" enctype="multipart/form-data">

        </form>

        </br>
        </br>
        </br>



        <h3 class="box-title m-b-0">Nilai Penerbit Buku</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Penerbit buku</th>
                        <th>Nilai</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $tanda = '';
                    $sebelum[] = 0;
                    $sambung = '';
                    foreach ($nilai_penerbit as $d) :
                        $no++;

                    ?>

                        <tr>
                            <td><?= $d['ukuran']; ?></td>
                            <td><?= $d['nilai']; ?></td>
                            <td class="text-nowrap">
                                <button type="button" class="btn btn-warning btn-outline btn-circle btn-md m-r-5" data-toggle="modal" data-target="#edit_penerbit<?= $no; ?>" data-whatever="@fat"><i class="ti-pencil-alt"></i></button>
                                <div class="modal fade" id="edit_penerbit<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="nilaikriteriapemustaka/updatePenerbit/<?= $d['id']; ?>" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Akun Bank</h4>
                                                </div>
                                                <div class="modal-body">
                                                    </b></p>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ukuran</label>
                                                        <input value="<?= $d['ukuran']; ?>" name="ukuran" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Bank">
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

        <h3 class="box-title m-b-0">Nilai Tahun Terbit Buku</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tahun Terbit buku</th>
                        <th>Nilai</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $tanda = '';
                    $sebelum[] = 0;
                    $sambung = '';
                    foreach ($nilai_tahun_terbit as $d) :
                        $no++;
                        $sebelum[$no - 1] = $d['ukuran'];
                        if ($no == 1) {
                            $tanda = '>=';
                            $sambung = '';
                        } elseif ($no == 5) {
                            $tanda = '<';
                            $sambung = '';
                        } else {
                            $tanda = '';
                            // d($no);
                            // dd($sebelum);
                            $sambung = '-' . $sebelum[$no - 2] + 1;
                        }
                    ?>

                        <tr>
                            <td><?= $tanda . $d['ukuran'] . $sambung; ?></td>
                            <td><?= $d['nilai']; ?></td>
                            <td class="text-nowrap">
                                <button type="button" class="btn btn-warning btn-outline btn-circle btn-md m-r-5" data-toggle="modal" data-target="#edit_tahun_terbit<?= $no; ?>" data-whatever="@fat"><i class="ti-pencil-alt"></i></button>
                                <div class="modal fade" id="edit_tahun_terbit<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="nilaikriteriapemustaka/updateTahunTerbit/<?= $d['id']; ?>" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Akun Bank</h4>
                                                </div>
                                                <div class="modal-body">
                                                    </b></p>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ukuran</label>
                                                        <input value="<?= $d['ukuran']; ?>" name="ukuran" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Bank">
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

        <h3 class="box-title m-b-0">Nilai Nomor Anggota</h3>
        <p class="text-muted m-b-20">Add<code>.table-bordered</code>for borders on all sides of the table and cells.</p>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Jenis Nomor Anggota</th>
                        <th>Nilai</th>
                        <th class="text-nowrap">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $tanda = '';
                    $sebelum[] = 0;
                    $sambung = '';
                    foreach ($nilai_nomor_anggota as $d) :

                    ?>

                        <tr>
                            <td><?= $d['ukuran']; ?></td>
                            <td><?= $d['nilai']; ?></td>
                            <td class="text-nowrap">
                                <button type="button" class="btn btn-warning btn-outline btn-circle btn-md m-r-5" data-toggle="modal" data-target="#edit_tahun_terbit<?= $no; ?>" data-whatever="@fat"><i class="ti-pencil-alt"></i></button>
                                <div class="modal fade" id="edit_tahun_terbit<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <form action="nilaikriteriapemustaka/updateNomorAnggota/<?= $d['id']; ?>" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="exampleModalLabel1">Edit Akun Bank</h4>
                                                </div>
                                                <div class="modal-body">
                                                    </b></p>

                                                    <div class="form-group">
                                                        <label for="exampleInputEmail1">Ukuran</label>
                                                        <input value="<?= $d['ukuran']; ?>" name="ukuran" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Bank">
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