<?php  
    require_once "includes/dbConfig.php";
    require_once "includes/session.php";
    $errorAdd = $errorRm = "";
    
    if(!isset($_SESSION["username"]) ){
        header("location : index.php");
        exit;
    }

    if (!empty($_POST['titlePic']) && !empty($_POST['descriptionPic']) && !empty($_POST['imageURL'])){
        echo "add";
	}elseif(!empty($_POST['idPic'])){
        echo "remove";
    }else{
        if (empty($_POST['titlePic'])){
            $errorAdd = "test";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Manage</title>
    
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
            
            <form action="" method="POST">
                <div class="container mx-auto">
                <?php
                    if (isset($_POST)){
                        if(!empty($errorAdd)){
                            echo "<div style=' padding-bottom:0;' class='alert alert-danger' role='alert'>
                                    <p>" . $errorAdd . " </p> 
                                </div>";
                        }
                    }
                ?>
                    <select class="form-control mb-3"  name="titlePic">
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
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-outline-success mb-2" type="submit">Add</button>

                </div>
            </form>
        </div>
        <!-- END ADD -->

        <!-- REMOVE -->
        <div class="rmImg">
            <h2>REMOVE</h2>
            <div class="container">
            <form action="" method="POST">
                <?php
                    if (isset($_POST)){
                        if(!empty($errorRm)){
                        echo "<div style=' padding-bottom:0;' class='alert alert-danger' role='alert'>
                                <p>" . $errorRm . " </p> 
                            </div>";
                        }
                    }
                ?>
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