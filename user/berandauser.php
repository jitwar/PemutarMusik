<?php
  session_start();
  if (empty($_SESSION['username'])) {
    # code...
    $message = "Login Dahulu Yaa :)";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script type='text/javascript'>location='../login/login.php';</script>";
  }
  
?>
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
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="berandauser.php"><i class="fa fa-fw fa-home"></i> Home</a>
    <a href="../musik/listmusik.php"><i class="fa fa-fw fa-wrench"></i> Music</a>
    <a href="../user/playlist.php"><i class="fa fa-fw fa-user"></i> Playlist</a>
    <a href="logout.php"><i class="fa fa-fw fa-envelope"></i> Log-Out</a>
  </div>
  <span style="font-size:30px;cursor:pointer; color: white" onclick="openNav()">&#9776;</span>

  <a class="navbar-brand" href="#" style="margin-left: 4%">
    <img src="../gambar/avocado.png" width="30">NADA
  </a>
  <ul class="navbar-nav">
  </ul>
</nav>
<?php
  $username=$_SESSION['username'];
?>

<div class="container-fluid" style="margin-top:80px">
  Selamat Datang <?php echo "$username"; ?>
</div>


<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="la.jpg" alt="Los Angeles">
    </div>
    <div class="carousel-item">
      <img src="chicago.jpg" alt="Chicago">
    </div>
    <div class="carousel-item">
      <img src="ny.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>

</div>
    </div>
  </div>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
}
</script>

</body>
</html>
