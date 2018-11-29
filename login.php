<?php
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";

    //init variables
    $error = $sucess = "";
    
    //user already logged can't access to this page
    if(isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }

	if (!empty($_POST['username'])  && !empty($_POST['password']) ){

		$username = mysqli_real_escape_string($db, $_POST['username']); 
        $query = "SELECT * FROM user WHERE LoginName = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        
		if($stmt->num_rows == 1){
			$password = mysqli_real_escape_string($db,$_POST['password']);

            $query = "SELECT LoginPassword FROM user where LoginName = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($LoginPassword);
            $stmt->fetch();

			$isPasswordCorrect = password_verify($password, $LoginPassword);
            
            $stmt->close();

			if($isPasswordCorrect){
                $_SESSION['username'] = $username;
                header("Refresh: 1; URL=index.php");
                
                $sucess = true;
			}else{
				$error = "Incorrect username/password.";
			}
			
		}else{
			$error = "Username does not exist.";
		}
	}else{
        if(empty($_POST['username']) && empty($_POST['password']))
            $error = "Please enter your username and your password. ";
        elseif(empty($_POST['username']))
            $error = "Please enter your username. </br>";
        elseif(empty($_POST['password']))
            $error = "Please enter your password. </br>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>

<?php  include("includes/navBar.php") ?>

<!-- LOGIN -->
<section class="login">
    <div class="wrapper">
        <div class="signContent">
            <div class="signIcon">
                <img src="img/icons/login.png" alt="login icon">
            </div>
            <h2 class="active"> Sign In </h2>
			<?php
				if (isset($_POST['username']))
                {
                    if($sucess)
                    {
                        echo "<div style='margin: 0 10% 0 10%; padding-bottom:0;' class='alert alert-success' role='alert'>
                                <p>You are logged!</p>
                            </div>";
                    }
                    elseif(!empty($error))
                    {
                        echo "<div style='margin: 0 10% 0 10%; padding-bottom:0;' class='alert alert-danger' role='alert'>
                                <p>" . $error . " </p> 
                            </div>";
                    }
				}
			?>

            <form method="post" action="">
                <input type="text" class="form-control" name="username" placeholder="Username" >
                <input type="password" class="form-control" name="password" placeholder="Password" >
                <button class="btn btn-primary btn-block login-button" type="submit">Login</button>
            </form>
            <div class="signFooter">
                <a href="register.php" ><h2 class="inactive underlineHover">Sign Up</h2></a>
            </div> 
        </div>
    </div>
</section>
<!-- END LOGIN -->

<?php  include "includes/footer.php" ?>
    
</body>
</html>