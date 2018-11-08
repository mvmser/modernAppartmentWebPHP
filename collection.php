<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Collection</title>

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

                //search for itemID 
                $query =  "SELECT * FROM collection WHERE itemID = '$searchItem'";
                $result = $db->query($query);
                $data = $result->fetch_assoc();
                $itemID = $data['itemID'];
                $itemURL = $data['URL'];
                $itemDescription = $data['description'];
                echo "<div class='picture col-8 mx-auto mt-5'>
                        <div class='image'>
                            <img id=' $itemID ' src='  $itemURL ' alt=' $itemID '>
                        </div>
                        <div class='infos'>
                            <p>$itemDescription</p>
                            <p>$itemID</p> 
                        </div>
                    </div>";
            }
        ?>
        
    </div>
</section>
<!-- END BANNER -->

<div class="separator"></div>

<!-- COLLECTION -->
<section id="collection">
    <div class="boxCollection white">
        <div class="boxTitle">
            <h1>Outdoor</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row">
            <?php
                require_once "includes/dbConfig.php";

                if(!empty($_POST['searchItem'])){
                    $searchItem = mysqli_real_escape_string($db,$_POST['searchItem']);

                    //search for itemID 
                    $query =  "SELECT * FROM collection WHERE prefix = 'OD'";
                    $result = $db->query($query);
                    $data = $result->fetch_assoc();

                    //faire un while
                    $itemID = $data['itemID'];
                    $itemURL = $data['URL'];
                    $itemDescription = $data['description'];
                    echo "<div class='picture col>
                            <div class='image'>
                                <img id=' $itemID ' src='  $itemURL ' alt=' $itemID '>
                            </div>
                            <div class='infos'>
                                <p>$itemDescription</p>
                                <p>$itemID</p> 
                            </div>
                        </div>";
                }
            ?>

            <div class="picture col">
                <div class="image">
                    <img id="OD-0002" src="img/outdoor/modern-facade2.jpg" alt="OD-0002">
                </div>
                <div class="infos">
                    <p>Luxury Modern</p>
                    <p>OD-0002</p> 
                </div>
            </div>

            <div class="picture col">
                <div class="image">
                    <img id="OD-0003" src="img/outdoor/modern_facade3.jpg" alt="OD-0003">
                </div>
                <div class="infos">
                    <p>Lucury Outdoor</p>
                    <p>OD-0003</p> 
                </div>
            </div>

        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="boxCollection gray">
        <div class="boxTitle">
            <h1>Living room</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row">
            <div class="picture col">
                <div class="image">
                    <img id="LR-0004" src="img/indoor/modern-luxury-living-rooms.jpg" alt="LR-0004">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>LR-0004</p> 
                </div>
            </div>
            <div class="picture col">
                <div class="image">
                    <img id="LR-0005" src="img/indoor/modern-luxury-living-rooms.jpg" alt="LR-0005">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>LR-0005</p> 
                </div>
            </div>
            <div class="picture col">
                <div class="image">
                    <img id="LR-0006" src="img/indoor/modern-luxury-living-rooms.jpg" alt="LR-0006">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>LR-0006</p> 
                </div>
            </div>
        </div>   
        <!-- END Box Picture-->
    </div>

    <div class="boxCollection white">
        <div class="boxTitle">
            <h1>Bed room</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row">
            <div class="picture col">
                <div class="image">
                    <img id="BD-0007" src="img/indoor/modern-bedroom.jpg" alt="BD-0007">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>BD-0007</p> 
                </div>
            </div>

            <div class="picture col">
                <div class="image">
                    <img id="BD-0008" src="img/indoor/modern-bedroom.jpg" alt="BD-0008">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>BD-0008</p> 
                </div>
            </div>

            <div class="picture col">
                <div class="image">
                    <img id="BD-0009" src="img/indoor/modern-bedroom.jpg" alt="BD-0009">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>BD-0009</p> 
                </div>
            </div> 
        </div>  
        <!-- END Box Picture--> 
    </div>

    <div class="boxCollection gray">
        <div class="boxTitle">
            <h1>Kitchen</h1> 
        </div>
        <!-- Box Picture -->
        <div class="boxPicture row">
            <div class="picture col">
                <div class="image">
                    <img id="KT-0010" src="img/indoor/kitchen_Ratchford.jpg" alt="KT-0010">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>KT-0010</p> 
                </div>
            </div>

            <div class="picture col">
                <div class="image">
                    <img id="KT-0011" src="img/indoor/kitchen_Ratchford.jpg" alt="KT-0011">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>KT-0011</p> 
                </div>
            </div>

            <div class="picture col">
                <div class="image">
                    <img id="KT-0012" src="img/indoor/kitchen_Ratchford.jpg" alt="KT-0012">
                </div>
                <div class="infos">
                    <p>Description1</p>
                    <p>KT-0012</p> 
                </div>
            </div>
            <!-- END Box Picture-->   
        </div>   

        <div class="boxCollection white">
            <div class="boxTitle">
                <h1>Bathroom</h1> 
            </div>
            <!-- Box Picture -->
            <div class="boxPicture row">
                <div class="picture col">
                    <div class="image">
                        <img id="BA-0013" src="img/indoor/Harbour-Bathroom.jpg" alt="BA-0013">
                    </div>
                    <div class="infos">
                        <p>Description1</p>
                        <p>BA-0013</p> 
                    </div>
                </div>
                <div class="picture col">
                    <div class="image">
                        <img id="BA-0014" src="img/indoor/Harbour-Bathroom.jpg" alt="BA-0014">
                    </div>
                    <div class="infos">
                        <p>Description1</p>
                        <p>BA-0014</p> 
                    </div>
                </div>
                <div class="picture col">
                    <div class="image">
                        <img id="BA-0015" src="img/indoor/Harbour-Bathroom.jpg" alt="BA-0015">
                    </div>
                    <div class="infos">
                        <p>Description1</p>
                        <p>BA-0015</p> 
                    </div>
                </div>   
            </div>
            <!-- END Box Picture-->
        </div>
    </div>

</section>
<!-- END COLLECTION  -->

<?php  include("includes/footer.php") ?>

</body>
</html>