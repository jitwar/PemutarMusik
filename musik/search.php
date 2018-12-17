<?php
$konek = mysqli_connect("localhost", "root", "", "projekpw");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($konek, $_POST["query"]);
	$query = "
	SELECT * FROM song 
	WHERE judul LIKE '%".$search."%'
	OR artis LIKE '%".$search."%' 
	OR album LIKE '%".$search."%' 
	";
}
else
{
	$query = "
	SELECT * FROM song ORDER BY id";
}
$result = mysqli_query($konek, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Artis</th>
							<th>Album</th>
							<th>Judul</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row['artis'].'</td>
				<td>'.$row['album'].'</td>
				<td>'.$row['judul'].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>