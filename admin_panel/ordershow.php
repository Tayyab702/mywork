<?php $page = "ordershow"; ?>
<?php
include "header.php";
include "../conn.php";

$sql = "SELECT
        o.id AS order_id,
        o.created_at,
        s.uname,
        s.uemail,
        s.uphone,
        p.pname,
        p.pimage,
        oi.qty,
        oi.price
        FROM orders o
        JOIN signup s ON o.user_id = s.id
        JOIN order_items oi ON o.id = oi.order_id
        JOIN products p ON oi.pid = p.pid
        ORDER BY o.id DESC";

$order = mysqli_query($conn, $sql);
?>

<div class="container mt-5">

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">All Orders</h4>
    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

        <table class="table table-striped table-hover text-center align-middle mb-0">

            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Product Image</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>

            <?php if(mysqli_num_rows($order) > 0){ ?>

                <?php while($row = mysqli_fetch_assoc($order)){ ?>

                <tr>

                    <td>
                        <span class="badge bg-dark">
                            #<?php echo $row['order_id']; ?>
                        </span>
                    </td>

                    <td><?php echo $row['uname']; ?></td>
                    <td><?php echo $row['uemail']; ?></td>
                    <td><?php echo $row['uphone']; ?></td>

                    <td>
                        <img src="../admin_panel/productsimages/<?php echo $row['pimage']; ?>"
                             width="60" height="60"
                             class="rounded border">
                    </td>

                    <td><?php echo $row['pname']; ?></td>

                    <td>
                        <span class="badge bg-info text-dark">
                            <?php echo $row['qty']; ?>
                        </span>
                    </td>

                    <td>Rs <?php echo $row['price']; ?></td>

                    <td>
                        <b>Rs <?php echo $row['qty'] * $row['price']; ?></b>
                    </td>

                    <td>
                        <?php echo date("d M Y", strtotime($row['created_at'])); ?>
                    </td>

                </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="10" class="text-danger py-4">
                        No Orders Found
                    </td>
                </tr>

            <?php } ?>

            </tbody>

        </table>

        </div>

    </div>

</div>

</div>

<?php include "footer.php"; ?>