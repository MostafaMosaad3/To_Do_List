<?php
$errors=[];
if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $title= $_POST['title'];
    $content= $_POST['content'];
    $category = $_POST['category'];
    $priority = $_POST['priority'] ;
    $completion = $_POST['completion'];

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
        $userId =$_SESSION['user_id'];
        //store in database

        $result =insert_query($connect , 'tasks' , 'title ,content , user_id ' , "'$title' , '$content' , '$userId' ");
        $task_id = mysqli_insert_id($connect);
        foreach($category as $one){
            insert_query($connect , 'task_category' , 'task_id , category_id' , "'$task_id' , '$one'");
        }
        foreach($priority as $two){
            insert_query($connect , 'task_priority' , 'task_id , priority_id' , "'$task_id' , '$two'");
        }
        foreach($completion as $three){
            insert_query($connect , 'task_completion' , 'task_id , completion_id' , "'$task_id' , '$three'");
        }
        if($result)
        {
            header("location: ../profile.php?success=task Added Successfully");
        }
        else
        {
            echo "Error in insert";
        }
    }




}