
<table class="table table striped">
	<tr style="text-align: center; padding: 5px;">
		<th> Artis </th>
		<th> Album </th>
		<th> judul </th>
		<th> listen </th>
		<th> like </th>
	</tr>

	<?php
	$keyword=$_GET['keyword'];
	$conn = new mysqli('localhost','root','','projekpw');
	$sql = mysqli_query($conn, "select * from song where judul like '%$keyword%' or album like '%$keyword%'") or die (mysqli_error());
	$query=mysqli_fetch_array($sql);
	var_dump($query);
	while ($query=mysqli_fetch_array($sql)) 
	{
		?>
		<tr>
			<td> <?php echo $query['artis']; ?> </td>
			<td> <?php echo $query['album']; ?> </td>
			<td> <?php echo $query['judul']; ?> </td>
			<td align="center">
				<a href ="player/MusicPlayer.php?id=<?php echo $query['id'];?>" >
					play
				</a>
			</td>
			<td align="center">
				<a href ="like.php?id=<?php echo $query['id'];?>">
					<img src="../gambar/like_null.svg" width="10%">
				</a>
			</td>
		</tr>
	<?php } ?>
</table>