<?php 
include_once 'template/auth-head.php';
?>

  <body class="bg-light">
    <div class="container">
      <div class="row justify-content-center m-5">
        <div class="col-sm-6">
          <div class="login-box bg-white p-4 shadow-sm rounded-lg">
            <h4 class="mb-4">Masuk Akun Lama</h4>
            <div class="alert-section">
              
              <?php 
              // Jika username sudah terdaftar
              if ($_SESSION['message'] == 'username_not_found') {
                echo "
                  <div class='alert alert-warning' role='alert'>
                    Username tidak valid
                  </div>
                ";
                $_SESSION['message'] = '';
              }
              
              // Jika password tidak sesuai
              if ($_SESSION['message'] == 'password_wrong') {
                echo "
                  <div class='alert alert-warning' role='alert'>
                    Password salah
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
            <form action="actions/login.php" method="get">
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
              <button type="submit" class="btn btn-info w-100">Masuk</button>
            </form>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="p-3 bg-white shadow-sm">
            <p class="text-center">Belum punya akun?</p>
            <a href="registrasi.php" class="btn btn-primary d-block">Daftar</a>
          </div>
        </div>
      </div>
    </body>

<?php 
include_once 'template/auth-footer.php';
?>
