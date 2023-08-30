<link rel="stylesheet" type="text/css" href="css/footer.site.css?<?php echo time(); ?>" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

<div class="footer-basic mt-5 mb-0">
    <footer class="text-center">

        <div class="social">

            <a href="#">
                <i class="icon ion-social-facebook"></i>
            </a>
            <a href="#">
                <i class="icon ion-social-twitter"></i>
            </a>
            <a href="#">
                <i class="icon ion-social-instagram"></i>
            </a>
            <a href="#">
                <i class="icon ion-social-snapchat"></i>
            </a>


        </div>

        <ul class="list-inline">
            <li class="list-inline-item"><a href="index.php"><i class="fas fa-home"></i>Home</a></li>
            <li class="list-inline-item"><a href="cheesecake.php"><i class="fas fa-cheese"></i>Cheesecake</a></li>
            <li class="list-inline-item"><a href="stuffedcones.php"><i class="fas fa-ice-cream"></i>Stuffed Cones</a>
            </li>
            <li class="list-inline-item"><a href="waffles.php"><i class="fas fa-stroopwafel"></i>Waffles</a></li>
            <li class="list-inline-item"><a href="about.php"><i class="fas fa-flag"></i>About</a></li>
            <li class="list-inline-item"><a href="contact.php"><i class="fas fa-address-book"></i>Contact</a></li>
            <?php 
            if(isset($_SESSION['useruid'])){
                echo "";
            }else{
                echo "<li class='list-inline-item'><a href='signup.php'><i class='fas fa-user'></i>Sign Up</a></li>";
                echo " <li class='list-inline-item'><a href='login.php'><i class='fas fa-sign-in-alt'></i>Sign In</a></li>";
            }
            
            ?>

        </ul>
        <hr>
        <p class="copyright">Cinq.com © 2021</p>
    </footer>
</div>
