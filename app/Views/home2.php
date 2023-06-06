<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<h3 class="box-title m-b-0">Sample Horizontal form</h3>
<p class="text-muted m-b-30 font-13"> Use Bootstrap's predefined grid classes for horizontal form </p>
<form action="listbuku/save" method="post" class="form-horizontal">
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Nama Buku</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Buku" name="nama_buku"> </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Harga Buku</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Rp." name="harga_buku"> </div>
    </div>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-3 control-label">Jumlah Peminjam</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputEmail3" placeholder="Jumlah Peminjam" name="jumlah_peminjam"> </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-3 control-label">Edisi Buku</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword3" placeholder="Edisi Buku" name="edisi_buku"> </div>
    </div>
    <div class="form-group">
        <label for="inputPassword4" class="col-sm-3 control-label">Tahun Berdiri Penerbit</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Tahun Berdiri Penerbit" name="tahun_berdiri"> </div>
    </div>
    <div class="form-group">
        <label for="inputPassword4" class="col-sm-3 control-label">Tahun Terbit Buku</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Tahun Terbit Buku" name="tahun_terbit"> </div>
    </div>
    <div class="form-group">
        <label for="inputPassword4" class="col-sm-3 control-label">Ketersediaan Buku</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Ketersediaan Buku" name="ketersediaan_buku"> </div>
    </div>
    <div class="form-group">
        <label for="inputPassword4" class="col-sm-3 control-label">Kurikulum Jurusan</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Kurikulum Jurusan" name="kurikulum_jurusan"> </div>
    </div>
    <div class="form-group">
        <div class="row">
            <div class="col-sm-3 control-label">
                <label class="control-label ">Kebutuhan Jurusan</label>
            </div>
            <div class="col-sm-6 control-label">
                <div class="radio-list">
                    <div class="col-md-3 control-label">
                        <label>
                            <input name="kebutuhan_jurusan" value="Butuh" type="radio">
                            Butuh
                        </label></div>
                    <div class="col-md-3 control-label">
                        <label>
                            <input name="kebutuhan_jurusan" value="Tidak" type="radio">
                            Tidak Butuh </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="form-group">
        <label for="inputPassword4" class="col-sm-3 control-label">Jumlah Mahasiswa</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="inputPassword4" placeholder="Jumlah Mahasiswa" name="jumlah_mahasiswa"> </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="checkbox checkbox-success">
                <input id="checkbox33" type="checkbox">
                <label for="checkbox33">Check me out !</label>
            </div>
        </div>
    </div>
    <div class="form-group m-b-0">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-info waves-effect waves-light m-t-10">Sign in</button>
        </div>

        <a href="rangkingbuku/proses" target="_blank" class="btn btn-danger pull-left m-l-20 hidden-xs hidden-sm waves-effect waves-light">Proses Rankink Buku</a>
    </div>
</form>
<?= $this->endSection(); ?>