<?php
$title='login' ;
include'../includes/init.php';
include 'LoginSubmit.php';
//var_dump(select_query($connect , 'users' , '*' , '1=1'));
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php get_title(); ?> </title>
    <link rel="stylesheet" href="../assets/style2.css">
</head>

<body>
<div class="container">
    <h2>login</h2>

    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="input-box">

            <div class="input-box">
                <input type="text" name="email" placeholder="Enter your email"
                value="<?php echo isset($email) ? $email : "" ?>" >
                <?php if(isset($errors['email'])){ ?>
                    <span style="color:red"  class="error"><?php echo $errors['email']; ?></span>
                <?php }?>
            </div>


            <div class="input-box">
                <input type="password" name="password" placeholder="Enter your password">
                <?php if (isset($errors['password'])) { ?>
                    <span style="color:red" class="error"><?php echo $errors['password']; ?></span>
                <?php } ?>
            </div>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" name="remember" value="1">
                <label class="form-check-label" for="exampleCheck1">Remember Me</label>
            </div>


            <div class="input-box button">
                <input type="Submit" value="login">
            </div>
            <div class="text">
                <h3>Don,t have an account? <a href="../register/register.php">Register now</a></h3>
            </div>
    </form>
</div>
</body>

</html>