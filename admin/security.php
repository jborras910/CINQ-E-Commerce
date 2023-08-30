<?php 

session_start();

require 'db.config.php';

if(!isset($_SESSION["Admin"])){
    header("location: ../index.php?alert=accessdenied");
}

?>
