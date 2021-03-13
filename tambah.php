    <!-- Begin Page Content -->
    <div class="container-fluid mt-5">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <form action="" method="POST">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Nama Petugas</label>
              <div class="col-sm-10">

                <select name="petugas" class="form-control">
                  <option value="">--PILIH--</option>
                  <?php foreach ($petugas as $p) : ?>
                    <option value="<?= $p['id_petugas']; ?>"><?= $p['nama_petugas']; ?></option>
                  <?php endforeach; ?>
                </select>

              </div>
              <?= form_error('nama_petugas'); ?>

            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">NISN</label>
              <div class="col-sm-4">
                <select name="nisn" class="datanisn form-control">
                  <option value="">--PILIH--</option>
                  <?php foreach ($siswa as $s) : ?>
                    <option value="<?= $s['nisn']; ?>"><?= $s['nisn']; ?></option>
                  <?php endforeach; ?>
                </select>

              </div>
              <div class="col-sm-6">
                <input type="text" readonly class="nama form-control">

              </div>
              <?= form_error('nama_petugas'); ?>

            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">Tanggal Bayar</label>
              <div class="col-sm-10">
                <input type="date" class="form-control" name="tgl_bayar">
              </div>
              <?= form_error('nama'); ?>

            </div>

            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Bulan Bayar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="bln_bayar">
              </div>
              <?= form_error('bln_bayar'); ?>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Tahun Bayar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tahun_bayar">
              </div>
              <?= form_error('tahun_bayar'); ?>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-2 col-form-label">SPP</label>
              <div class="col-sm-4">
                <select class="spp form-control" name="spp">
                  <option value="">--PILIH--</option>

                  <?php foreach ($spp as $s) : ?>
                    <option value="<?= $s['id_spp']; ?>"><?= $s['tahun']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col-sm-6">
                <input type="text" readonly class="nominal form-control" id="">
              </div>
              <?= form_error('spp'); ?>

            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Bayar</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="jumlah_bayar">
              </div>
              <?= form_error('jumlah_bayar'); ?>
            </div>
            <button type="submit" class="btn btn-success">Simpan</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->