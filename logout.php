<?php
session_start();

session_unset();
session_destroy();

header("Location: http://local.demo.com/login.php");

 ?>
