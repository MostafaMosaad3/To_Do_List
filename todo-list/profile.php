<?php
$title = "Profile";
include '../includes/init.php';
include 'Bootstrap/head.html';
include 'Bootstrap/nav.php';
checkIfUserLogged();

//delete
if (isset($_GET['delete'])) {
    $delete = delete_query($connect, 'tasks', "id = " . $_GET['delete']);
}

//getting all tasks
$tasks = select_query($connect, 'id,title,content', 'tasks', "user_id = " . $_SESSION['user_id']);

if (isset($_GET['search']) && $_GET['search'] != '') {
    $search = trim($_GET['search']);
    $condition = "tasks.title LIKE '%$search%' OR tasks.content LIKE '%$search%' ";
    $tasks = select_query($connect, 'tasks.* , users.id',
        'tasks  INNER JOIN users ON tasks.user_id =users.id', $condition);

} else {
    $condition = '1=1 ORDER BY tasks.id ';
}


?>
<div class="container mt-4 mb-3">
    <div class="row">

        <div class="col-8">
            <h2> This Is Your Profile <?php echo $_SESSION['name']; ?> </h2>
        </div>
        <!-- </div> -->
        <div class="col-4 text-end">
            <a class="btn btn-primary" href="CRUD Operations/AddTask.php"> Add New Task </a>
        </div>
        <!-- <div class="row"> -->
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="get" class="row g-3">
            <div class="col-6">
                <input type="text" class="form-control" placeholder="Search" name="search"
                       value="<?php if (isset($_GET['search'])) {
                           echo $_GET['search'];
                       } ?> ">
            </div>
            <div class="col-4">
                <button class="btn btn-primary" type="submit"> Search</button>
            </div>
        </form>

    </div>


</div>


<div class="container-fluid mb-5">
    <div class="row">
        <?php if (isset($_GET['success'])) {
            echo '<div class="alert alert-success" role="alert">' .
                $_GET['success']
                . ' </div>';
        }
        ?>
    </div>
    <div class="row">

        <?php
        if ($tasks) {
            for ($i = 0; $i < mysqli_num_rows($tasks); $i++) {
                $task = mysqli_fetch_assoc($tasks);
                // print_r($post);
                ?>

                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $task['title'] ?></h5>
                            <p class="card-text"><?php echo substr($task['content'], 0, 100) ?> ... </p>
                            <a href="CRUD Operations/EditTask.php?edit=<?php echo $task['id'] ?>"
                               class="btn btn-secondary">Edit</a>
                            <a href="profile.php?delete=<?php echo $task['id'] ?>" class="btn btn-danger">Delete</a>
                            <a href="CRUD Operations/SingleTask.php?task_id=<?php echo $task['id'] ?>"
                               class="btn btn-primary">Read More</a>
                            <br>
                            <?php
                            $taskId = $task['id'];
                            $categories = select_query($connect, 'task_category.category_id , categories.name',
                                'task_category INNER JOIN categories ON task_category.category_id = categories.id', "task_id = $taskId");
                            if ($categories) {
                                for ($j = 0; $j < mysqli_num_rows($categories); $j++) {
                                    $category = mysqli_fetch_assoc($categories);
                                    ?>
                                    <a href="filter_category.php?<?= $category['name'] ?>"><?php echo $category['name'] ?></a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else { ?>
            <div class="alert alert-danger" role="alert">
                No Posts Found
            </div>
        <?php } ?>


    </div>

</div>
