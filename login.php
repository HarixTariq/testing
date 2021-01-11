<?php
include'connection.php';
session_start();

// if(isset($_SESSION['sesemail'])){
//     header("Location: http://local.demo.com/home.php");
// }
if(isset($_SESSION['sesemail'])){
    echo "<h1>Welcome ".$_SESSION['sesemail']. "</h1>";
    header("Location: http://local.demo.com/home.php");
}else {
    //header("Location: http://local.demo.com/login.php");
}
if (isset($_REQUEST["loginbtn"]) == true ){
    //echo("Button is pressed");
    // $servername = "localhost";
    // $username = "root";
    // $password = "algolix786";
    // $dbname = "test";
    // $conn = mysqli_connect($servername, $username, $password, $dbname);
    // if(!$conn){
    //     die("Connection Failed: " . $conn->connect_error);}
    //     else {
    $pemail = $_REQUEST["loginuser"];
    $ppassword = $_REQUEST["loginpass"];

    $sql = "SELECT * from testtable where email='$pemail' AND password='$ppassword'";

    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($result);
    $recordfound = mysqli_num_rows($result);
    if ($recordfound > 0)
    {
        echo ("Records Found");
        $_SESSION['sespass'] = $row["password"];
        $_SESSION['sesemail'] = $row["email"];
        header("Location: http://local.demo.com/home.php");
        //die($_SESSION['sesemail']);
    }
    else {
        echo ("Record Not Found");
    }
    die($row["email"]);
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <meta charset="utf-8">
    <title>Login</title>
</head>
<body>
    <div style="background-image: url('sign-back.jpg');">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
<div style="background-image: url('login.jpg'); margin: auto; margin-top:300px; width: 35%;border: 3px solid black; padding: 10px;">
    <h1 style="text-align:center;">Login</h1>
    <form action="login.php" method="post" style="text-align:center;">
        Email :   <input type="text"  name="loginuser" placeholder = "Login"><br><br>
        Password: <input type="password" name="loginpass" placeholder="Password"><br><br>
        <input type="submit" name="loginbtn" value="Login">
    </form>
</div>
</div>
</body>
</html>
