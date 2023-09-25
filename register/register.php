<?php
$title='signup' ;
include'../includes/init.php';
include 'RegisterSubmit.php';
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php get_title(); ?> </title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
<div class="wrapper">
    <h2>Sign Up</h2>


    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="input-box">
            <input type="text" name="name" placeholder="Enter your name"
                   value="<?php echo isset($name) ? $name : ''?>">

            <?php if(isset($errors['name'])){ ?>
                <span style="color:red" class="error"><?php echo $errors['name']; ?></span>
            <?php } ?>
        </div>


        <div class="input-box">
            <input type="text" name="email" placeholder="Enter your email"
                   value="<?php echo isset($email) ? $email : "" ?>" >
            <?php if(isset($errors['email'])){ ?>
                <span style="color:red"  class="error"><?php echo $errors['email']; ?></span>
             <?php }?>
        </div>


        <div class="input-box">
            <input type="password" name="password" placeholder="Create password"  >
            <?php if (isset($errors['password'])) { ?>
                <span style="color:red" class="error"><?php echo $errors['password']; ?></span>
            <?php } ?>
        </div>


        <div class="input-box">
            <input type="password" name="confirm_password" placeholder="confirm_password" >
        </div>

        <div class="input-box button">
            <input type="Submit" value="Register Now">
        </div>
        <div class="text">
            <h3>Already have an account? <a href="../login/login.php">Login now</a></h3>
        </div>
    </form>
</div>
</body>
</html>