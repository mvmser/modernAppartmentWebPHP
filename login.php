<?php
    include("includes/dbConfig.php");
    session_start();

	$userID = $password = "";
	$userID_err = $password_err = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
		// Check if username is empty
		if(empty(trim($_POST["username"])))
		{
			$username_err = "Please enter username.";
		} 
		else
		{
			$userID = mysqli_real_escape_string($bd, $_POST['username']);
		}
		
		// Check if password is empty
		if(empty(trim($_POST["password"])))
		{
			$password_err = "Please enter your password.";
		} 
		else
		{
			$password = mysqli_real_escape_string($bd, $_POST['password']);
		}
		
        //$pass = password_hash(mysqli_real_escape_string($bd, $_POST['password']) );
		
		// Validate credentials
		if(empty($username_err) && empty($password_err))
		{
			// Prepare a select statement
			$sql = "SELECT * FROM user WHERE LoginName = '$userID' and LoginPassword = '$password'";
        
			if($stmt = mysqli_prepare($db, $sql))
			{
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "s", $param_username);
				
				// Set parameters
				$param_username = $username;
				
				// Attempt to execute the prepared statement
				if(mysqli_stmt_execute($stmt))
				{
					// Store result
					mysqli_stmt_store_result($stmt);
					
					// Check if username exists, if yes then verify password
					if(mysqli_stmt_num_rows($stmt) == 1)
					{                    
						// Bind result variables
						mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
						if(mysqli_stmt_fetch($stmt))
						{
							if(password_verify($password, $hashed_password))
							{
								// Password is correct, so start a new session
								session_start();
								
								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;                            
								
								// Redirect user to welcome page
								header("location: welcome.php");
							}  
							else
							{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
							}
						}
					} 
					else
					{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
					}
				} 
				else
				{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}
        
			// Close statement
			mysqli_stmt_close($stmt);
		}
		// Close connection
		mysqli_close($link);
	}
		
		//$result = mysqli_connect($bd, $sql);
	
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

<?php  include("includes/header.php") ?>

<!-- LOGIN -->
<section class="login">
    <div class="wrapper">
        <div class="signContent">
            <div class="signIcon">
                <img src="img/icons/login.png" alt="login icon">
            </div>
            <h2 class="active"> Sign In </h2>

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