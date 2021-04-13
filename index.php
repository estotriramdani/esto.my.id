<body class="bg-light">
<?php
include_once 'template/dashboard-head.php';
?>

<?php
if ($_SESSION['role'] == 'pemagang') {
  include_once 'pages/pemagang/navbar-pemagang.php';
  include_once 'pages/pemagang/tambah-presensi.php';
}

if ($_SESSION['role'] == 'pembimbing') {
  include_once 'pages/pembimbing/navbar-pembimbing.php';
  include_once 'pages/pembimbing/konfirmasi-presensi.php';
}

?>

<?php
include_once 'template/dashboard-footer.php';
?>
</body>