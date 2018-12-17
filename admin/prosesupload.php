<?php
  include '../koneksi/koneksi.php';
  $file=$_FILES['file'];
  $nama=$_FILES['file']['name'];
  $path=$_FILES['file']['tmp_name'];
  $lokasi="../musik/player/";
  $artis=$_POST['artis'];
  $album=$_POST['album'];
	$terupload= move_uploaded_file($path,$lokasi.$nama);
	if($terupload)
	{
		header('location:berandaadmin.php');
	}
	else{
		echo "gagal";
	}
  $query=mysqli_query($conn,"insert into song values ('','$artis','$album','$nama')")
?>