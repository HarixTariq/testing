<?php
$servername = "localhost";
$username = "root";
$password = "algolix786";
$dbname = "test";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn){
    die("Connection Failed: " . $conn->connect_error);
}
?>
