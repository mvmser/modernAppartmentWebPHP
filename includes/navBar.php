<!-- Navigation -->        
<div class="navBar">
    <a href="index.php" ><img class="logo" src="img/icons/logo.png" alt="Logo"></a>
    <nav class="navigation">
        <ul class="nav">
            <li><a class="underLineNav nav-link" href="index.php">HOME</a></li>
            <li><a class="underLineNav nav-link" href="collection.php">COLLECTION</a></li>
            <li><a class="underLineNav nav-link" href="manageContent.php">MANAGE</a></li>
            <?php
                if(!$_SESSION){
                    echo "<li><a href='login.php' class='btn btn-outline-dark btn-lg'>LOGIN</a></li>";
                }
                else{
                    echo "<li><a href='logout.php' class='btn btn-outline-dark btn-lg'>LOG OUT</a></li>";
                }
            ?>
            
        </ul>
    </nav>
</div>
<!-- End navigation -->