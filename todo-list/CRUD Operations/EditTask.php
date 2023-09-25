<?php
$title = "Edit Post";
include '../../includes/init.php';
include '../Bootstrap/head.html';
include '../Bootstrap/nav.php';
include 'UpdateTask.php';

$categories = select_query($connect , '*' , 'categories' , '1=1') ;
$task_id = $_GET['edit'];
$selected_categories =select_query($connect , 'category_id' , 'task_category' , "task_id='$task_id'");
$selected_categories_id=[] ;
if($selected_categories){
    for($i= 0 ; $i<mysqli_num_rows($selected_categories) ; $i++){
        $selected_category=mysqli_fetch_assoc($selected_categories);
        array_push($selected_categories_id , $selected_category['category_id']);
    }
}


?>
<div class="container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
        <h2> Edit Post </h2>

        <div class="form-group mb-3 ">

            <label for="name">Title</label>
            <input type="text" class="form-control" id="title"  name="title" value="<?= $task['title'] ?>">

            <?php if (isset($errors['title'])) { ?>
                <span class="error"><?php echo $errors['title']; ?></span>
            <?php } ?>
        </div>
        <div class="form-group">

            <label for="content">Content</label>

            <textarea class="form-control" name="content" id="content"> <?= $task['content']  ?> </textarea>
            <?php if (isset($errors['content'])) { ?>
                <span class="error"><?php echo $errors['content']; ?></span>
            <?php } ?>
        </div>

        <label for="content">categories</label>
        </br>
        <?php
        for ($i = 0; $i < mysqli_num_rows($categories); $i++) {
            $category = mysqli_fetch_assoc($categories);
            /*print_r($category['id']);
            die();*/
            ?>
            <input type="checkbox" name="categories[]" value="<?php echo $category['id'] ?>"
                <?php in_array($category['id'], $selected_categories_id) ? print 'checked' : ''; ?>
            > <?php echo $category['name'] ?>
            </br>

            <?php

        }
        ?>

</div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


