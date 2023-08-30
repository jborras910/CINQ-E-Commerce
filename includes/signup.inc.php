<?php



if(isset($_POST["submit"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdrepeat"];
    $userstype = $_POST["userstype"];
    


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';
    if(emptyInputSignup($first_name, $last_name,$contact,$address, $email, $username, $pwd, $pwdRepeat) !== false){


        $_SESSION["status"] = 'Fill in all the fields!';
        header("location: ../signup.php?error=emptyinput");
        

        exit();
    }
    if(firstnameInvalid($first_name) !== false){
        $_SESSION["status"] = 'Invalid First Name';
        header("location: ../signup.php?error=invalidFirstname");
        exit();
    }
    if(lastnameInvalid($last_name) !== false){

        $_SESSION["status"] = 'Invalid Last Name';
        header("location: ../signup.php?error=invalidlastname");
        exit();
    }
    
    if(invalidUid($username) !== false){

        $_SESSION["status"] = 'Invalid Username';
        header("location: ../signup.php?error=invaliduid");
        exit();
    }

    if(invalidEmail($email) !== false){
        $_SESSION["status"] = 'Invalid Email';
        header("location: ../signup.php?error=invalidemail");
        exit();
    }
    if(pwdShort($pwd) !== false){
        $_SESSION["status"] = 'Invalid password';
        header("location: ../signup.php?error=shortpassword");
        exit();
    }

    if(pwdMatch($pwd, $pwdRepeat) !== false){
        $_SESSION["status"] = 'Invalid confirm password';
        header("location: ../signup.php?error=passworsdontmatch");
        exit();
    }
    if(uidExists($conn, $username, $email) !== false){
        $_SESSION["status"] = 'username or email is already taken';
        header("location: ../signup.php?error=usernametaken");
        exit();
    }

    createUser($conn, $first_name, $last_name,$contact,$address, $email, $username, $pwd, $userstype);

}
