<?php 
	
	$username=$_COOKIE['username'];
	$password=$_COOKIE['password'];

	$query = new mysqli('localhost','root','','projekpw');
	$datauser=mysqli_query($query,"select * from user where username='$username' and password='$password'")or die(mysqli_error($query));
    $dataadmin=mysqli_query($query,"select * from admin where username='$username' and password='$password'")or die(mysqli_error($query));

    $cekuser=mysqli_num_rows($datauser);
    $cekadmin=mysqli_num_rows($dataadmin);

	if($username =='' && $password=='')
	{

		header("location:login.php");
	}

	elseif ($cekuser>0) {
		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		header("location:../user/berandauser.php");
	}

	elseif ($cekadmin>0) {
		$_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
		header("location:../admin/berandaadmin.php");
	}
	
	
 //    if($cekuser>0){
 //        $_SESSION['username'] = $username;
 //        $_SESSION['status'] = "login";
        
 //        header("location:../user/berandauser.php");
 //    }else if($cekadmin>0){
 //        $_SESSION['username'] = $username;
 //        $_SESSION['status'] = "login";
        
 //        header("location:../admin/berandaadmin.php");
 //    }
 //    else {
 //    	header("location:login.php");
 //    }
?>