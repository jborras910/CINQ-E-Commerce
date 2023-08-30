<?php 
include('security.php'); 

if(isset($_POST['save'])){

    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];

    $query = "INSERT INTO contactuspage (title,sub_title,descriptions) VALUES('$title', '$sub_title','$description')";
    $query_run = mysqli_query($connection, $query);

    if($query_run){

        header('location: contactUs-page.php?alert=datasubmit');
    }else{
    
        header('location: users.php?error=datadidntsubmit');
    }
    
}
