<?php
include'connection.php';
session_start();
if(isset($_SESSION['sesemail'])){
    header("Location: http://local.demo.com/home.php");
}

// die("buibeiuveb");
//http://local.demo.com/sign_up.php
// $servername = "localhost";
// $username = "root";
// $password = "algolix786";
// $dbname = "test";
// $conn = mysqli_connect($servername, $username, $password, $dbname);
// if(!$conn){
//     die("Connection Failed: " . $conn->connect_error);
// }else {
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["txtemail"];
    $password = $_POST["txtpass"];
    $firstname = $_POST["fname"];
    $lastname = $_POST["lname"];
    $phone = $_POST["txtphone"];
    $city = $_POST["txtcity"];
    $country = $_POST["txtcountry"];
    $gender = $_POST["radgender"];
    // if ($email == '' || $password == ''){
    //     echo "You can't leave the space empty";
    //     sleep(10);
    //     header("Location: http://local.demo.com/signup.html");
    // }
    $sql = "INSERT INTO testtable (email, password) VALUES ('$email','$password')";
    if (mysqli_query($conn,$sql)) {
        echo "New record created successfully";
        $_SESSION['sespass'] = $password;
        $_SESSION['sesemail'] = $email;
        header("Location: http://local.demo.com/home.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>


<!DOCTYPE html>

<html lang="en" dir="ltr">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <meta charset="utf-8">
    <title>Sign Up</title>
</head>
<body>
    <div style="background-image: url('login.jpg'); align: auto;   background-repeat:no-repeat;   background-size:cover;">


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    <div class="container" style="margin-left:600px">
        <div class="row">
            <div class="col-5" style="border: 3px solid black; text-align: center;background-image: url('sign-back.jpg');align: auto;   background-repeat:no-repeat;   background-size:cover;" >

                <h1> Sign Up  </h1>
                <form action="signup.php" method="POST">
                    <label>First Name:</label><br>
                    <input required type="text" name="fname" /><br><br>
                    <label>Last Name:</label><br>
                    <input required type="text" name="lname" /><br><br>
                    <label>Email:</label><br>
                    <input required type="email" name="txtemail" /><br><br>
                    <label>Password:</label><br>
                    <input required type="password" name="txtpass" /><br><br>
                    <!-- <label>Phone Number:</label><br> -->
                    <label for="phone" >Enter your phone number:</label><br><br>
                    <input type="tel" placeholder = "Number pattern 03**-*******" name="phone"
                    pattern="[0]{1}[3]{1}[0-9]{2}-[0-9]{7}"><br>
                    <!-- <input required type="number" name="txtphone" /><br><br> -->
                    <label>City:</label><br>
                    <input required type="text" name="txtcity" /><br><br>
                    <label>Country:</label><br>
                    <input required type="text" name="txtcountry" /><br><br>
                    <form>
                        <b><input type="radio" name="radgender" value="male"><b>
                        <label for="male">Male</label><br>
                        <input type="radio" name="radgender" value="female">
                        <label for="female">Female</label><br>
                    </form>
                    <input type="submit" class="btn-dark" name="btnsubmit" value="Sign UP">
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
