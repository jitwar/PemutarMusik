<?php
	include '../koneksi/koneksi.php';

	$nama=$_POST['nama'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$katasandi=$_POST['katasandi'];
	$ulangsandi=$_POST['ulangsandi'];

	$query=mysqli_query($conn,"INSERT INTO user VALUES('','$nama','$email','$username','$katasandi','$ulangsandi')") or die(mysqli_error($conn));

	if($query){
		header('Location: ../login/login.php?registrasi=berhasil');
	}else{
		echo "Gagal Gan";
	}
?>