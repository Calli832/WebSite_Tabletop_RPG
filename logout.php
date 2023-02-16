<?php 

session_start();
session_unset();
session_destroy();
header('location:/projeto/login.php');

?>