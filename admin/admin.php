<?php 

$page = 'Admin';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 


?>

<div class="container-fluid">

    <div class="main-container">
        <h1>Profile Admin</h1>
        <hr>

        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                        <h5 class="modal-title">Add admin</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="code.php" method="POST" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="userType" value="Admin">
                                <input type="text" name="first_name" class="form-control" require
                                    placeholder="First name..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" require
                                    placeholder="Last name..">
                            </div>
                            <div class="form-group">
                                <input type="email" name="usersEmail" class="form-control" require
                                    placeholder="Email..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="usersUid" class="form-control" require placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="usersPwd" class="form-control" require
                                    placeholder="Password..">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwdrepeat" class="form-control" require
                                    placeholder="Repeat Password...">
                            </div>
                            <div>
                                <label for="image">Upload image</label>
                                <br>
                                <input type="file" name="faculty_images" id="faculty_images" require>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="register_admin" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <div class="row">

            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter">Add
                Admin
                Profile</button>

            <br>
            <form action="code.php" method="post" class="ml-2">
                <button type="submit" name="delete_mutiple_data" id="form_delete_btn" class="btn btn-primary">Delete
                    multiple
                    data</button>
            </form>
        </div>
        <br>
        <?php
        if(isset($_GET["alert"])){
          if($_GET["alert"] == "datadeleted"){
            echo "<h2 class='bg-primary text-white p-2'>Data deleted</h2>";
        }else if ($_GET['alert'] == 'deletederror'){
          echo "<h2 class='bg-danger text-white p-2'>Data deleted</h2>";
        }else if($_GET['alert'] == 'dataupdated'){
          echo "<h2 class='bg-primary text-white p-2'>Data Updated</h2>";
        }else if($_GET['alert']=='submit'){
          echo "<h2 class='bg-primary text-white p-2'>Admin added</h2>";
        }else if($_GET['alert']=='invalidfirstname'){
          echo "<h2 class='bg-danger text-white p-2'>Invalid First name</h2>";
        }else if($_GET['alert']=='invalidlastname'){
          echo "<h2 class='bg-danger text-white p-2'>Invalid Last name</h2>";
        }else if($_GET['alert']=='invalidEmail'){
          echo "<h2 class='bg-danger text-white p-2'>Invalid Email</h2>";
        }else if($_GET['alert']=='invalidPassword'){
          echo "<h2 class='bg-danger text-white p-2'>invalid Password</h2>";
        }else if($_GET['alert']=='invalidconfirmpassword'){
          echo "<h2 class='bg-danger text-white p-2'>invalid Confirm Password</h2>";
        }else if($_GET['alert']=='EmptyInput'){
          echo "<h2 class='bg-danger text-white p-2'>Empty Input</h2>";
        }
        }



      ?>

        <div class="table-container">
            <?php   
      $connection = mysqli_connect("localhost", "root", "", "project01");


        $query = "SELECT * FROM users WHERE usersType='Admin'";
        $query_run = mysqli_query($connection, $query);
      
      
      ?>
            <table class="table table-bordered text-center border-5 bg-light" id="dataTable" width="100%"
                cellspacing="0">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>

                        <th scope="col">Email</th>
                        <th scope="col">User ID</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
      if(mysqli_num_rows($query_run) >0){
        while($row=mysqli_fetch_assoc($query_run)){
        
          ?>

                    <tr>
                        <td> <input type="checkbox" onclick="toggleCheckbox(this)"
                                value="<?php  echo $row['usersId'];?>" <?php echo$row['visible'] ==1 ? "checked" : ""?>>
                        </td>
                        <td><?php  echo $row['usersId'];?></td>
                        <td> <?php echo'<img class="rounded-circle border mx-3" src="upload/'.$row['faculty_images'].'" width="70px" height="70px" alt="image"/>'."  ".$row['first_name']." ".$row['last_name'] ?>
                        </td>
                        <td><?php  echo $row['usersEmail'];?></td>
                        <td><?php  echo $row['usersUid'];?></td>
                        <td><?php  echo substr($row['usersPwd'], 0, -40); ?></td>
                        <td>

                            <form action="edit.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php  echo $row['usersId'];?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="delete_id" value="<?php echo $row['usersId']?>">
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


        <?php 

include('includes/script.php');



?>
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script> <!-- Page level plugins -->





        <script>
        function toggleCheckbox(box) {
            var id = $(box).attr("value");

            if ($(box).prop("checked") == true) {
                var visible = 1;
                var delete_btn = document.getElementById("form_delete_btn");
                delete_btn.classList.add("btn-danger");
                delete_btn.classList.remove("btn-primary");
            } else {
                var visible = 0;
                var delete_btn = document.getElementById("form_delete_btn");
                delete_btn.classList.add("btn-primary");
                delete_btn.classList.remove("btn-danger");
            }
            var data = {
                "search_data": 1,
                "id": id,
                "visible": visible
            };

            $.ajax({
                type: "post",
                url: "code.php",
                data: data,
                success: function(response) {

                }

            });

        }
        </script>
