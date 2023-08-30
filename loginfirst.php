<?php 

require 'includes/dbh.inc.php';
require 'includes/functions.inc.php';

if(!$_SESSION["useruid"]) {
    header("location: login.php?error=loginfirst");
}

?>
