<?php 

	include 'koneksi.php';

	$query = mysqli_query($conn,"SELECT * from dokter");
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 	<?php
 	while ($data=mysqli_fetch_array($query)) {
 	  	  ?>
 	<table>
 		<tr>
 			<td>Nama</td>
 			<td>:</td>
 			<td><?php echo $data['namalengkap']; ?></td>
 		</tr>
 		<tr style="height: 5pt"></tr>
 	</table>
 	<?php } ?>
 </body>
 </html>