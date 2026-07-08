<?php
session_start();
include "conn.php";

if(!isset($_SESSION['user_id'])){
    die("Login required");
}

if(empty($_SESSION['cart'])){
    die("Cart empty");
}

$user_id = $_SESSION['user_id'];
$total = $_POST['total'];

// 1. Insert main order
mysqli_query($conn,
"INSERT INTO orders(user_id,total_amount)
VALUES('$user_id','$total')");

$order_id = mysqli_insert_id($conn);

// 2. Insert order items
foreach($_SESSION['cart'] as $pid => $qty)
{
    $pid = (int)$pid;

    $res = mysqli_query($conn,
    "SELECT * FROM products WHERE pid='$pid'");

    $product = mysqli_fetch_assoc($res);

    if(!$product) continue;

    $price = $product['pprice'];

    mysqli_query($conn,
    "INSERT INTO order_items(order_id,pid,qty,price)
    VALUES('$order_id','$pid','$qty','$price')");
}

// 3. Clear cart
unset($_SESSION['cart']);

echo "<script>
alert('Order Placed Successfully');
window.location.href='profile.php';
</script>";
?>