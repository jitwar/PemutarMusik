<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$database = "projekpw";
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Koneksi Gagal: " . $conn->connect_error);
}

?> 