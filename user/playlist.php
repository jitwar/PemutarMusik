<?php 
  session_start();
 ?>p

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../Boost/css/bootstrap.min.css">
  <script src="../Boost/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Boost/js/bootstrap.min.js"></script>

  <style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #fff;
    overflow-x: hidden;
    transition: 0.5s;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    margin-top: 10px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: blue;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>

</head>
<body >

<div id="container" >
      <br />
      <br />
      <br />
      <div class="form-group">
        <div class="input-group">
          <span class="input-group-addon"></span>
          <input type="text" name="search_text" id="keyword" placeholder=" Pencarian" class="form-control"  />
        </div>
      </div>
      <br />
      <div id="result"></div>
    </div>
    <div style="clear:both"></div>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="berandauser.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="../musik/listmusik.php"><i class="fa fa-fw fa-wrench"></i> Music</a>
    <a href="playlist.php"><i class="fa fa-fw fa-user"></i> Playlist</a>
    <a href="../user/logout.php"><i class="fa fa-fw fa-envelope"></i> Log-Out</a>
  </div>
  <span style="font-size:30px;cursor:pointer; color: white" onclick="openNav()">&#9776;</span>

  <a class="navbar-brand" href="#" style="margin-left: 4%">
    <img src="../gambar/avocado.png" width="30">NADA
  </a>
  <ul class="navbar-nav">

  </ul>
</nav>

<div class="container-fluid" style="margin-top:80px" id="containert">
  <h3>Daftar Suka</h3>
  <table class="table table striped">
    <tr style="text-align: center; padding: 5px;">
    <th> Artis </th>
    <th> Album </th>
    <th> judul </th>
  </tr>

  <?php
    include '../koneksi/koneksi.php';
    $username=$_SESSION['username'];
    $sql = mysqli_query($conn, "select * from song s inner join playlist p where p.id=s.id and p.username='$username' order by p.id desc") or die (mysqli_error($conn));
    while ($query=mysqli_fetch_array($sql)) 
    {
      ?>
        <tr>
          <td> <?php echo $query['artis']; ?> </td>
          <td> <?php echo $query['album']; ?> </td>
          <td> <?php echo $query['judul']; ?> </td>
          <td><a href ="../musik/player/MusicPlayer.php?id=<?php echo $query['id'];?>">play</a>
          </td>
        </tr>
    <?php } ?>
  </table>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>
<script type="text/javascript" src="js/script.js"></script>
</body>
</html>