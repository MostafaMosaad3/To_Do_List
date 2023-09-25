<?php
$title = "filter Post";
include '../includes/init.php';
include 'Bootstrap/head.html';
include 'Bootstrap/nav.php';
;

$filter = $_GET ;
$filtered=select_query($connect , 'tasks.* ','tasks' ,"'category.name' = .$filter" );
print_r($filtered);
die();

?>


<div class="col-8">
    <h2> This Is Your Profile <?php echo $_SESSION['name']; ?> </h2>
</div>


