<?php 
    $page = 'contact';  
    include_once 'includes/dbh.inc.php';
    include_once 'header.php';
  

?>



<link rel="stylesheet" type="text/css" href="css/contact.css?<?php echo time(); ?>" />
<div class="container">
    <div class="row content-main">
        <div class="col-sm-7 content">

            <?php 
     
                $sql = "SELECT * FROM contactuspage";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
                echo "<h2>".$row['title']."<i class='fa fa-hand-o-right' aria-hidden='true'></i></h2>";
                echo "<hr />";
                echo "<h2>".$row['sub_title']."</h2>";
                echo "<p>".$row['descriptions']."<p>";
            ?>
        </div>
        <div class="col-sm-5">
            <div class="container">
                <form action="includes/contact.inc.php" method="POST">
                    <div class="title">
                        <h5>Get in touch</h5>
                    </div>
                    <div class="form-group">
                        <div class="input-container">
                            <i class="fa fa-user form-icon"></i>
                            <input type="text" name="first_name" placeholder="First name..." />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-container">
                            <i class="fa fa-user form-icon"></i>
                            <input type="text" name="last_name" placeholder="Last name..." />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-container">
                            <i class="fa fa-user form-icon"></i>
                            <input type="text" name="email" placeholder="Email.." />
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" rows="3" placeholder="Write your message here..."></textarea>
                    </div>
                    <button type="submit" name="contact_btn" class="btn btn-block">Submit</button>
                    <?php
                if(isset($_GET["error"])){
                  if($_GET["error"] == "firstnameerror"){
                    echo "<p class='  text-danger text-center'>First name Error</p>";
                  }
                  else if($_GET["error"] == "lastnameerror"){
                    echo "<p class='  text-danger text-center'>Last name Error</p>";
                  }
                  else if($_GET["error"] == "msgerror"){
                    echo "<p class=' text-danger text-center'>Messege Error</p>";
                  }
                  else if($_GET["error"] == "none"){
                    echo "<p class=' text-success text-center'>Message submitted</p>";
                  }
                }
                
                ?>
                </form>
            </div>
        </div>

    </div>
    <hr>

</div>


<?php 
  include_once 'footer.php'

?>
<?php 
  include_once 'footer.site.php'

?>
