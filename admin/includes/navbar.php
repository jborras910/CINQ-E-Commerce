 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">


     <div class='p-2 mt-5 mb-4 text-center'>
         <?php echo'<img style="width:89px; padding:2px;"  class="img-profile rounded-circle mb-2 border "  src="upload/'.$_SESSION['auth_user']["Admin_img"].'" alt="image"/>' ?>

         <br>
         <?php echo "<span style='font-size:15px font-weight:bold'class='text-center text-white '>". ucfirst($_SESSION['auth_user']['first_name']) ." " . ucfirst($_SESSION['auth_user']['last_name']) ."</span>";?>
         <br>
         <span class='text-white' style='font-size:14px'>Administrator</span>

     </div>

     <!-- Sidebar - Brand -->


     <!-- Divider -->
     <hr class=" sidebar-divider my-0">

     <!-- Nav Item - Dashboard -->
     <li class="nav-item <?php if($page=='dashboard'){echo 'active';}?>">
         <a class="nav-link" href="index.php">
             <i class="fas fa-fw fa-tachometer-alt"></i>

             <span>Dashboard</span></a>
     </li>
     <hr class="sidebar-divider d-none d-md-block">
     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item <?php if($page=='pages'){echo 'active';}?>">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
             aria-controls="collapseTwo">
             <i class="fas fa-fw fa-cog"></i>
             <span>Website Pages</span>
         </a>
         <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Componets</h6>
                 <a class="collapse-item" href="#">Home</a>

                 <a class="collapse-item" href="#">About</a>
                 <a class="collapse-item" href="#">Recipes</a>
                 <a class="collapse-item" href="contactUs-page.php">Contact Us</a>
             </div>
         </div>
     </li>

     <!-- Nav Item - Pages Collapse Menu -->
     <li class="nav-item <?php if($page=='MenuPage'){echo 'active';}?>">
         <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMenu" aria-expanded="true"
             aria-controls="collapseMenu">
             <i class="fas fa-birthday-cake"></i>
             <span>Menu</span>
         </a>
         <div id="collapseMenu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
             <div class="bg-white py-2 collapse-inner rounded">
                 <h6 class="collapse-header">Products</h6>
                 <a class="collapse-item" href="Cheesecake.product.php">Cheesecake</a>
                 <a class="collapse-item" href="Waffle.product.php">Waffle</a>
                 <a class="collapse-item" href="Stuffed.product.php">Stuffed Cones</a>
             </div>
         </div>
     </li>


     <hr class="sidebar-divider">


     <li class="nav-item <?php if($page=='Admin'){echo 'active';}?>">
         <a class="nav-link" href="admin.php">
             <i class="fas fa-users-cog"></i>
             <span>Admin Profiles</span></a>
     </li>
     <hr class="sidebar-divider">


     <li class="nav-item <?php if($page=='Users'){echo 'active';}?>">
         <a class="nav-link" href="users.php">
             <i class="fas fa-users"></i>
             <span>Users Profile</span></a>
     </li>
     <hr class="sidebar-divider">

     <li class="nav-item <?php if($page=='Inbox'){echo 'active';}?>">
         <a class="nav-link" href="inbox.php">
             <i class="fas fa-envelope"></i>
             <span>Inbox</span></a>
     </li>
     <hr class="sidebar-divider">



     <li class="nav-item <?php if($page=='Orders'){echo 'active';}?>">
         <a class="nav-link " href="Orders.php">
             <i class="fas fa-shopping-cart"></i>
             <span>Orders</span></a>
     </li>


     <hr class="sidebar-divider d-none d-md-block">


     <div class="text-center d-none d-md-inline">
         <button class="rounded-circle border-0" id="sidebarToggle"></button>
     </div>


 </ul>
 <!-- End of Sidebar -->

 <!-- Scroll to Top Button-->
 <a class="scroll-to-top rounded" href="#page-top">
     <i class="fas fa-angle-up"></i>
 </a>

 <!-- Content Wrapper -->
 <div id="content-wrapper" class="d-flex flex-column">
     <!-- Main Content -->
     <div id="content">
         <!-- Topbar -->
         <nav class="
        navbar navbar-expand navbar-light
        bg-gradient
        topbar
        mb-4
        static-top
        shadow
      ">


             <!-- Topbar Search -->
             <form class="
          d-none d-sm-inline-block
          form-inline
          mr-auto
          ml-md-3
          my-2 my-md-0
          mw-100
          navbar-search
        ">
                 <div class="input-group">
                     <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                         aria-label="Search" aria-describedby="basic-addon2" />
                     <div class="input-group-append">
                         <button class="btn btn-secondary" type="button">
                             <i class="fas fa-search fa-sm"></i>
                         </button>
                     </div>
                 </div>
             </form>

             <!-- Topbar Navbar -->
             <ul class="navbar-nav ml-auto">
                 <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                 <li class="nav-item dropdown no-arrow d-sm-none">
                     <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                         data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fas fa-search fa-fw"></i>
                     </a>

                 </li>
                 <!-- Nav Item - Messages -->
                 <li class="nav-item dropdown no-arrow mx-1">
                     <a class="nav-link " href="inbox.php">
                         <i class="fas fa-envelope fa-fw"></i>
                         <!-- Counter - Messages -->
                         <?php   
                            require 'db.config.php';
                            $query = "SELECT id FROM messages ORDER BY id";
                            $query_run = mysqli_query($connection,$query);
                            $row = mysqli_num_rows($query_run);
                            if($row == 0){
                                echo '<span class="badge badge-danger badge-counter"></span>';
                                    }else{
                                echo '<span class="badge badge-danger badge-counter">'.$row.'</span>';
                            }
                                             
                        ?>
                         <span class="badge badge-danger badge-counter"></span>
                     </a>

                 </li>

                 <div class="topbar-divider d-none d-sm-block"></div>


                 <!-- Nav Item - User Information -->
                 <li class="nav-item dropdown no-arrow">
                     <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                         aria-haspopup="true" aria-expanded="false">
                         <?php echo '<span style="color:grey; font-weight:600" class=" d-none d-lg-inline  small">Admin '.$_SESSION['auth_user']['first_name'].' </span>';?>
                         <?php echo'<img style="width:100%; padding:2px;"  class="img-profile rounded-circle ml-2 border border-primary"  src="upload/'.$_SESSION['auth_user']["Admin_img"].'" alt="image"/>' ?>
                     </a>
                     <!-- Dropdown - User Information -->
                     <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                         aria-labelledby="userDropdown">
                         <a class="dropdown-item" href="../index.php">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Website
                         </a>
                         <div class="dropdown-divider"></div>
                         <a class="dropdown-item" href="logout.php">
                             <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                             Logout
                         </a>
                     </div>
                 </li>
                 <div class="topbar-divider d-none d-sm-block"></div>
             </ul>
         </nav>
