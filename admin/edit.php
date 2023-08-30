<?php 

include('security.php'); 
$page = 'Edit';
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

<div class="container-fluid">
    <div class="main-container">
        <h1>Edit Profile</h1>
        <hr>
        <?php 
        $connection = mysqli_connect("localhost", "root", "", "project01");
        if(isset($_POST['edit_btn'])){
            $id = $_POST['edit_id'];
            $query ="SELECT * FROM users WHERE usersId='$id'";
            $query_run = mysqli_query($connection, $query);
            foreach($query_run as $row){
                ?>
        <form action="code.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="edit_id" value="<?php echo $row['usersId']?>">
            <div class="form-group">
                <input type="hidden" name="userType" value="<?php 
                    if($row['usersType'] =='Admin'){
                        echo 'Admin';
                    }else if($row['usersType'] =='User'){
                        echo 'User';
                    }
                    
                    ?>">
                <h2>
                    <?php 
                        if($row['usersType'] =='Admin'){
                            echo "ADMIN";
                        }else if($row['usersType'] =='User'){
                            echo 'USER';
                        }     
                    ?>
                </h2>
                <br>
                <input type="text" name="edit_first_name" value="<?php echo $row['first_name']?>" class="form-control"
                    placeholder="First name..">
            </div>
            <div class="form-group">
                <input type="text" name="edit_last_name" value="<?php echo $row['last_name']?>" class="form-control"
                    placeholder="Last name..">
            </div>
            <div class="form-group">
                <input type="email" name="edit_usersEmail" value="<?php echo $row['usersEmail']?>" class="form-control"
                    placeholder="Email..">
            </div>
            <div class="form-group">
                <input type="text" name="edit_usersUid" value="<?php echo $row['usersUid']?>" class="form-control"
                    placeholder="Username">
            </div>
            <div class="form-group">
                <input type="text" name="edit_usersPwd" value="<?php echo $row['usersPwd']?>" class="form-control"
                    placeholder="Password..">
            </div>
            <div>
                <label for="image">Upload image</label>
                <br>
                <input type="file" name="faculty_images" id="faculty_images"
                    value="<?php echo $row['faculty_images']?>">
            </div>
            <br>
            <a href="<?php 
                if($row['usersType'] =='Admin'){
                    echo 'admin.php';
                }else if($row['usersType'] =='User'){
                    echo 'users.php';
                }
                
                
                ?>" class="btn btn-danger">Cancel</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
        </form>
        <?php
            }
            
        }
    ?>
    </div>
</div>

<?php 
include('includes/script.php');
?>
