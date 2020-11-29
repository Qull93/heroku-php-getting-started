<?php 
include 'koneksi.php';
session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$result = pg_query($host, "SELECT * FROM tblogin where username = '$username' and password = '$password'");
$cek = pg_num_rows($result);

if($cek > 0){
	session_start();
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:admin/index.php");
}else{
	header("location:index.php");	
}

?>