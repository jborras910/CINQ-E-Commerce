<?php 

include('security.php');
 
if(isset($_POST['add_product'])){

    $title = $_POST['title'];
    $price = $_POST['price'];

    $description = $_POST['description'];
    $faculty_images = $_FILES["faculty_images"]['name'];
    $faculty_images_2 = $_FILES["faculty_images_2"]['name'];


   
        $query = "INSERT INTO cheesecake_product (title,price,product_image,descriptions,modal_images)
         VALUES('$title', '$price','$faculty_images','$description','$faculty_images_2')";

        $query_run = mysqli_query($connection, $query);
        if($query_run){
            move_uploaded_file($_FILES["faculty_images"]["tmp_name"], "../product_img/".$_FILES["faculty_images"]["name"]);
            move_uploaded_file($_FILES["faculty_images_2"]["tmp_name"], "../product_img/".$_FILES["faculty_images_2"]["name"]);

            $_SESSION["status"] = 'Your Data is Added';
            header('location: Cheesecake.product.php?alert=success');
        }else{
            header('location: Cheesecake.product.php?error=didntsubmit');
        }
    }   




if(isset($_POST['updatebtn'])){
    $id = $_POST['edit_id'];
    $edit_title = $_POST['edit_title'];
    $edit_price = $_POST['edit_price'];
    $edit_description = $_POST['edit_description'];
    $edit_faculty_images = $_FILES["faculty_images"]['name']; 
    $edit_faculty_images_2 = $_FILES["edit_faculty_images_2"]['name']; 
    
  
        $query = "UPDATE cheesecake_product SET 
        title='$edit_title', 
        price='$edit_price',
        descriptions = '$edit_description',
        product_image='$edit_faculty_images',
        modal_images='$edit_faculty_images_2'
        WHERE id='$id'";
        $query_run = mysqli_query($connection,$query);
        if($query_run){
                move_uploaded_file($_FILES["faculty_images"]["tmp_name"], "../product_img/".$_FILES["faculty_images"]["name"]);
                move_uploaded_file($_FILES["edit_faculty_images_2"]["tmp_name"], "../product_img/".$_FILES["edit_faculty_images_2"]["name"]);
                $_SESSION["status"] = 'Your Data is updated';
                header('location: Cheesecake.product.php?alert=dataupdated');
          
        }else{
           
            header('location: Cheesecake.product.php?alert=didntdataupdated');
        }
    
}

if(isset($_POST['delete_btn'])){
    $id = $_POST['delete_id'];
    $query = "DELETE  FROM cheesecake_product WHERE id ='$id'";
    $query_run = mysqli_query($connection,$query);
    if($query_run){
        header('location: Cheesecake.product.php?alert=datadeleted');
        $_SESSION["status"] = 'Your Data is Deleted';
       
    }else{
      
        header('location: Cheesecake.product.php?alert=error');
    }
}
