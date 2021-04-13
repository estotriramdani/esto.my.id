<?php 

session_start();

include_once '../config/koneksi.php';

echo $dikonfirmasi_oleh = $_GET['dikonfirmasi_oleh'];
echo $id = $_GET['id'];

$sql = "UPDATE `daftar_presensi` SET `dikonfirmasi_oleh` = '$dikonfirmasi_oleh' WHERE `daftar_presensi`.`id` = $id;";

mysqli_query($koneksi, $sql);

$_SESSION['message'] = 'success';

header('location: ../');