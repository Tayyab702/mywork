<?php $page = "showcategory"; ?>
<?php include "admin_auth.php"; ?>
<?php
include "header.php";
include "../conn.php";

$select = "SELECT * FROM category";
$result = mysqli_query($conn, $select);
?>


<div class="container mt-5">

    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Category List</h3>
        </div>

        <div class="card-body">

            <table class="table table-bordered table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['cname']; ?></td>
                            <td><?php echo $row['cdesc']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>

        </div>
    </div>

</div>

<?php include "footer.php"; ?>