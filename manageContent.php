<?php  
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";

    $errorAdd = $errorRm = $sucess = "";
    
    if(!isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }
 
    //ADD
    if (!empty($_POST['titlePic']) && !empty($_POST['descriptionPic']) && !empty($_POST['imageURL'])){
        if($_POST['titlePic'] != "select"){

            //if the image is an image, we will have a $_POST image-url
            if(!empty($_POST['image-url'])){
                $prefix = mysqli_real_escape_string($db, $_POST['titlePic']);
                $imageDescription = mysqli_real_escape_string($db, $_POST['descriptionPic']);
                $imageURL = mysqli_real_escape_string($db, $_POST['imageURL']);
                $username = $_SESSION['username'];

                //who is username -> userID?
                $query =  "SELECT UserID FROM user WHERE LoginName = ?";
                $stmt = $db->prepare($query);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $stmt->bind_result($userID);
                $stmt->fetch();
                $stmt->close();

                $query = "INSERT into `collection` (prefix, description, URL, userID) VALUES (?, ?, ?, ?)";
                if($stmt = $db->prepare($query)){
                    $stmt->bind_param("sssi", $prefix, $imageDescription, $imageURL, $userID);
                    $stmt->execute();                
                    $stmt->close();
                    $sucess = true;
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
        $username = $_SESSION['username'];

        //userID?
        $query =  "SELECT UserID FROM user WHERE LoginName = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($userID);
        if($stmt->fetch()){
            $stmt->close();
        }else{
            $errorRm = "Error, user ID not found.";
        }  
                   
            //search for itemID
            $query =  "SELECT userID FROM collection WHERE itemID = '$idPicture'";
            $result = $db->query($query);
            if($data = $result->fetch_assoc()){
                $userIDCollection = $data['userID'];
                if($userIDCollection == $userID){
                    $query = "DELETE FROM collection WHERE itemID = '$idPicture'";
                    $result = $db->query($query);
                    $sucess = true;
                }else{
                    $errorRm = "Sorry, it's not your picture, you can't remove it.";
                }
            }else{
                $errorRm = "Error, picture not found.";
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
    $db->close();
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
                                    <p>Picture uploaded!</p>
                                </div>";
                        }elseif(!empty($errorAdd)){
                            echo "<div style='padding-bottom:0;' class='alert alert-danger' role='alert'>
                                    <p>" . $errorAdd . " </p> 
                                </div>";
                        }
                    }
                ?>
                <form action="" method="POST">
                    <select class="form-control mb-3" name="titlePic">
                        <option value="select">Select title..</option>
                        <option value="OD">Outdoor</option>
                        <option value="IN">Indoor</option>
                        <option value="LR">Living Room</option>
                        <option value="BD">Bedroom</option>
                        <option value="KT">Kitchen</option>
                        <option value="BA">Bathroom</option>
                    </select>
                    <input type="text" class="form-control" placeholder="Description" name="descriptionPic">
                
                    <div class="upload panel panel-default">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title a-left my-2">Upload Image</h3>
                        </div>
                    
                        <div class="url-tab panel-body">
                            <div class="input-group">
                                <input type="text" class="form-control hasclear" placeholder="Image URL" name="imageURL">
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
                                    <p>Picture removed!</p>
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
    
    
<?php  include("includes/footer.php") ?>

<!-- JS -->

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/imageupload.js"></script>
<script src="js/script.js"></script>

</body>
</html>