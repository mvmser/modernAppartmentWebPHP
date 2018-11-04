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

<!-- Header -->
<header class="navBar">
    <div>
        <a href="home.html" ><img class="logo" src="img/icons/logo.png" alt="Logo"></a>
        <!-- Navigation -->        
        <nav class="navigation">
            <ul class="nav">
                <li><a class="underLineNav nav-link" href="home.html">HOME</a></li>
                <li><a class="underLineNav nav-link" href="collection.html">COLLECTION</a></li>
                <li><a class="underLineNav nav-link" href="manageContent.html">MANAGE</a></li>
                <li><a href="login.html" class="btn btn-outline-dark btn-lg">LOGIN</a></li>
            </ul>
        </nav>
    </div>
    <!-- End navigation -->
</header>
<!-- END Header -->

<!-- MANAGE PAGE -->
<section class="managePage">
    <!-- ADD -->
    <div class="addOrRm">
        <div class="addImg">
            <h2>ADD</h2>
            
            <div class="container mx-auto">
                <select class="form-control mb-3"  id="TitlePic">
                    <option>Select title..</option>
                    <option>Outdoor</option>
                    <option>Indoor</option>
                    <option>Living Room</option>
                    <option>Bedroom</option>
                    <option>Kitchen</option>
                    <option>Bathroom</option>
                </select>
                <input type="text" class="form-control" placeholder="Description" id="DescriptionPic">
                
                <div class="upload panel panel-default">
                    <div class="panel-heading clearfix">
                        <h3 class="panel-title a-left my-2">Upload Image</h3>
                    </div>
                    
                    <div class="url-tab panel-body">
                        <div class="input-group">
                            <input type="text" class="form-control hasclear" placeholder="Image URL" id="imageURL">
                            <div class="input-group-btn">
                                <button type="button" class="btn btn-outline-success">Preview</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-outline-success mb-2">Add</button>
            </div>

        </div>
        <!-- END ADD -->

        <!-- REMOVE -->
        <div class="rmImg">
            <h2>REMOVE</h2>
            <div class="container">
                <input type="text" class="form-control mb-3" placeholder="ID picture" id="idPic">
                <button type="button" class="btn btn-outline-danger mb-2">Remove</button>
            </div>
        </div>
        <!-- EN REMOVE-->
    </div>    
</section>
<!-- END MANAGE PAGE -->
    
    
<?php  include("include/footer.php") ?>

<!-- JS -->

<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/imageupload.js"></script>
<script src="js/script.js"></script>

</body>
</html>