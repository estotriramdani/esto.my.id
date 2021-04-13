<div class="container bg-white rounded shadow-sm p-4 mt-4" style="min-height: 80vh;">
  <h4 class="mb-4">Daftar Kehadiran <?php echo "Pemagang"; ?></h4>
  <?php 
  if ($_SESSION['message'] == 'success') {
    echo "
    <div class='alert alert-success'>
      Terima kasih, ". $_SESSION['username'].", telah mengonfirmasi presensi! 
    </div>
    ";
    $_SESSION['message'] = '';
  }
  ?>
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Tanggal</th>
          <th>Hari</th>
          <th>Status</th>
          <th>Jam Masuk</th>
          <th>Jam Pulang</th>
          <th>Keterangan</th>
          <th>Konfirmasi</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $jumlahDataPerhalaman = 5;
          $result = mysqli_query($koneksi, "SELECT * FROM daftar_presensi");
          $jumlahData = mysqli_num_rows($result);
          $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
          $halamanAktif = (isset($_GET['halaman']) ? $_GET['halaman'] : 1 );
          $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

          $data = mysqli_query($koneksi,"SELECT * FROM daftar_presensi  ORDER BY tanggal DESC LIMIT $awalData, $jumlahDataPerhalaman");

          while($d = mysqli_fetch_array($data)){
        ?>
        <tr>
          <td><?= $d['tanggal']; ?></td>
          <td><?= $d['hari']; ?></td>
          <td><?= $d['status']; ?></td>
          <td><?= $d['jam_masuk']; ?></td>
          <td><?= $d['jam_pulang']; ?></td>
          <td><?= $d['keterangan']; ?></td>
          <?php 
            if ($d['dikonfirmasi_oleh'] == '-'){
              ?> 
              <td>
                <form action="actions/presensi-konfirmasi.php" class="d-inline">
                  <input type="hidden" name="dikonfirmasi_oleh" value="<?= $_SESSION['username']; ?>" >
                  <input type="hidden" name="id" value="<?= $d['id']; ?>" >
                  <button onclick="return confirm('Konfirmasi kehadiran?')" type="submit" class="btn btn-info">Konfirmasi?</button>
                </form>
              </td>
              <?php
            } else {
              echo "<td><button class='btn btn-success text-white'><i class='bi bi-check-circle'></i> &nbsp;". $d['dikonfirmasi_oleh'] ."</button></td>";
            }
          ?>
        </tr>
        <?php } ?>
      </tbody>
    </table>

    <!-- Pagination navigasi -->
    <?php if($halamanAktif > 1): ?>
      <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++): ?>
      <?php if($i == $halamanAktif): ?>
        <u><a href="?halaman=<?= $i; ?>" class="text-white bg-info text-center" style="width: 25px; height: 25px; line-height: 25px; display: inline-block; border-radius: 12.5px; text-decoration: none;"><?= $i; ?></a></u>
      <?php else: ?>
        <a href="?halaman=<?= $i; ?>"><?= $i; ?></a>
      <?php endif; ?>
    <?php endfor; ?>
    <?php if($halamanAktif < $jumlahHalaman): ?>
      <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
    <?php endif; ?>
  </div>
</div>