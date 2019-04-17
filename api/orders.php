<?php
session_start();
include '../dbconfig.php';
echo json_encode($_SESSION['cartItems']);

?>