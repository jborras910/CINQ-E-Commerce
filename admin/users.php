<?php 

$page = 'Users';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>


<div class="container-fluid">
    <div class="main-container">
        <h1>Profile Users</h1>
        <hr>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Users</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="users.fuction.php" method="POST">
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="hidden" name="userType" value="User">
                                <input type="text" name="first_name" class="form-control" placeholder="First name..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last name..">
                            </div>
                            <div class="form-group">
                                <input type="email" name="usersEmail" class="form-control" placeholder="Email..">
                            </div>
                            <div class="form-group">
                                <input type="number" name="usersContact" class="form-control" placeholder="Contact..">
                            </div>

                            <div class="form-group">
                                <input type="text" name="usersAddress" class="form-control" placeholder="Address..">
                            </div>
                            <div class="form-group">
                                <input type="text" name="usersUid" class="form-control" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="password" name="usersPwd" class="form-control" placeholder="Password..">
                            </div>
                            <div class="form-group">
                                <input type="password" name="pwdrepeat" class="form-control"
                                    placeholder="Repeat Password...">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="register_user" class="btn btn-primary">Save</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <br>
        <div class="row">

            <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModalCenter">Add
                Users
                Profile</button>

            <br>
            <form action="users.fuction.php" method="post" class="ml-2">
                <button type="submit" name="delete_mutiple_data" class="btn btn-primary" id="form_delete_btn">Delete
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
          echo "<h2 class='bg-primary text-white p-2'>User added</h2>";
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

        <div class="table-container ">
            <?php   

        $query = "SELECT * FROM users WHERE usersType='User'";
        $query_run = mysqli_query($connection, $query);
      
      
      ?>
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th scope="col">IDs</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
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
                        <td><?php  echo $row['first_name']. ' '. $row['last_name']?></td>
                        <td><?php  echo $row['Contact'];?></td>
                        <td><?php  echo $row['Address'];?></td>
                        <td><?php  echo $row['usersEmail'];?></td>
                        <td><?php  echo $row['usersUid'];?></td>
                        <td><?php  echo substr($row['usersPwd'], 0, -40);?></td>
                        <td>

                            <form action="edit.php" method="POST">
                                <input type="hidden" name="edit_id" value="<?php  echo $row['usersId'];?>">
                                <button type="submit" name="edit_btn" class="btn btn-success">EDIT</button>
                            </form>
                        </td>
                        <td>
                            <form action="users.fuction.php" method="post">
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


    </div>
</div>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script> <!-- Page level plugins -->
<?php 

include('includes/script.php');

?>
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
