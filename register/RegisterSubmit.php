<?php

$errors=[];

if($_SERVER['REQUEST_METHOD']=="POST"){
    $name = $_POST['name'] ;
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
    $confirm_password = $_POST['confirm_password'] ;
}

if(empty($name)){
    $errors['name'] = 'Name is required' ;
}

if(empty($email)){
    $errors['email']='email is required' ;
}else{
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errore['email']='email is not valid' ;
    }
    elseif (select_query($connect , 'email' , 'users' , "email = '$email'")){
        $errors['email'] = "email is already exists" ;
    };
    }


if(empty($password)){
    $errors['password'] = 'password is required' ;
}else{
    if(strlen($password) < 6 ){
        $errors['password'] = 'password must be more than 6 character' ;
    }else{
        if($password != $confirm_password){
            $errors['password'] = 'Password is not matched' ;
        }
    }
}


if(empty($errors)){
    $query = "INSERT INTO users(name , email , password) 
              VALUES ('$name' , '$email' , '$password')"  ;

    $result = mysqli_query($connect , $query);
    if ($result) {
        echo "user added successfully";
        header('refresh:5 ;location:../login/login.php');
    } else {
        echo "error in adding user " . mysqli_error($connect);
    }


}