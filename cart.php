<?php
session_start();

// ❌ LOGIN CHECK (IMPORTANT)
if(!isset($_SESSION['uemail'])){
    header("Location: login.php");
    exit;
}

include "conn.php";
include "header.php";

$username = $_SESSION['username'] ?? 'User';
$total = 0;
?>

<div class="container">
   
    <table border="1" cellpadding="10" width="100%">
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Subtotal</th>
        </tr>

        <?php
        if(!empty($_SESSION['cart'])){

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

        
   <td>
    <a href="cart_update.php?action=dec&pid=<?php echo $pid; ?>"
       style="padding:5px 10px;background:red;color:white;text-decoration:none;">
       -
    </a>

    <strong style="margin:0 10px;">
        <?php echo $qty; ?>
    </strong>

    <a href="cart_update.php?action=inc&pid=<?php echo $pid; ?>"
       style="padding:5px 10px;background:green;color:white;text-decoration:none;">
       +
    </a>
        <!-- 🗑 DELETE BUTTON -->
    <a href="cart_update.php?action=del&pid=<?php echo $pid; ?>"
      
       style="margin-left:10px;color:red;font-size:18px;text-decoration:none;">
       <i class="fa-solid fa-trash fa-xl" style="color: rgb(225, 19, 19);"></i>
    </a>

</td>

            <td><?php echo $subtotal; ?></td>
        </tr>

        <?php
            }
        } else {
        ?>

        <tr>
            <td colspan="5">🛒 Cart is empty</td>
        </tr>

        <?php } ?>

        <tr>
            <td colspan="4"><b>Total Bill</b></td>
            <td><b><?php echo $total; ?></b></td>
        </tr>

    </table>

    <br>

    <!-- Place Order -->
<?php if(!empty($_SESSION['cart'])){ ?>
<form action="place_order.php" method="post"
      onsubmit="return confirm('Are you sure you want to place this order?');">

    <input type="hidden" name="total" value="<?php echo $total; ?>">

    <button type="submit"
            style="padding:10px 20px; background:green; color:white;">
        Place Order
    </button>

</form>
<?php } ?>

</div>

<?php include "footer.php"; ?>