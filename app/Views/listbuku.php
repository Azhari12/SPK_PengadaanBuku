<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<svg class="hidden">
    <defs>
        <path id="tabshape" d="M80,60C34,53.5,64.417,0,0,0v60H80z" />
    </defs>
</svg>

<div class="sttabs tabs-style-shape">
    <nav>
        <ul>
            <li class="">
                <a href="#section-shape-1">
                    <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                        <use xlink:href="#tabshape"></use>
                    </svg> <span>Daftar Buku Yang Telah Didaftarkan</span> </a>


            </li>

            <li class="">
                <a href="#section-shape-5">
                    <svg viewBox="0 0 80 60" preserveAspectRatio="none">
                        <use xlink:href="#tabshape"></use>
                    </svg> <span>Daftar Buku yang Telah di Urutkan</span> </a>
            </li>
        </ul>
    </nav>
    <div class="content-wrap">
        <section id="section-shape-1" class="">
            <h3 class="box-title m-b-0">Tabel Buku </h3>

            <p class="text-muted m-b-30">Data table example</p>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"> + Tambah Buku</button>
            <a style="float: right;" href="rangkingbuku/proses" class="fcbtn btn btn-success btn-outline btn-1e">Proses Ranking Buku</a>
            <br>
            <br>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="listbuku/save" method="post">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="exampleModalLabel1">Tambah Rangking Buku</h4>
                            </div>
                            <div class="modal-body">
                                </b></p>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Buku</label>
                                    <input value="<?= old('nama_buku'); ?>" name="nama_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Buku">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Harga Buku</label>
                                    <input value="<?= old('harga_buku'); ?>" name="harga_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Harga Buku">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Peminjam</label>
                                    <input value="<?= old('jumlah_peminjam'); ?>" name="jumlah_peminjam" type="text" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Peminjam">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Edisi Buku</label>
                                    <input value="<?= old('edisi_buku'); ?>" name="edisi_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Edisi Buku">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Berdiri Penerbit</label>
                                    <input value="<?= old('tahun_berdiri'); ?>" name="tahun_berdiri" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tahun Berdiri Penerbit">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tahun Terbit Buku</label>
                                    <input value="<?= old('tahun_terbit'); ?>" name="tahun_terbit" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tahun Terbit Buku">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Ketersediaan Buku</label>
                                    <input value="<?= old('ketersediaan_buku'); ?>" name="ketersediaan_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Ketersediaan Buku">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Kurikulum Jurusan</label>
                                    <input value="<?= old('kurikulum_jurusan'); ?>" name="kurikulum_jurusan" type="text" class="form-control" id="exampleInputEmail1" placeholder="Kurikulum Jurusan">
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-3 control-label">
                                            <label class="control-label ">Kebutuhan Jurusan</label>
                                        </div>
                                        <div class="col-sm-9 control-label">
                                            <div class="radio-list">
                                                <div class="col-md-3 control-label">
                                                    <label>
                                                        <input name="kebutuhan_jurusan" value="Butuh" type="radio">
                                                        Butuh
                                                    </label>
                                                </div>
                                                <div class="col-md-3 control-label">
                                                    <label>
                                                        <input name="kebutuhan_jurusan" value="Tidak" type="radio">
                                                        Tidak Butuh </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Jumlah Mahasiswa</label>
                                    <input value="<?= old('jumlah_mahasiswa'); ?>" name="jumlah_mahasiswa" type="text" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Mahasiswa">
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

            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Buku</th>
                            <th>Anggaran</th>
                            <th>Jumlah Peminjam</th>
                            <th>Harga Buku</th>
                            <th>Edisi Buku</th>
                            <th>Tahun Berdiri</th>
                            <th>Tahun Terbit</th>
                            <th>Ketersediaan Buku</th>
                            <th>Kurikulum Jurusan</th>
                            <th>Kebutuhan Jurusan</th>
                            <th>Jumlah Mahasiswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($daftar_buku as $d) :
                            $no++;
                        ?>
                            <tr>
                                <td><?= $d['nama_buku']; ?></td>
                                <td><?= $d['anggaran']; ?></td>
                                <td><?= $d['jumlah_peminjam']; ?></td>
                                <td><?= $d['harga_buku']; ?></td>
                                <td><?= $d['edisi_buku']; ?></td>
                                <td><?= $d['tahun_berdiri']; ?></td>
                                <td><?= $d['tahun_terbit']; ?></td>
                                <td><?= $d['ketersediaan_buku']; ?></td>
                                <td><?= $d['kurikulum_jurusan']; ?></td>
                                <td><?= $d['kebutuhan_jurusan']; ?></td>
                                <td><?= $d['jumlah_mahasiswa']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning btn-outline btn-circle btn-md m-r-5" data-toggle="modal" data-target="#edit_modal<?= $no; ?>" data-whatever="@fat"><i class="ti-pencil-alt"></i></button>
                                    <a href="listbuku/delete/<?= $d['id_buku']; ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-md m-r-5" onclick="return confirm('Anda Yakin Menghapus Data?')"><i class="icon-trash"></i></button></a>

                                    <div class="modal fade" id="edit_modal<?= $no; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <form action="listbuku/update/<?= $d['id_buku']; ?>" method="post">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title" id="exampleModalLabel1">Edit Akun Bank</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        </b></p>

                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Nama Buku</label>
                                                            <input value="<?= $d['nama_buku']; ?>" name="nama_buku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Bank">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1">Harga Buku</label>
                                                            <input value="<?= $d['harga_buku']; ?>" name="harga_buku" type="text" class="form-control" id="exampleInputPassword1" placeholder="Kota">
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
        </section>
        <section id="section-shape-5" class="">
            <h3 class="box-title m-b-0">Data Table</h3>
            <p class="text-muted m-b-30">Data table example</p>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Buku</th>
                            <th>Anggaran</th>
                            <th>Jumlah Peminjam</th>
                            <th>Harga Buku</th>
                            <th>Edisi Buku</th>
                            <th>Tahun Berdiri</th>
                            <th>Tahun Terbit</th>
                            <th>Ketersediaan Buku</th>
                            <th>Kurikulum Jurusan</th>
                            <th>Kebutuhan Jurusan</th>
                            <th>Jumlah Mahasiswa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $belumRangking = true;
                        foreach ($rangking as $de) :
                            $d = json_decode(json_encode($de), true);
                            if ($d['nilai_optimasi'] != null) {
                                $belumRangking = false;
                            }
                            if ($belumRangking == false) :
                        ?>

                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d['nama_buku']; ?></td>
                                    <td><?= $d['anggaran']; ?></td>
                                    <td><?= $d['jumlah_peminjam']; ?></td>
                                    <td><?= $d['harga_buku']; ?></td>
                                    <td><?= $d['edisi_buku']; ?></td>
                                    <td><?= $d['tahun_berdiri']; ?></td>
                                    <td><?= $d['tahun_terbit']; ?></td>
                                    <td><?= $d['ketersediaan_buku']; ?></td>
                                    <td><?= $d['kurikulum_jurusan']; ?></td>
                                    <td><?= $d['kebutuhan_jurusan']; ?></td>
                                    <td><?= $d['jumlah_mahasiswa']; ?></td>

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