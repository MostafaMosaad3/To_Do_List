<?php

$errors=[];

if($_SERVER['REQUEST_METHOD']=="POST"){
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
}


if(empty($email)){
    $errors['email']='email is required' ;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errore['email']='email is not valid' ;
    }
}


if(empty($password)){
    $errors['password'] = 'password is required' ;
}else{
    if(strlen($password) < 6 ){
        $errors['password'] = 'password must be more than 6 character' ;
    }
}

if(empty($errors)) {
    $result=select_query($connect , 'id,name,email,password' , 'users' , "email='$email'");
    if($result){
        $user = mysqli_fetch_assoc($result) ;
        $_SESSION['name'] = $user['name'] ;
        $_SESSION['user_id'] =  $user['id'] ;
        header("location:../todo-list/profile.php") ;
    }else{
        echo 'email is not true' ;
    }
}


