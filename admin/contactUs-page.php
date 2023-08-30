<?php 


include('security.php'); 
$page = 'pages';
include('includes/header.php'); 
include('includes/navbar.php'); 


?>
<div class="container-fluid">
    <div class="main-container">
        <h1>Contact Us Page</h1>
        <hr>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Contact Us Page</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="contactUspage.fuction.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" placeholder="Title..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="sub_title" class="form-control" placeholder="Sub Title..">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Description"
                                    rows="3"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>

        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Add content
            Profile</button>
        <br>
        <br>


        <div class="table-container">
            <?php   

        $query = "SELECT * FROM contactuspage";
        $query_run = mysqli_query($connection, $query);
      
      
      ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Sub Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  if(isset($_GET["alert"])){
          if($_GET["alert"] == "dataupdated"){
            echo "<h2 class='bg-primary text-white p-2'>Data Updated</h2>";
        }
        }?>
                    <?php  
      if(mysqli_num_rows($query_run) >0){
        while($row=mysqli_fetch_assoc($query_run)){
        
          ?>


                    <tr>
                        <td><?php  echo $row['id'];?></td>
                        <td><?php  echo $row['title'];?></td>
                        <td><?php  echo $row['sub_title'];?></td>
                        <td><?php  echo $row['descriptions'];?></td>

                        <td>

                            <form action="edit_contactUs-page.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php  echo $row['id'];?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="contactUspage.fuction.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['id']?>">
                                <button type="submit" name="delete_btn" class="btn btn-danger">DELETE</button>
                            </form>
                        </td>

                    </tr>
                    <?php
        }
       }else{
         echo"No record found";
       }
       ?>

                </tbody>
            </table>
        </div>


    </div>
</div>

<?php 

include('includes/script.php');

?>
