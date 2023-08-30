<?php 
  $page = 'home'; 
  include_once 'header.php';


?>

<div class="container-fluid c1">

    <div class="container">
        <div class="row align-items-center align-content-center">
            <div class="col-md-8 content">
                <div class="home-text">
                    <?php 
          if(isset($_SESSION["user_name"])){
            echo "<h3>Hello " . $_SESSION["user_name"] .  "</h3>";
          }
        
        ?>
                    <h1>WE SERVE NO BAKE CHEESECAKE</h1>
                    <p>Cheese Lollipops, Stufsadasfed Waffle Cones & Much More!</p>
                    <button onclick="location.href='http://localhost/Project/cheesecake.php'" type="button"
                        class="btn btn-outline-secondary">
                        BUY NOW
                    </button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="home-img"><img src="assets/img.png" alt="" /></div>
            </div>
        </div>
    </div>

</div>
<hr>
<div>
    <br>
    <br>
    <br><br>
</div>

<?php 
  include_once 'footer.php'
  
?>
<?php 
  include_once 'footer.site.php'

?>
