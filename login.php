<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>

<?php  include("include/header.php") ?>

<!-- LOGIN -->
<section class="login">
    <div class="wrapper">
        <div class="signContent">
            <div class="signIcon">
                <img src="img/icons/login.png" alt="login icon">
            </div>
            <h2 class="active"> Sign In </h2>

            <input type="text" class="form-control" name="username" placeholder="Username">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <button class="btn btn-primary btn-block login-button" type="submit">Login</button>

            <div class="signFooter">
                <h2 class="inactive underlineHover">Sign Up </h2>
            </div>
        </div>
    </div>
</section>
<!-- END LOGIN -->

<?php  include("include/footer.php") ?>
    
</body>
</html>