<?php
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";
    $error = "";
    
    if(isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }


	if (isset($_POST['username'])  && isset($_REQUEST['password'])){

		$username = mysqli_real_escape_string($db, stripslashes($_REQUEST['username'])); 
		$query = "SELECT * FROM user WHERE LoginName = '$username' LIMIT 1";
		$result = mysqli_query($db, $query);
		$user = mysqli_fetch_assoc($result);

		if($user){
			$password = mysqli_real_escape_string($db,$_REQUEST['password']);

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
				if (isset($_REQUEST['username']))
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
                <input type="text" class="form-control" name="username" placeholder="Username" required="required">
                <input type="password" class="form-control" name="password" placeholder="Password" required="required">
                <button class="btn btn-primary btn-block login-button" type="submit">Login</button>

                <div class="signFooter">
                    <a href="register.php" ><h2 class="inactive underlineHover">Sign Up</h2></a>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- END LOGIN -->

<?php  include("includes/footer.php") ?>
    
</body>
</html>