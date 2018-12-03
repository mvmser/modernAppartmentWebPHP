<?php  
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";

    //init variables
    $errorAdd = $errorRm = $sucess = "";
    
    //check if the user is connected, else he can't access
    if(!isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }

    //check the userID
    $userID = $_SESSION['userID'];
    $query =  "SELECT UserID FROM user WHERE UserID = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param("s", $userID);
    $stmt->execute();
    $stmt->store_result();
    //if the userID doesnt exist
    if($stmt->num_rows == 0){
        $userID = null;
    }
    $stmt->close();
 
    //ADD
    if (!empty($_POST['titlePic']) && !empty($_POST['descriptionPic']) && !empty($_POST['imageURL'])){
        //if the user select something
        if($_POST['titlePic'] != "select"){

            //we have the variables, we can secure and store it
            $prefix = mysqli_real_escape_string($db, $_POST['titlePic']);
            $imageDescription = mysqli_real_escape_string($db, $_POST['descriptionPic']);
            $imageURL = mysqli_real_escape_string($db, $_POST['imageURL']);  

            //if the image is an image, we will have a $_POST image-url
            if(!empty($_POST['image-url'])){           

                $query = "INSERT INTO `collection` (prefix, description, URL, userID) VALUES (?, ?, ?, ?)";
                if($stmt = $db->prepare($query)){
                    if(isset($userID)){
                        $stmt->bind_param("sssi", $prefix, $imageDescription, $imageURL, $userID);
                        $stmt->execute();                
                        $lastItemID = $stmt->insert_id;
                        $sucess = true;
                        $stmt->close();
                    }else{
                        $errorAdd = "User ID not found.";
                    }
                }else{
                    $errorAdd = "Error to upload your image.";
                }    
            }else{
                $errorAdd = "Please click on preview.";
            }
        }else{
            $errorAdd = "Please select a title.";
        }
    }
    //REMOVE
    elseif(!empty($_POST['idPic'])){
        $idPicture = mysqli_real_escape_string($db, $_POST['idPic']);

        if(isset($userID)){            
            //search for itemID
            $query =  "SELECT * FROM collection WHERE itemID = ?";
            $stmt = $db->prepare($query);
            $stmt->bind_param("i", $idPicture);
            $stmt->execute();
            $stmt->store_result();

            //if in db there is no row, no itemID exist
            if($stmt->num_rows == 1){
                $stmt->close();

                //we delete the item BUTwe check if the user ID correspond with the user connected
                $query = "DELETE FROM collection WHERE (itemID = ? AND userID = ?)";
                $stmt = $db->prepare($query);
                $stmt->bind_param("ii", $idPicture, $userID);
                $stmt->execute();
                //check if deletion was successful
                if($stmt->affected_rows == 1){
                    $stmt->close();
                    $sucess = true;
                }else{
                    $errorRm = "Error, it's not your picture.";
                }
            }else{
                $errorRm = "Error, picture not found.";
            }
        }else{
            $errorRm = "Error, user ID not found.";
        }    
    }
    else{
        if (empty($_POST['titlePic']) || empty($_POST['descriptionPic']) || empty($_POST['imageURL'])){
            $errorAdd = "Please complete all fields.";
        }
        if (empty($_POST['idPic'])){
            $errorRm = "Please enter an ID.";
        }
    }

    //free ressources
    $db->close();
    $stmt = null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manage</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body class="manageBody">

<?php  
    include("includes/navBar.php");
?>

<!-- MANAGE PAGE -->
<section class="managePage">
    <!-- ADD -->
    <div class="addOrRm">
        <div class="addImg">
            <h2>ADD</h2>            
            <div class="container mx-auto">
                <?php
                    if (isset($_POST['titlePic'])){
                        if($sucess){
                            echo "<div style='padding-bottom:0;' class='alert alert-success' role='alert'>
                                    <p>Picture $lastItemID uploaded!</p>
                                </div>";
                        }elseif(!empty($errorAdd)){
                            echo "<div style='padding-bottom:0;' class='alert alert-danger' role='alert'>
                                    <p>" . $errorAdd . " </p> 
                                </div>";
                        }
                    }
                ?>

                <form method="POST" action="">
                    <select class="form-control mb-3" name="titlePic">
                        <option value="select">Select title..</option>
                        <option value="OD">Outdoor</option>
                        <option value="LR">Living Room</option>
                        <option value="BD">Bedroom</option>
                        <option value="KT">Kitchen</option>
                        <option value="BA">Bathroom</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Description" name="descriptionPic" maxlength="100" 
                        value="<?php if(isset($imageDescription)) { echo $imageDescription; }?>">
                
                    <div class="upload panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title a-left my-2">Upload Image</h3>
                        </div>
                    
                        <div class="url-tab panel-body">
                            <div class="input-group">
                                <input type="text" class="form-control hasclear" placeholder="Image URL" name="imageURL" maxlength="200" value="<?php if(isset($imageURL)) { echo $imageURL; }?>">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-outline-success">Preview</button>
                                    <input type="hidden" name="image-url">
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-success mb-2" type="submit">Add</button>
                </form>
            </div>
            
        </div>
        <!-- END ADD -->

        <!-- REMOVE -->
        <div class="rmImg">
            <h2>REMOVE</h2>
            <div class="container">
                <?php
                    if (isset($_POST['idPic'])){
                        if($sucess){
                            echo "<div style='padding-bottom:0;' class='alert alert-success' role='alert'>
                                    <p>Picture $idPicture removed!</p>
                                </div>";
                        }elseif(!empty($errorRm)){
                            echo "<div style='padding-bottom:0;' class='alert alert-danger' role='alert'>
                                    <p>" . $errorRm . " </p> 
                                </div>";
                        }
                    }
                ?>
                <form action="" method="POST">
                    <input type="text" class="form-control mb-3" placeholder="ID picture" name="idPic">
                    <button type="submit" class="btn btn-outline-danger mb-2">Remove</button>
                </form>
            </div>
        </div>
        <!-- EN REMOVE-->
    </div>    
</section>
<!-- END MANAGE PAGE -->
    
    
<?php  include "includes/footer.php"; ?>

<!-- JS -->

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/imageupload.js"></script>
<script src="js/script.js"></script>

</body>
</html>