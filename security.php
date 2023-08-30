<?php 

session_start();

require 'includes/dbh.inc.php';

if(!$_SESSION["userid"]){
    header("location: ../index.php?alert=accessdenied");
}

?>
