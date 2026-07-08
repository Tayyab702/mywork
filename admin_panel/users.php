<?php $page = "users"; ?>
<?php include "admin_auth.php"; ?>
<?php 
include "header.php";
include "../conn.php";

$select = "SELECT * FROM signup ORDER BY id DESC";
$result = mysqli_query($conn, $select);
?>

<div class="container mt-5">

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Users List</h4>
    </div>

    <div class="card-body p-0">

        <div class="table-responsive">

        <table class="table table-striped table-hover text-center align-middle mb-0">

            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                </tr>
            </thead>

            <tbody>

            <?php if(mysqli_num_rows($result) > 0){ ?>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                <tr>
                    <td>
                        <span class="badge bg-dark">
                            <?php echo $row['id']; ?>
                        </span>
                    </td>

                    <td><?php echo $row['uname']; ?></td>
                    <td><?php echo $row['uemail']; ?></td>
                    <td><?php echo $row['uphone']; ?></td>
                    <td><?php echo $row['uaddress']; ?></td>
                </tr>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="5" class="text-danger py-4">
                        No Users Found
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