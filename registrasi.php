<?php 
include_once 'template/auth-head.php';
?>

  <body class="bg-light">
    <div class="container">
      <div class="row justify-content-center m-5">
        <div class="col-sm-6">
          <div class="login-box bg-white p-4 shadow-sm rounded-lg">
            <h4 class="mb-4">Daftar Akun Baru</h4>
            <div class="alert-section">
              
              <?php 
              // Jika username sudah terdaftar
              if ($_SESSION['message'] == 'username_exist') {
                echo "
                  <div class='alert alert-warning' role='alert'>
                    Username sudah terdaftar
                  </div>
                ";
                $_SESSION['message'] = '';
              }
              
              // Jika password tidak sesuai
              if ($_SESSION['message'] == 'password_not_match') {
                echo "
                  <div class='alert alert-warning' role='alert'>
                    Password tidak sesuai
                  </div>
                ";
                $_SESSION['message'] = '';
              }

              // Jika sukses
              if ($_SESSION['message'] == 'success') {
                echo "
                  <div class='alert alert-success' role='alert'>
                    Pendaftaran berhasil! Silakan masuk.
                  </div>
                ";
                $_SESSION['message'] = '';
              }


              ?>
            </div>
            <form action="actions/registrasi.php" method="get">
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="nama"
                  id="nama"
                  placeholder="Nama"
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  class="form-control"
                  name="username"
                  id="username"
                  placeholder="Username"
                />
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  name="password"
                  id="password"
                  placeholder="Password"
                />
              </div>
              <div class="form-group">
                <input
                  type="password"
                  class="form-control"
                  name="password2"
                  id="password2"
                  placeholder="Ulangi Password"
                />
              </div>
              <div class="form-group">
                <select name="role" id="role" name="role" class="form-control">
                  <option>Pilih Role</option>
                  <option value="pemagang">Pemagang</option>
                  <option value="pembimbing">Pembimbing</option>
                </select>
              </div>
              <button type="submit" class="btn btn-info w-100">Daftar</button>
            </form>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="p-3 bg-white shadow-sm">
            <p class="text-center">Sudah punya akun?</p>
            <a href="login.php" class="btn btn-primary d-block">Masuk</a>
          </div>
        </div>
      </div>
    </body>

<?php 
include_once 'template/auth-footer.php';
?>
