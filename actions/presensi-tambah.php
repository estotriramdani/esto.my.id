<?php 

session_start();

include_once '../config/koneksi.php';

$username = $_GET['username'];
$hari = $_GET['hari'];
$tanggal = $_GET['tanggal'];
$status = $_GET['status'];
$jam_masuk = $_GET['jam_masuk'];
$jam_pulang = $_GET['jam_pulang'];
$keterangan = $_GET['keterangan'];
$dikonfirmasi_oleh = $_GET['dikonfirmasi_oleh'];

if ($tanggal == date('Y-m-d')) {
  $_SESSION['message'] = 'presensi_filled';
  header('Location: ../');
  exit();
} else {
  mysqli_query($koneksi, "INSERT INTO daftar_presensi VALUES('', '$username' ,'$hari', '$tanggal', '$status', '$jam_masuk', '$jam_pulang', '$keterangan', '$dikonfirmasi_oleh')");
  $_SESSION['message'] = 'success';
  header('Location: ../');
  exit();
}  



