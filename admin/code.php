<?php 

    session_start();
    $connection = mysqli_connect("localhost", "root", "","project01");

    if(isset($_POST['register_admin'])){

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $usersEmail = $_POST['usersEmail'];
        $usersUid = $_POST['usersUid'];
        $usersPwd = $_POST['usersPwd'];
        $pwdrepeat = $_POST['pwdrepeat'];
        $faculty_images = $_FILES["faculty_images"]['name'];
        $userType = $_POST['userType'];
    
        if(file_exists("upload/" .$_FILES["faculty_images"]["name"])){
            $store = $_FILES["faculty_images"]["name"];
            header('location: admin.php?alert=imagealreadytake');
        }else{
            if(empty($first_name) || empty($last_name) || empty($usersEmail) || empty($usersUid) || empty($usersPwd) || empty($pwdrepeat)){
                header('location: admin.php?alert=EmptyInput');
            }else if(strlen($first_name) < 4){
                header('location: admin.php?alert=invalidfirstname');
            }else if(strlen($last_name) < 4){
                header('location: admin.php?alert=invalidlastname');
            }else if(!preg_match("/^[a-zA-Z0-9]*$/", $usersUid)){
                header('location: admin.php?invalidUsername');
            }else if(!filter_var($usersEmail, FILTER_VALIDATE_EMAIL)){
                header('location: admin.php?alert=invalidEmail');
            }else if(strlen($usersPwd) < 7){
                header('location: admin.php?alert=invalidPassword');
            }else if($usersPwd !== $pwdrepeat){
                header('location: admin.php?alert=invalidconfirmpassword');
            }
            $hashedPwd = password_hash($usersPwd, PASSWORD_DEFAULT);
            $query = "INSERT INTO users (first_name,last_name,usersEmail,usersUid,usersPwd,usersType,faculty_images)
             VALUES('$first_name', '$last_name','$usersEmail','$usersUid','$hashedPwd','$userType','$faculty_images')";
            $query_run = mysqli_query($connection, $query);
            if($query_run){
                move_uploaded_file($_FILES["faculty_images"]["tmp_name"], "upload/".$_FILES["faculty_images"]["name"]);
                header('location: admin.php?alert=submit');
            }else{
                $_SESSION['status'] = "Admin profile not added";
                header('location: admin.php?error=didntsubmit');
            }
        }   
}


if(isset($_POST['updatebtn'])){
    $id= $_POST['edit_id'];
    $first_name_edit = $_POST['edit_first_name'];
    $last_name_edit = $_POST['edit_last_name'];
    $usersEmail_edit = $_POST['edit_usersEmail'];
    $usersUid_edit = $_POST['edit_usersUid'];
    $usersPwd_edit = $_POST['edit_usersPwd'];
    $userType = $_POST['userType'];
    $edit_faculty_images = $_FILES["faculty_images"]['name']; 
  

    if(strlen($first_name_edit) < 4){
        if($userType == 'Admin'){
            header('location: admin.php?alert=firstnameinvalid');
        }else if($userType == 'User'){
            header('location: users.php?alert=firstnameinvalid');
        }
    }else{
        $hashedPwd = password_hash($usersPwd_edit, PASSWORD_DEFAULT);
        $query = "UPDATE users SET 
        first_name='$first_name_edit', 
        last_name='$last_name_edit',
        usersEmail='$usersEmail_edit',
        usersUid='$usersUid_edit',
        usersPwd='$hashedPwd',
        faculty_images='$edit_faculty_images' 
        WHERE usersId='$id'";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
            if($userType == 'Admin'){
                move_uploaded_file($_FILES["faculty_images"]["tmp_name"], "upload/".$_FILES["faculty_images"]["name"]);
                header('location: admin.php?alert=dataupdated');
            }else if($userType == 'User'){
                header('location: users.php?alert=dataupdated');
            }
        }else{
            $_SESSION['status'] = "Your data is not updated";
            header('location: admin.php');
        }
    }
}
    

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    $query = "DELETE  FROM users WHERE usersId ='$id'";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        $_SESSION['succes'] = "Your data is deleted";
        header('location: admin.php?alert=datadeleted');
       
    }else{
        $_SESSION['status'] = "Your data is not deleted";
        header('location: admin.php');
    }
}
if(isset($_POST['delete_msg_btn'])){
    $id = $_POST['delete_msg_id'];
    $query = "DELETE FROM messages WHERE id='$id'";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        header('location: inbox.php?alert=datahasbeendeleted');
    }else{
        header('location: inbox.php?alert=error');
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
        header('location: admin.php?alert=DataDeleted');
    }else{
        header('location: admin.php?alert=DataisnotDeleted');
    }
}



?>
