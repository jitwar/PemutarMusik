<?php
session_start();
	//include '../koneksi/koneksi.php';
	$conn = new mysqli('localhost','root','','projekpw');

	$id = $_GET['id'];
	$username=$_SESSION['username'];
	$query=mysqli_query($conn,"INSERT INTO playlist VALUES ('$id','','$username')") or die(mysqli_error($conn));

	if($query){
		header('Location: listmusik.php');
	}else{
		echo "Gagal Gan";
	}
?>