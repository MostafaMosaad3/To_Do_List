<?php

$result = select_query($connect , 'id , title , content' , 'tasks' , "id = ".$_GET['edit']);
if (!$result) {
    header('location:profile.php');
    exit();
}
$task = mysqli_fetch_assoc($result);

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $title=$_POST['title'];
    $content=$_POST['content'];
    $category = $_POST['categories'];

    if(empty($title))
    {
        $errors['title']="Title is required";
    }
    if(empty($content) ||strlen( trim($content)) <= 0 )
    {
        $errors['content']="Content is required";
    }



    if(empty($errors))
    {
        $update =update_query($connect , 'tasks' ,  "title = '$title' 
        , content = '$content' ", "id = " . $_GET['edit']);
    }


    $deleted_categories= delete_query($connect , 'task_category' , "task_id =" . $_GET['edit']) ;
    if($deleted_categories){
        foreach($category as $one){
            insert_query($connect , 'task_category' , 'task_id , category_id' , $_GET['edit'] . ',' . $one);
        }
    }

    if($result)
    {
        header("location: ../profile.php?success=Post Editted Successfully");
    }
    else
    {
        echo "Error in update";
    }


}
