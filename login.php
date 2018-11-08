<?php
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";
    $error = "";
    
    if(isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }

	if (!empty($_POST['username'])  && !empty($_POST['password'])){

		$username = mysqli_real_escape_string($db, stripslashes($_POST['username'])); 
		$query = "SELECT * FROM user WHERE LoginName = '$username'";
		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);

		if($user){
			$password = mysqli_real_escape_string($db,$_POST['password']);

			$query = "SELECT * FROM user where LoginName = '$username'";
			$result = $db->query($query);
			$data = $result->fetch_assoc();
			$isPasswordCorrect = password_verify($password, $data['LoginPassword']);
			
			if($isPasswordCorrect){
                $_SESSION['username'] = $username;
                header("Refresh: 2;URL=index.php");
			}else{
				$error = "Incorrect username/password.";
			}
			
		}else{
			$error = "Username does not exist.";
		}
	}else{
        if(empty($_POST['username']))
            $error = $error . "Please enter your username. </br>";
        if(empty($_POST['password']))
            $error = $error . "Please enter your password. </br>";
        elseif(empty($_POST['username']) && empty($_POST['password']))
            $error = $error . "Please enter your username and your password. ";
    }
?>
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
                    if(empty($error))
                    {
                        echo "<div style='margin: 0 10% 0 10%; padding-bottom:0;' class='alert alert-success' role='alert'>
                                <p>You are logged!</p>
                            </div>";
                    }
                    else
                    {
                        echo "<div style='margin: 0 10% 0 10%; padding-bottom:0;' class='alert alert-danger' role='alert'>
                                <p>" . $error . " </p> 
                            </div>";
                    }
				}
			?>

            <form action="" method="post">
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

<?php  include("includes/footer.php") ?>
    
</body>
</html>