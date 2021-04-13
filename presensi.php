<body class="bg-light">
<?php
include_once 'template/dashboard-head.php';
?>

<?php
if ($_SESSION['role'] == 'pemagang') {
  include_once 'pages/pemagang/navbar-pemagang.php';
  include_once 'pages/pemagang/daftar-presensi.php';
}
?>

<?php
include_once 'template/dashboard-head.php';
?>
</body>