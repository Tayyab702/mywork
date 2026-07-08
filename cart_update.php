<?php
session_start();

$pid = $_GET['pid'];
$action = $_GET['action'];

if(isset($_SESSION['cart'][$pid])){

    if($action == "inc"){
        $_SESSION['cart'][$pid] += 1;
    }

    if($action == "dec"){
        $_SESSION['cart'][$pid] -= 1;

        if($_SESSION['cart'][$pid] <= 0){
            unset($_SESSION['cart'][$pid]);
        }
    }
     // 🗑 delete product
    if($action == "del"){
        unset($_SESSION['cart'][$pid]);
    }
}

header("Location: cart.php");
exit;
?>