<?php 
include('security.php'); 
$page='Inbox';
include('includes/header.php'); 
include('includes/navbar.php'); 

?>
<div class="container-fluid">
    <div class="main-container">
        <h1>Inbox</h1>

        <form action="inbox.fuctions.php" method="post" class=" mt-3 mb-3">
            <button type="submit" name="delete_mutiple_data" id="form_delete_btn" class="btn btn-primary">Delete
                multiple
                data</button>
        </form>
        <div class="table-container p-2">
            <?php   
        $query = "SELECT * FROM messages";
        $query_run = mysqli_query($connection, $query);
      
      ?>
            <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Check</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  
      if(mysqli_num_rows($query_run) >0){
        while($row=mysqli_fetch_assoc($query_run)){
        
          ?>
                    <tr>
                        <td> <input type="checkbox" onclick="toggleCheckbox(this)" value="<?php  echo $row['id'];?>"
                                <?php echo$row['visible'] ==1 ? "checked" : ""?>>
                        </td>
                        <td><?php  echo $row['first_name'];?></td>
                        <td><?php  echo $row['last_name'];?></td>
                        <td><?php  echo $row['email'];?></td>
                        <td><?php  echo $row['message'];?></td>

                        <td>
                            <form action="code.php" method="post">
                                <input type="hidden" name="delete_msg_id" value="<?php echo $row['id']?>">
                                <button type="submit" name="delete_msg_btn" class="btn btn-danger">DELETE</button>
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
        url: "inbox.fuctions.php",
        data: data,
        success: function(response) {

        }

    });

}
</script>
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script> <!-- Page level plugins -->
