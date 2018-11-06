<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Home page</title>
    <link rel='icon' href='favicon.ico' type='image/x-icon'/>

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
</head>

<body>

<?php     
    include("includes/headerHome.php"); 
?>

<!-- PRESENTATION 1 -->
<div id="presentation_1">
    <div class="container text-center pt-5">
        <div class="row">
            <div class="col col-6 mx-auto">
                <img class="img1" src="img/indoor/modern-living-room.jpg" alt="Img Presentation">
                <p>Living room</p>
            </div>
            <div class="col col-6 mx-auto">
                <img class="img1" src="img/outdoor/modern_facade3.jpg" alt="Img Presentation">
                <p>Modern outdoor</p>
            </div>
        </div> 
        
        <div class="row">
            <div class="col col-6 mx-auto">
                <img class="img1" src="img/outdoor/modern-facade2.jpg" alt="Img Presentation">
                <p>Outdoor</p>
            </div>
            <div class="col col-6 mx-auto">
                <img class="img1" src="img/outdoor/terrasse.jpg" alt="Img Presentation">
                <p>Luxury terrace</p>
            </div>
        </div>
    </div>
    <div class="next">
        <a href="#presentation_2" class="js-scroll"> <img class="arrow" src="img/icons/down-arrow.png" alt="scroll icon"></a>
    </div>  
</div>
<!-- END PRESENTATION 1 -->

<!-- PRESENTATION 2 -->
<section id="presentation_2" class="d-flex">
    <div class="container m-auto presentation_box text-center">
        <h1 style="font-weight: bold">Redesign your apartment</h1>
        <div class="separator"></div>
        <div class="row mb-5 mt-5">
            <div class="col-6">
                <h2 style="margin-bottom: 20px;">
                    <img src="img/icons/appartment.png" alt="Appartment icon" style="margin-right: 1%;">Appartment Gallery</h2>
                <p><strong>›</strong>  Luxury appartment</p>
                <p><strong>›</strong>  Get some inspiration for your appartment</p>
                <p><strong>›</strong>  All form of appartment</p>

            </div>
            <div class="col-6">
                <h2 style="margin-bottom: 20px;"><img src="img/icons/link.png" alt="Link icon">Join us</h2>
                <p><strong>›</strong>  Search other pictures</p>
                <p><strong>›</strong>  Share your design with us</p>
                <p><strong>›</strong>  Remove it if you want</p>
            </div>
        </div>
        <div class="next">
        <a href="#presentation_3" class="js-scroll"> <img class="arrow" src="img/icons/down-arrow.png" alt="Scroll icon"></a>
        </div>
    </div>
      
</section>

<!-- END PRESENTATION 2 -->
    
<!-- PRESENTATION 3 -->
<section id="presentation_3" >
    <div class="container p-5">
        <div class="row justify-content-center">
            <div class="col-md-12 pb-50 text-center">
                <h1 class="mb-10">What we offer to you</h1>
                <p>Who are in extremely love with the luxury appartment..</p>
            </div>
        </div>						
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="singleBox">
                    <h4>Interior Design</h4>
                    <p>
                        Discover the best luxurious and minimalist 
                        interior design that you can find today around the world!
                    </p>
                </div>
            </div>	
            <div class="col-lg-4">
                <div class="singleBox">
                    <h4>Architecture Design</h4>
                    <p>
                        Dare to discover the luxury design of today and inspire yourself
                        for your own home.
                    </p>
                </div>
            </div>	
            <div class="col-lg-4">
                <div class="singleBox">
                    <h4>Concept Design</h4>
                    <p>
                        Can you imagine what we will be the appartments in another twenty years? 
                        See before these minimalist concepts.
                    </p>
                </div>
            </div>																		
        </div>
        <div class="row mt-5">
            <div class="col-8 singlePic">
                <img src="img/outdoor/sunset-modern-outdoor.jpg" alt="Img">
            </div>
            <div class="col-4 singlePic">
                    <img src="img/square/green-terrasse.jpeg" alt="Img">
            </div>
        </div>
    </div>	
    
</section>
<!-- END PRESENTATION 3 -->
    
<?php  include("includes/footer.php") ?>

<!-- JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/script.js"></script>
<!-- JS -->

</body>
</html>