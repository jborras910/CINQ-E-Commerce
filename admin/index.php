<?php 
$page = 'dashboard';
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php'); 

?>



<!-- Begin Page Content -->
<div class="container-fluid ">

    <!-- Page Heading -->
    <div class="">
        <?php echo '<h1>Welcome back Admin '.$_SESSION['auth_user']["first_name"].' </h1>';?>

        <br>
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <hr>

    </div>


    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-uppercase mb-1">
                                <h6 class="font-weight-bold"><a class="text-light" href="admin.php">Total registered
                                        admin</a>
                                </h6>
                            </div>

                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  
                                                require 'db.config.php';
                                                $query = "SELECT usersId FROM users WHERE usersType='Admin' ORDER BY usersId";
                                                $query_run = mysqli_query($connection,$query);
                                                $row = mysqli_num_rows($query_run);
                                                echo '<h4 class="text-light" >Total Admin: '.$row.' </h4>';
                                                
                                                ?>
                            </div>
                        </div>
                        <div class="col-auto">

                            <i class="fas fa-users-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h6 class="font-weight-bold "><a class="text-light" href="users.php">Total registered
                                        User</a></h6>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  
                                                require 'db.config.php';
                                                $query = "SELECT usersId FROM users WHERE usersType='User' ORDER BY usersId";
                                                $query_run = mysqli_query($connection,$query);
                                                $row = mysqli_num_rows($query_run);
                                                if($row == 0){
                                                    echo '<h4 class="text-light" >No users yet</h4>';
                                                }else {
                                                    echo '<h4 class="text-light" >Total Users: '.$row.' </h4>';
                                                }
                                                
                                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h6 class="font-weight-bold "><a class="text-light" href="inbox.php">Inbox</a></h6>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  
                                                require 'db.config.php';
                                                $query = "SELECT id FROM messages ORDER BY id";
                                                $query_run = mysqli_query($connection,$query);
                                                $row = mysqli_num_rows($query_run);
                                                if($row == 0){
                                                    echo '<h4 class="text-light" >No messeges</h4>';
                                                }else {
                                                    echo '<h4 class="text-light" >Messages: '.$row.' </h4>';
                                                    $_SESSION['number_msg'] = $row;
                                                }
                                                
                                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-gradient-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <h6 class="font-weight-bold "><a class="text-light" href="inbox.php">Profit</a></h6>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <?php  
                                                require 'db.config.php';
                                                $query = "SELECT SUM(Price) FROM user_orders;";
                                                $query_run = mysqli_query($connection,$query);
                                                while($row = mysqli_fetch_array($query_run)){

                                                    echo "<h4 class='text-light'>Total Sales: " . $row['SUM(Price)'] .  "</h4>";
                                             
            
                                             }

                                                
                                                ?>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->



    <!-- Content Row -->


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<?php 
include('includes/script.php');
include('includes/footer.php');
?>
