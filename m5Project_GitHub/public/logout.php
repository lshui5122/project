<?php
session_start();
session_destroy();
header("Location:/m5Project/public/login.php");
?>