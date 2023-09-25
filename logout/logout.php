<?php
session_start();
session_unset();
session_destroy();
// setcookie('email' , '' , time()-3600*24*30);
header("location:../login/login.php");
die();