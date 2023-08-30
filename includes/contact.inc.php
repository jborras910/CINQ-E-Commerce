<?php 

require_once 'dbh.inc.php';

if(isset($_POST['contact_btn'])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $messege = $_POST['message'];
}

if(strlen($first_name) < 3 ){
    header("location: ../contact.php?error=firstnameerror");
}else if(strlen($last_name) < 2 ){
    header("location: ../contact.php?error=lastnameerror");
}else if ($messege == " "){
    header("location: ../contact.php?error=msgerror");
}else{
    $query = "INSERT INTO messages (first_name, last_name, email, message) VALUES('$first_name', '$last_name','$email','$messege')";
    $query_run = mysqli_query($conn, $query);

    if($query_run){
        header("location: ../contact.php?error=none");
    }else{
        header("location: ../contact.php?error=wrongcode");
    }

}








