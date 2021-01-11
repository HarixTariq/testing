<!-- <!DOCTYPE html> -->
<?php session_start();
if(isset($_SESSION['sesemail'])){
    echo "<h1>Welcome ".$_SESSION['sesemail']. "</h1>";
}else {
    header("Location: http://local.demo.com/login.php");
}
    // $emailmsg = "Your email is " . $_SESSION['sesemail'];
    // $passmsg = "Your password of this email is " . $_SESSION['sespass'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Home</title>
    </head>
    <body>
            <h1>Home Page</h1>
            <button onclick="location.href = 'http://local.demo.com/logout.php';"
            name="logout" >Logout</button>

    </body>
</html>
