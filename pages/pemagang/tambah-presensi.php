<div class="container bg-white rounded shadow-sm p-4 mt-4">
  <h4>Tambah Presensi</h4>
  
  <?php if ($_SESSION['message'] == 'success') {
    echo "
    <div class='alert alert-success'>
      Presensi berhasil ditambahkan
    </div>
    ";
    $_SESSION['message'] = '';
  } ?>

  <?php if ($_SESSION['message'] == 'presensi_filled') {
    echo "
    <div class='alert alert-warning'>
      Presensi untuk tanggal ".date('Y-m-d') ." sudah diisi.
    </div>
    ";
    $_SESSION['message'] = '';
  } ?>

  <form action="actions/presensi-tambah.php">
    <div class="form-group row">
      <label for="hari" class="col-sm-2 col-form-label">Hari</label>
      <div class="col-sm-10">
        <select name="hari" required id="hari" aria-placeholder="Hari" class="form-control" required>
          <option value="">Pilih Hari</option>
          <option value="Senin">Senin</option>
          <option value="Selasa">Selasa</option>
          <option value="Rabu">Rabu</option>
          <option value="Kamis">Kamis</option>
          <option value="Jumat">Jumat</option>
        </select>
      </div>
    </div>
    <div class="form-group row">
      <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="dd-mm-yyyy" value="" min="1997-01-01" max="2030-12-31" required>
      </div>
    </div>
    <div class="form-group row">
      <label for="status" class="col-sm-2 col-form-label">Status</label>
      <div class="col-sm-10">
        <select name="status" id="status" class="form-control" required>
          <option value="">Pilih</option>
          <option value="Masuk">Masuk</option>
          <option value="Izin">Izin</option>
        </select>
      </div>
    </div>
    <div class="jam">
      <div class="form-group row">
        <label for="jam_masuk" class="col-sm-2 col-form-label">Jam Masuk</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="jam_masuk" name="jam_masuk" placeholder="Contoh 07:15" required>
        </div>
      </div>
      <div class="form-group row">
        <label for="jam_pulang" class="col-sm-2 col-form-label">Jam Pulang</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="jam_pulang" name="jam_pulang" placeholder="Contoh 17:00" required>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Izi strip (-) jika tidak diperlukan" required>
      </div>
    </div>
    <input type="hidden" value="-" name="dikonfirmasi_oleh">
    <input type="hidden" value="<?= $_SESSION['username']; ?>" name="username">
    <button class="btn btn-success" type="submit">Tambah Presensi</button>
  </form>
</div>