<?php session_start();

if(isset($_SESSION['auth_user']["usersUid"])){
    header("location: index.php?alert=accessdenied");
}

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cinq.com</title>
        <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
        <link rel="stylesheet" type="text/css" href="css/form.css?<?php echo time(); ?>" />
        <link rel="icon" href="assets/logo.png" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;1,300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
            integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
            crossorigin="anonymous" />
        <!--font awesome icon-->
        <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <!--Navbar/end-->
        <!--Home-->
        <div class="container">

            <section>

                <form class="form" action="includes/signup.inc.php" method="post" autocomplete="off">
                    <div class="title">
                        <h5>Register</h5>
                    </div>
                    <div class="container">
                        <div class="form-group ">
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input type="text" name="first_name" placeholder="First name...">
                            </div>
                        </div>
                        <div class="form-group ">

                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input type="text" name="last_name" placeholder="Last name...">
                            </div>
                        </div>
                        <div class="form-group ">

                            <div class="input-container">
                                <i class="fas fa-mobile-alt icon"></i>
                                <input type="text" name="contact" placeholder="Phone number...">
                            </div>
                        </div>
                        <div class="form-group ">

                            <div class="input-container">
                                <i class="fa fa-address-card icon"></i>
                                <input type="text" name="address" placeholder="Address...">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input type="text" name="uid" placeholder="User Name..">
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input type="text" name="email" placeholder="Email..">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" id="password1" name="pwd" placeholder="Password..">
                                <span class="fa fa-eye" id="toggle-password1"></span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="input-container">
                                <i class="fa fa-lock icon"></i>
                                <input type="password" id="password2" name="pwdrepeat" placeholder="Repeat Password...">
                                <input type="hidden" name="userstype" value="User">
                                <span class="fa fa-eye" id="toggle-password2"></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary  btn-block">Register</button>
                        </div>

                        <div class="form-group login-here">
                            <label for="">Have an account?</label>
                            <a href="login.php">login here</a>
                            <br>
                            <a href="index.php"> Go back to the page</a>
                        </div>
                    </div>

                    <?php if(isset($_SESSION['status']) && $_SESSION['status'] !='') :?>

                    <p class='alert text-danger text-center'><?php echo $_SESSION['status'];
                                    unset($_SESSION['status'])
                                ?>
                    </p>

                    <?php endif; ?>


















                </form>
        </div>

        <!--Home/end-->
    </body>
    <script src="script/signup.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</html>
