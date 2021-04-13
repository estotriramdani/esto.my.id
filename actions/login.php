<?php 

session_start();

include_once '../config/koneksi.php';

$username = strtolower(stripslashes($_GET['username']));
$password = $_GET['password'];

$result = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

		// cek username
		if (mysqli_num_rows($result) === 1){
			// cek password 
			$row = mysqli_fetch_assoc($result);
			
			if (password_verify($password, $row['password'])){
        $_SESSION['role'] = $row['role'];
        $_SESSION['username'] = $row['username'];
				$_SESSION['login'] = true;
				$_SESSION['message'] = '';	
				header("Location: ../");
				exit();
			} else {
				$_SESSION['message'] = 'password_wrong';
				header("Location: ../login.php");
				exit();
			}
		} else {
			$_SESSION['message'] = 'username_not_found';
			header("Location: ../login.php");
			exit();
		}

