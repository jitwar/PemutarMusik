<?php
    session_start();
    $query = new mysqli('localhost','root','','projekpw');

    $username=$_POST['username'];
    $password=$_POST['katasandi'];
    $remember=$_POST['remember'];

    $datauser=mysqli_query($query,"select * from user where username='$username' and katasandi='$password'")or die(mysqli_error($query));
    $dataadmin=mysqli_query($query,"select * from admin where username='$username' and katasandi='$password'")or die(mysqli_error($query));

    $cekuser=mysqli_num_rows($datauser);
    $cekadmin=mysqli_num_rows($dataadmin);

    if($cekuser>0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";

        
        if (isset($_POST['remember'])) {
            setcookie('username',$username,time()+180);
            setcookie('password',$password,time()+180);
        }else{
            setcookie('username',"");
            setcookie('password',"");
        }
        header("location:../user/berandauser.php");
    }else if($cekadmin>0){
        $_SESSION['username'] = $username;
        $_SESSION['status'] = "login";
        
    
        if (isset($_POST['remember'])) {
            setcookie('username',$username,time()+180);
            setcookie('password',$password,time()+180);
        }
        else{
            setcookie('username',"");
            setcookie('password',"");
        }
        header("location:../admin/berandaadmin.php");
    }else{
        header("location:login.php?pesan=gagal");
    }
    
?>