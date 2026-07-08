<?php
session_start();
include "conn.php";

$pid = $_GET['pid'];


if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = [];
}

if(isset($_SESSION['cart'][$pid])){
    $_SESSION['cart'][$pid] += 1;
} else {
    // new product add
    $_SESSION['cart'][$pid] = 1;
}

// redirect back
header("Location: cart.php");
exit;
?>