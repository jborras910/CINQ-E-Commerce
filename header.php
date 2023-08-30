<?php 
  session_start();
 
?>

<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="assets/logo.png" />
        <title>Cinq Project</title>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" type="text/css" href="css/style.css?<?php echo time(); ?>" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;1,300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous" />
        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>






        <style>
        .user_image {

            width: 100%;
            color: #fff;
            background: #EA4335;

            margin-right: 4px;
            padding: 5px 15px;
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.5);


        }

        </style>












    </head>















    <body>
        <!--Navigation-->




        <!-- Modal -->
        <div class="modal fade" id="logoutbtn" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to log out at this time?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href="admin/logout.php" class="btn btn-primary">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light mb-4">
            <div class="container">
                <div>
                    <a class="navbar-brand"><img src="assets/logo3.png" alt=""></a>

                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                            <a class="nav-link <?php if($page=='home'){echo 'active';}?>" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle <?php if($page=='menu'){echo 'active';}?>"
                                id="navbarDropdown" role="button" data-toggle="dropdown" href=""> Menu</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cheesecake.php">Cheesecake</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="stuffedcones.php">Stuffed Cones</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="waffles.php">Waffles</a>
                            </div>
                        </li>
                        <!--    <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle  <?php if($page=='recipe'){echo 'active';}?>"
                                id="navbarDropdown" role="button" data-toggle="dropdown" href="">Recipes</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="cheesecake.recipe.php">Cheesecake</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="stuffedcones.recipe.php">Stuffed Cones</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="waffles.recipe.php">Waffles</a>
                            </div>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link  <?php if($page=='about'){echo 'active';}?>" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link  <?php if($page=='contact'){echo 'active';}?>"
                                href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <?php 
                           
                           $count=0;
                           if(isset($_SESSION['cart'])){
                               $count= count($_SESSION['cart']);
                           }
                           if($count==0){
                               echo" <div class='shopping-cart'> <a href='mycart.php' class='fa-solid fa-cart-shopping nav-link' aria-hidden='true'></a></div>";
                           }else{
                               echo" <div class='shopping-cart'> <a href='mycart.php' class='fa-solid fa-cart-shopping nav-link' aria-hidden='true'> <span>$count</span></a></div>";
                        
                       }
?>
                        </li>
                    </ul>
                </div>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto account">

                        <?php if(isset( $_SESSION["verify"])) : ?>

                        <li class="nav-item dropdown no-arrow profile ">
                            <a class=" nav-link dropdown-toggle position-relative" href="#" id="userDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo  "<span class='user_image'>".substr($_SESSION['auth_user']['users_Email'],  0, 1)."</span>"    ." ".$_SESSION['auth_user']['users_Email'] ?>


                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="mt-2 dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <?php if(isset($_SESSION["Admin"])) : ?>
                                <a class="dropdown-item" href="Admin/index.php">
                                    <i class="fa-solid fa-screwdriver-wrench fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Admin Site
                                </a>
                                <div class="dropdown-divider"></div>
                                <?php endif; ?>
                                <a class="dropdown-item" type="button" data-toggle="modal" data-target="#logoutbtn">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                        <?php else : ?>
                        <li class='nav-item '><a class='nav-link ' href='signup.php'><i class='fas fa-sign-in-alt'
                                    aria-hidden='true'></i>Sign Up</a></li>
                        <li class='nav-item '><a class='nav-link login' href='login.php'><i class='fa fa-user'
                                    aria-hidden='true'></i>Log In</a></li>
                        <?php endif; ?>



                    </ul>
                </div>
            </div>
        </nav>


        <!--Navigation/end-->

        <div class="container-fluid main">
