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

<!-- FOOTER -->
<footer class="container-fluid px-0">
        <div class="topfooter"> 
                <div class="contact">
                        <h3>Contact</h3>
                        <div class="separator" style="margin-bottom:10px;"></div>
    
                        <div class="mail">
                            <img class="mailicon" src="img/icons/mail.png" alt="mail">
                            <a href="mailto:momoserhir@gmail.com">momoserhir@gmail.com</a>
                        </div>
                        <div class="phone">
                            <img class="phoneicon" src="img/icons/phone.png" alt="phone">
                            <a href="tel:+33698077266">+33698077266</a>
                        </div>
                </div>
    
                <div class="social">
                        <h3>Social</h3>
                        <div class="separator" style="margin-bottom:10px;"></div>
                        
                        <a href="https://www.linkedin.com/in/mohamed-serhir/" target="_blank" > 
                            <img class="social_icon" src="img/icons/sLinkedin.png" alt="Linkedin"> 
                        </a>
                        <a href="https://www.facebook.com/momoserhir" target="_blank" > 
                            <img class="social_icon" src="img/icons/sFacebook.png" alt="Facebook"> 
                        </a>
                        <a href="https://plus.google.com/u/0/108237308610571460401" target="_blank" > 
                            <img class="social_icon" src="img/icons/sGoogleplus.png" alt="Googleplus"> 
                        </a>
                </div>
        </div>
        <div class="copyright">
          <p> 2018 © Mohamed Serhir </p>
        </div>
    </footer>
    <!-- END FOOTER -->
    
</body>
</html>