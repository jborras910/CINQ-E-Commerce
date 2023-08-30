<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Cinq.com</title>
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

            <script src="https://kit.fontawesome.com/6cea1e7bdb.js" crossorigin="anonymous"></script>
    </head>

    <body>

        <!--Navbar/end-->
        <!--Home-->
        <div class="container">
        <form class="form" action="includes/login.inc.php" method="post" autocomplete="off">
                    <div class="title">
                        <h5 class="p-0 m-0">Welcome to the Party!</h5>
                        <hr>
                        <img src="assets/logo.png" alt="">
                        <hr>
                        <h6>To activate your account, please continue with the email you provided. Thank You!</h6>
                        <hr>
                    </div>
                    <?php 
                if(isset($_GET["error"])){
                    if($_GET["error"] == "none"){
                        echo "<p class='alert text-success text-center'>You have signed up.. Please continue with the email you provided</p>";
                    }
                }
        ?>

                </form>
      
        </div>

        <!--Home/end-->
    </body>
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
