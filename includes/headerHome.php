<!-- Header -->
<header id="headerHome">

    <?php  include("navBar.php") ?>

    <!-- BANNER -->
    <section>
        <div class="container text-center mt-5">
            <div class="row">
                <div class="col mx-auto title">
                    <h1 class="title">A new way to see luxury apartments</h1>
                </div>
                <?php
                    if(isset($_SESSION['username'])){
                        echo "<div class='container pt-5'>
                                <div class='alert  mt-5 col-4 mx-auto' role='alert'>
                                    <h4 class='alert-heading'>Welcome " .$_SESSION['username']. "!</h4>
                                    <p>...</p>
                                    <hr>
                                    <p class='mb-0'>..</p>
                                </div>
                            </div>";
                    }
                ?>
            </div> 
        </div>
        <div class="next">
            <a href="#presentation_1" class="js-scroll"> <img class="arrow" src="img/icons/down-arrow.png" alt="Scroll icon"></a>
        </div>
    </section>
    <!-- END BANNER -->
</header>
<!-- END Header -->