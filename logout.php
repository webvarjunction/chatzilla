<?php 
//Database Connection
include_once('connections/myconnect.php');

session_start();

session_unset();

session_destroy();

header('location:index.php');

?>