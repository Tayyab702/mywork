<?php $page = "showproducts"; ?>
<?php include "admin_auth.php"; ?>
<?php
include "header.php";
include "../conn.php";

$select = "SELECT * FROM products
INNER JOIN category ON category.id = products.cid";
$result = mysqli_query($conn, $select);
?>

<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Products List</h3>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-bordered table-striped table-hover align-middle text-center">

                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Product Name</th>
                            <th>Description</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php while($row = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td><?php echo $row['pid']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['pname']; ?></td>
                            <td><?php echo $row['pdesc']; ?></td>
                            <td><?php echo $row['pqty']; ?></td>
                            <td>Rs. <?php echo $row['pprice']; ?></td>

                            <td>
                                <img src="productsimages/<?php echo $row['pimage']; ?>"
                                     width="80"
                                     height="80"
                                     class="rounded border"
                                     alt="Product Image">
                            </td>

                            <td>
                                <a href="editproducts.php?Id=<?php echo $row['pid']; ?>"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>
                            </td>

                            <td>
                                <a href="deleteproducts.php?Id=<?php echo $row['pid']; ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Are you sure you want to delete this product?')">
                                    Delete
                                </a>
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