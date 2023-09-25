<?php
$title = "Add new task";
include '../../includes/init.php';
include '../Bootstrap/head.html';
include '../Bootstrap/nav.php';
include 'StoreTask.php';
$categories = select_query($connect , '*' , 'categories' , '1=1') ;
$priorities =  select_query($connect , '*' , 'priorities' , '1=1') ;
$completions = select_query($connect , '*' , 'completion' , '1=1');

?>
<div class="container">
    <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" >
        <h2> Add New Task </h2>

        <div class="form-group mb-3 ">

            <label for="name">Title</label>
            <input type="text" class="form-control" id="title"  name="title" value="<?php echo isset($title) ? $title : '' ?>">

            <?php if (isset($errors['title'])) { ?>
                <span class="error"><?php echo $errors['title']; ?></span>
            <?php } ?>
        </div>
        <div class="form-group">

            <label for="content">Content</label>
            <textarea class="form-control" name="content" id="content"> <?php echo isset($content) ? $content : '' ?> </textarea>
            <?php if (isset($errors['content'])) { ?>
                <span class="error"><?php echo $errors['content']; ?></span>
            <?php } ?>

                <br>


            <label for="Category">Category</label>
            <br>
            <?php for($i=0 ;$i<mysqli_num_rows($categories) ; $i++) {
            $category = mysqli_fetch_assoc($categories); ?>
                <input type="checkbox"  name="category[]"
                value="<?= $category['id']?>" > <?= $category['name'] ?> <br>
            <?php } ?>

            <br>


            <label for="priority">priority</label>
            <br>
            <?php for($i=0 ;$i<mysqli_num_rows($priorities) ; $i++) {
                $priority = mysqli_fetch_assoc($priorities); ?>
                <input type="checkbox"  name="priority[]"
                       value="<?= $priority['id']?>" > <?= $priority['name'] ?> <br>
            <?php } ?>

        </div>
        <br>

        <label for="completion">completion</label>
        <br>
        <?php for($i=0 ;$i<mysqli_num_rows($completions) ; $i++) {
            $completion = mysqli_fetch_assoc($completions); ?>
            <input type="checkbox"  name="completion[]"
                   value="<?= $completion['id']?>" > <?= $completion['name'] ?> <br>
        <?php } ?>

</div>


        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>


