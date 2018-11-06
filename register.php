<?php
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";

    if(isset($_SESSION["username"]) ){
        header("location: index.php");
        exit;
    }

    $error = "";

    if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['confirm_password'])){

        $username = mysqli_real_escape_string($db, stripslashes($_POST['username'])); 
        
        if($_POST['password'] == $_POST['confirm_password']){
            $password = mysqli_real_escape_string($db,password_hash($_POST['password'], PASSWORD_DEFAULT));

            $query = "SELECT * FROM user WHERE LoginName = ? LIMIT 1";
            $stmt = $db->prepare($query);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->store_result();            

            //if there is no LoginName
            if($stmt->num_rows == 0){
                //we dont need anymore the result
                $stmt->free_result();
                //we can close 
                $stmt->close();
                $query = "INSERT into `user` (LoginName, LoginPassword) VALUES (?, ?)";
                if($stmt = $db->prepare($query)){
                    $stmt->bind_param("ss", $username, $password);
                    $stmt->execute();                   
                    $stmt->close();
                }else{
                    $error = 'Error to create you account.';
                }                       
            }
            else{
                $error = 'User already exist!';
            }
        }
        else{
            $error = 'Passwords does not match!';
        }
    }else{
        $error = "Please enter all fields.";
    }
    $db->close();

?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign Up</title>

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
            <h2 class="active"> Sign Up </h2>
            <?php
                if (isset($_REQUEST['username']))
                {
                    if(empty($error))
                    {
                        echo "<div style='margin: 0 10% 0 10%; padding-bottom:0;' class='alert alert-success' role='alert'>
                                <p>You are registered!</br> Click here to <a href='login.php'>Login</a></p>
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

            <form method="post">
                <input type="text" class="form-control" name="username" placeholder="Username" >
                <input type="password" class="form-control" name="password" placeholder="Password" >
                <input type="password" class="form-control" name="confirm_password" placeholder="Re-enter password" >
                <button class="btn btn-primary btn-block login-button" type="submit" value="submit">Register</button>

                <div class="signFooter">
                    <a href="login.php"><h2 class="inactive underlineHover">Sign In</h2></a>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- END LOGIN -->

<?php  include("includes/footer.php") ?>
    
</body>
</html>