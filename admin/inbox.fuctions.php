<?php 
include('security.php'); 

if(isset($_POST['search_data'])){
    $id = $_POST['id'];
    $visible = $_POST['visible'];

    $query = "UPDATE messages SET visible='$visible' WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);

}

if(isset($_POST['delete_mutiple_data'])){

    $id = "1";
    $query = "DELETE FROM messages WHERE visible='$id'";
    $query_run = mysqli_query($connection,$query);

    if($query_run){
        header('location: inbox.php?alert=DataDeleted');
    }else{
        header('location: inbox.php?alert=DataisnotDeleted');
    }
}
