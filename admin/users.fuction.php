<?php 
 $connection = mysqli_connect("localhost", "root", "","project01");



 if(isset($_POST['register_user'])){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $usersEmail = $_POST['usersEmail'];

    $usersContact = $_POST['usersContact'];
    $usersAddress = $_POST['usersAddress'];

    $usersUid = $_POST['usersUid'];
    $usersPwd = $_POST['usersPwd'];
    $pwdrepeat = $_POST['pwdrepeat'];
    $userType = $_POST['userType'];


    if(empty($first_name) || empty($last_name) || empty($usersEmail) || empty($usersUid) || empty($usersPwd) || empty($pwdrepeat)){
        header('location: users.php?alert=EmptyInput');
    }else if(strlen($first_name) < 4){
        header('location: users.php?alert=invalidfirstname');
    }else if(strlen($last_name) < 4){
        header('location: users.php?alert=invalidlastname');
    }else if(!preg_match("/^[a-zA-Z0-9]*$/", $usersUid)){
        header('location: users.php?invalidUsername');
    }else if(!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)){
        header('location: users.php?alert=invalidEmail');
    }else if(strlen($usersPwd) < 7){
        header('location: users.php?alert=invalidPassword');
    }else if($usersPwd !== $pwdrepeat){
        header('location: users.php?alert=invalidconfirmpassword');
    }else{
        $hashedPwd = password_hash($usersPwd, PASSWORD_DEFAULT);
        $query = "INSERT INTO users
         (first_name,last_name,Contact,Address,usersEmail,usersUid,usersPwd,usersType)
         VALUES
         ('$first_name', '$last_name','$usersContact','$usersAddress','$usersEmail','$usersUid','$hashedPwd','$userType')";



        $query_run = mysqli_query($connection, $query);
        if($query_run){
    
            header('location: users.php?alert=submit');
        }else{
           
            header('location: users.php?error=didntsubmit');
        }
    }
}





if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    $query = "DELETE  FROM users WHERE usersId ='$id'";
    $query_run = mysqli_query($connection,$query);
 
    if($query_run){
            header('location: users.php?alert=datadeleted');
       
    }else{
        
        header('location: users.php?alert=deletederror');
    }
}

if(isset($_POST['search_data'])){
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE users SET visible='$visible' WHERE usersId ='$id'";
    $query_run = mysqli_query($connection,$query);

}

if(isset($_POST['delete_mutiple_data'])){

    $id = "1";
    $query = "DELETE FROM users WHERE visible='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        header('location: users.php?alert=datadeleted');
    }else{
        header('location: users.php?alert=DataisnotDeleted');
    }
}
