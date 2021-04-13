<?php 

session_start();

include_once '../config/koneksi.php';

$nama = $_GET['nama'];
$username = strtolower(stripslashes($_GET['username']));
$password = $_GET['password'];
$password2 = $_GET['password2'];
$role = $_GET['role']; 

$result = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

if (mysqli_fetch_assoc($result)){
  $_SESSION['message'] = 'username_exist';
  header('location: ../registrasi.php');
  exit;
}

// cek konfirmasi password
if ($password !== $password2){
    $_SESSION['message'] = 'password_not_match';
  header('location: ../registrasi.php');
  exit;
}

// enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);

// query  ke tabel user
mysqli_query($koneksi, "INSERT INTO user VALUES ('', '$nama', '$username','$password', '$role')");

$_SESSION['message'] = 'success';
header('location: ../registrasi.php');

