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

<!-- Header -->
<header class="navBar">
    <div>
        <a href="home.html" ><img class="logo" src="img/icons/logo.png" alt="Logo"></a>
        <!-- Navigation -->        
        <nav class="navigation">
            <ul class="nav">
                <li><a class="underLineNav nav-link" href="home.html">HOME</a></li>
                <li><a class="underLineNav nav-link" href="collection.html">COLLECTION</a></li>
                <li><a class="underLineNav nav-link" href="manageContent.html">MANAGE</a></li>
                <li><a href="login.html" class="btn btn-outline-dark btn-lg">LOGIN</a></li>
            </ul>
        </nav>
    </div>
</header>
<!-- END Header -->

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