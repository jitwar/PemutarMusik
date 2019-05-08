<?php
$servername = "localhost";
$username = "makarim";
$password = "makarimganteng";

// Create connection
$database = "mkom";
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

?> 