<?php

include'connection.php' ;
function select_query($connect , $column , $table  , $condition){

    $query = "SELECT $column FROM $table where $condition" ;
    $result = mysqli_query($connect , $query) ;
    if(mysqli_num_rows($result) > 0){
        return ($result) ;
    }else {
        return false ;
    }

}
//var_dump(select_query($connect , 'email' , 'users' , 'id = 4') );

function insert_query($connect , $table , $column , $value){

    $query = "INSERT INTO $table($column) VALUE ($value) " ;
    $result = mysqli_query($connect , $query) ;
    mysqli_error($connect);
    return $result;

}
//var_dump(insert_query($connect , 'users' , "name , email , password" ,"'ali','ali@gmail.com','ali22222'"));

function update_query($connect , $table , $column , $condition){

    $query = "UPDATE $table SET $column WHERE $condition" ;
    $result = mysqli_query($connect , $query) ;
    if(mysqli_affected_rows($connect)>0){
        return true ;
    }else {
        return false ;
    }

}


function delete_query($connect , $table , $condition){

    $query = "DELETE FROM $table WHERE $condition " ;
    $result = mysqli_query($connect , $query) ;
    return $result ;

}