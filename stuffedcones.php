<?php 
    $page='menu';  include_once 'header.php'

?>
<header>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/product.css?<?php echo time(); ?>" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</header>
<div class="container">
    <h1 class="text-center">Stuffed Cones</h1>
    <hr>
    <div class="row text-center py-3">

        <?php 
        require_once('component.php');
        require 'includes/dbh.inc.php';
        $query = "SELECT * FROM stuffed_product";
        $query_run = mysqli_query($conn,$query);
        while($row = mysqli_fetch_assoc($query_run)){
            component($row['id'],$row['title'],$row['price'], $row['product_image'],$row['modal_images']);
        }
        ?>
    </div>
    <hr>
    <br>

</div>


<?php 
  include_once 'footer.php'

?>
<?php 
  include_once 'footer.site.php'

?>
