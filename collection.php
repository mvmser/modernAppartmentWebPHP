<?php
//search for itemID 
    /*
    $query =  "SELECT * FROM collection WHERE itemID = '$searchItem'";
    $result = $db->query($query);
    if($data = $result->fetch_assoc()){
        $itemID = $data['itemID'];
        $itemURL = $data['URL'];
        $itemDescription = $data['description'];

        echo "<div class='picture col-8 mx-auto mt-5'>
                <div class='image'>
                    <img id='$itemID' src='$itemURL' alt='$itemID'>
                </div>
                <div class='infos'>
                    <p>$itemDescription</p>
                    <p>ID: $itemID</p> 
                </div>
            </div>";
        */


         /*
                        echo "<div class='picture col-8 mx-auto mt-5'>
                                <div class='image'>
                                    <img id='$_itemID' src='$_URL' alt='$_itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$_description</p>
                                    <p>ID: $_itemID</p> 
                                </div>
                            </div>";*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Collection</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>

<?php  
    include("includes/navBar.php") 
?>
    
<!-- BANNER -->
<section class="bannerCollection d-flex">
    <div class="container text-center mb-5 mx-auto mt-5">
        <div class="col">
            <h1>COLLECTION</h1>
            <div class="separator_title"></div>
        </div>
        <div class="col mt-5">
            <h3>Looking for a superior quality of life</h3>
        </div>
        <div class="col-lg-6 mx-auto">
            <form action="" method="POST" class="input-group">
                <input name="searchItem" type="text" class="form-control" placeholder="What are you looking for ?">
                <button class="btn btn-default btn-outline-primary" type="submit">Search</button>
            </form>
        </div>

        <?php
            require_once "includes/dbConfig.php";

            if(!empty($_POST['searchItem'])){
                $searchItem = mysqli_real_escape_string($db,$_POST['searchItem']);

                $query =  "SELECT * FROM collection WHERE description LIKE ?";
                $stmt = $db->prepare($query);
                $item = '%' . $searchItem . '%';
                $stmt->bind_param("s", $item);
                $stmt->execute();
                $stmt->store_result();
                if($stmt->num_rows > 0){
                    $stmt->bind_result($_itemID, $_prefix, $_description, $_URL, $_userID);
                    echo "<div class='boxPicture row mx-auto'>";

                    while ($stmt->fetch()) {
                        echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$_itemID' src=' $_URL' alt='$_itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$_description</p>
                                    <p>ID: $_itemID</p> 
                                </div>
                            </div>
                        </div>";
                        echo "</div>";
                    }
                    $stmt->close();
                }else{
                    echo "<div class='alert alert-danger mt-3 col-4 mx-auto pb-0' role='alert'>
                                <p>Item not found.</p> 
                            </div>";
                }  
                $db->close();  
            }           
            
        ?>
        
    </div>
</section>
<!-- END BANNER -->

<div class="separator"></div>

<!-- COLLECTION -->
<section id="collection">
    <div class="container-fluid boxCollection white">
        <div class="boxTitle">
            <h1>Outdoor</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'OD'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];
      
                    echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="container-fluid boxCollection gray">
        <div class="boxTitle">
            <h1>Indoor</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'IN'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];

                    
                    echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="boxCollection white">
        <div class="boxTitle">
            <h1>Living room</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'LR'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];

                    
                    echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="boxCollection gray">
        <div class="boxTitle">
            <h1>Bed room</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'BD'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];

                    
                    echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="boxCollection white">
        <div class="boxTitle">
            <h1>Kitchen</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'KT'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];

                    
                    echo "<div class='col d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture-->   
    </div>   

        <div class="boxCollection gray">
            <div class="boxTitle">
                <h1>Bathroom</h1> 
            </div>
            <!-- Box Picture -->
        <div class="boxPicture row mx-auto">
            <?php
                require_once "includes/dbConfig.php";

                //search for prefix
                $query =  "SELECT * FROM collection WHERE prefix = 'BA'";
                $result = $db->query($query);

                while ($data = $result->fetch_assoc()) {
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];

                    echo "<div class='col-md d-inline-block my-3 mx-auto mw-75'>
                            <div class='picture'>
                                <div class='image'>
                                    <img id='$itemID' src=' $itemURL' alt='$itemID'>
                                </div>
                                <div class='infos'>
                                    <p>$itemDescription</p>
                                    <p>ID: $itemID</p> 
                                </div>
                            </div>
                        </div>"; 
                     
                }
                ?>
        </div>  
        <!-- END Box Picture--> 
        </div>
    </div>

</section>
<!-- END COLLECTION  -->

<?php  include("includes/footer.php") ?>

</body>
</html>