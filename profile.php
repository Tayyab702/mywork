<?php
ob_start();
session_start();

if(!isset($_SESSION['user_id']))
{
    header("Location: login.php");
    exit();
}

include "conn.php";
include "header.php";

$user_id = $_SESSION['user_id'];

/* ================= PASSWORD CHANGE HANDLER ================= */
if(isset($_POST['change_pass'])){

    $oldpass = $_POST['oldpass'];
    $newpass = $_POST['newpass'];

    $query = mysqli_query($conn, "SELECT upass FROM signup WHERE id='$user_id'");
    $row = mysqli_fetch_assoc($query);

    if(!password_verify($oldpass, $row['upass'])){
        echo "<script>alert('Old password is incorrect');</script>";
    }
    else {

        $newHash = password_hash($newpass, PASSWORD_DEFAULT);

        $update = mysqli_query($conn, "
            UPDATE signup 
            SET upass='$newHash' 
            WHERE id='$user_id'
        ");

        if($update){
            echo "<script>alert('Password updated successfully');</script>";
        } else {
            echo "<script>alert('Failed to update password');</script>";
        }
    }
}

/* ================= USER INFO ================= */
$user_query = mysqli_query($conn,"SELECT * FROM signup WHERE id='$user_id'");
$user = mysqli_fetch_assoc($user_query);
?>

<div class="container mt-4">

<!-- ================= PROFILE CARD ================= -->
<div class="card p-3 shadow">
    <h2>My Profile</h2>

    <p><b>Name:</b> <?php echo $user['uname']; ?></p>
    <p><b>Email:</b> <?php echo $user['uemail']; ?></p>
    <p><b>Phone:</b> <?php echo $user['uphone']; ?></p>

    <button class="btn btn-warning mt-2"
        data-bs-toggle="modal"
        data-bs-target="#passModal">
        Change Password
    </button>
</div>

<!-- ================= ORDERS ================= -->
<div class="card p-3 mt-4 shadow">

<h3>My Orders</h3>

<?php
$sql = "SELECT 
        o.id AS order_id,
        o.created_at,
        oi.qty,
        oi.price,
        p.pname,
        p.pimage
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN products p ON oi.pid = p.pid
        WHERE o.user_id='$user_id'
        ORDER BY o.id DESC";

$order = mysqli_query($conn,$sql);

if(!$order){
    die("SQL ERROR: " . mysqli_error($conn));
}
?>

<?php if(mysqli_num_rows($order) > 0) { ?>

<table class="table table-bordered table-hover">

<tr>
    <th>Image</th>
    <th>Product</th>
    <th>Qty</th>
    <th>Price</th>
    <th>Total</th>
    <th>Date</th>
</tr>

<?php while($row = mysqli_fetch_assoc($order)) { ?>

<tr>

    <td>
      <img src="./admin_panel/productsimages/<?php echo $row['pimage']; ?>"
     width="60"
     height="60"
     style="object-fit:cover;border-radius:8px;">
    </td>

    <td><?php echo $row['pname']; ?></td>

    <td><?php echo $row['qty']; ?></td>

    <td>Rs <?php echo $row['price']; ?></td>

    <td>Rs <?php echo $row['qty'] * $row['price']; ?></td>

    <td><?php echo $row['created_at']; ?></td>

</tr>

<?php } ?>

</table>

<?php } else { ?>

<div class="alert alert-info">
    No orders found 😔
</div>

<?php } ?>

</div>

</div>

<!-- ================= PASSWORD MODAL ================= -->
<div class="modal fade" id="passModal" tabindex="-1">

  <div class="modal-dialog">

    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Change Password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">

        <form method="post">

            <input type="password" name="oldpass"
                class="form-control mb-2"
                placeholder="Current Password" required>

            <input type="password" name="newpass"
                class="form-control mb-2"
                placeholder="New Password" required>

            <button type="submit"
                name="change_pass"
                class="btn btn-success w-100">
                Update Password
            </button>

        </form>

      </div>

    </div>

  </div>

</div>
<div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">

    <form method="post">
        <button type="submit" name="logout" class="btn btn-danger btn-lg px-5 py-3">
            Logout
        </button>
    </form>


</div>

<?php include "footer.php"; ?>