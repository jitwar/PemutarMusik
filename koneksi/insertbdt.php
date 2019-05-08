<?php 
	include 'koneksi.php';
	$query=mysqli_query($conn,"INSERT INTO dokter VALUES('$','$nama','$email','$username','$katasandi','$ulangsandi')") or die(mysqli_error($conn));
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	
 </body>
 </html>