<?php
$title = "";
include '../../includes/init.php';
include '../Bootstrap/head.html';
include '../Bootstrap/nav.php';
checkIfUserLogged();


$result = select_query($connect,  'id,title,content','tasks', "id = " . $_GET['task_id']);
if(!$result)
{
header('location:profile.php');
exit();
}
$task = mysqli_fetch_assoc($result);
?>


<div class="container-fluid mb-5">

    <div class="row text-center">
        <div class="mb-4">

            <h5 class="card-title"><?php echo  $task['title'] ?></h5>
        </div>

        <div class="col-md-6">
                <div class="card-body">
                    <p class="card-text"><?php echo $task['content'] ?></p>

                </div>
            </div>
        </div>
    </div>
