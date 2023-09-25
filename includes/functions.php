<?php

function get_title(){
    global $title ;
    if(isset($title)){
        echo "$title" ;
    }else{
        echo 'default' ;
    }
}

function checkIfUserLogged()
{
    if(!isset($_SESSION['user_id'])) {
        header("location:login.php");
        die();
    }
}