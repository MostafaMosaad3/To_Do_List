<?php
if(isset($_COOKIE['email']) && !isset($_SESSION['email'])){
    $_SESSION['email'] = $_COOKIE['email'];
}