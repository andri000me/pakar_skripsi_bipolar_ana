<div class="box box-solid box-primary">
  <div class="box-header">
    <h1 class="box-title">Complete The Details To Diagnose</h1>
  </div>
  <form action="<?= site_url('konsultasi') ?>" method="post">
    <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
          <div class="form-group">
            <div class="col-sm-6">
              <label for="">Nama</label>
              <input type="text" required name="nama" placeholder="Masukan nama anda" value="" class="form-control">
            </div>
            <div class="col-sm-6">
              <label for="">Umur</label>
              <input type="number" required name="umur" placeholder="Masukan umur anda" class="form-control" value="">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="">Nomor Telefon</label>
              <input type="tel" required class="form-control" name="telefon" value="" placeholder="Masukan nomor telefon anda">
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-6">
              <label for="">Jenis Kelamin</label>
                <select class="form-control" name="gender" required>
                  <option value="" selected disabled>--Pilih Jenis Kelamin--</option>
                  <option value="Laki-Laki">Laki - Laki</option>
                  <option value="Perempuan">Perempuan</option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-12">
                <label for="">Alamat Lengkap</label>
                <textarea name="alamat" rows="3" placeholder="Jl. Alamat lengkap.." class="form-control" required></textarea>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <div class="col-sm-12">
                <b>Silahkan Pilih Gejala Yang Anda Rasakan</b>
              </div>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group">
              <?php foreach ($gejala as $key): ?>
                <div class="col-sm-12">
                  <input type="checkbox" class="minimal" name="" value="<?= $key->id_gejala ?> "><?php echo $key->nama_gejala ?>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    <div class="box-footer">
        <div class="form-group">
          <div class="col-sm-12">
            <button type="submit" name="button" class="btn btn-primary">Lanjutkan</button>
          </div>
        </div>
     </div>
  </form>
</div>
