<?php
session_start();
include "conn.php";
include "header.php";

if(empty($_SESSION['cart'])){
    die("Cart is empty");
}

$username = $_SESSION['username'];
$total = 0;
?>

<div class="container">
<h2>🧾 Your Bill</h2>

<h4>User: <?php echo $username; ?></h4>

<table border="1" cellpadding="10" width="100%">
<tr>
    <th>Product</th>
    <th>Image</th>
    <th>Price</th>
    <th>Qty</th>
    <th>Subtotal</th>
</tr>

<?php
foreach($_SESSION['cart'] as $pid => $qty){

    $query = "SELECT * FROM products WHERE pid=$pid";
    $result = mysqli_query($conn,$query);
    $product = mysqli_fetch_assoc($result);

    $subtotal = $product['pprice'] * $qty;
    $total += $subtotal;
?>

<tr>
    <td><?php echo $product['pname']; ?></td>

    <td>
        <img src="./admin_panel/productsimages/<?php echo $product['pimage']; ?>" width="60">
    </td>

    <td><?php echo $product['pprice']; ?></td>
    <td><?php echo $qty; ?></td>
    <td><?php echo $subtotal; ?></td>
</tr>

<?php } ?>

<tr>
    <td colspan="4"><b>Total</b></td>
    <td><b><?php echo $total; ?></b></td>
</tr>

</table>

<br>

<form action="place_order.php" method="post">
    <input type="hidden" name="total" value="<?php echo $total; ?>">

    <button type="submit">Place Order</button>
</form>

</div>

<?php include "footer.php"; ?>