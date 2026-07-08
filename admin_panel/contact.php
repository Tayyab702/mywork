<?php $page = "contact"; ?>
<?php include "admin_auth.php"; ?>
<?php
include "header.php";
include "../conn.php";

$select = "SELECT * FROM contact_us ORDER BY id DESC";
$result = mysqli_query($conn, $select);
?>

<div class="container mt-5">

<div class="card shadow">

    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Contact Messages</h4>
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
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action</th>
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

                    <td><?php echo $row['name']; ?></td>

                    <td>
                        <a href="mailto:<?php echo $row['email']; ?>">
                            <?php echo $row['email']; ?>
                        </a>
                    </td>

                    <td><?php echo $row['phone']; ?></td>

                    <td><b><?php echo $row['subject']; ?></b></td>

                    <td>
                        <?php echo substr($row['message'], 0, 40); ?>...
                    </td>

                    <td>

                        <!-- View Button -->
                        <button class="btn btn-info btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#msg<?php echo $row['id']; ?>">
                            View
                        </button>

                    </td>

                </tr>

                <!-- Modal -->
                <div class="modal fade" id="msg<?php echo $row['id']; ?>" tabindex="-1">

                  <div class="modal-dialog">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h5 class="modal-title">Message Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>

                      <div class="modal-body text-start">

                        <p><b>Name:</b> <?php echo $row['name']; ?></p>
                        <p><b>Email:</b> <?php echo $row['email']; ?></p>
                        <p><b>Phone:</b> <?php echo $row['phone']; ?></p>
                        <p><b>Subject:</b> <?php echo $row['subject']; ?></p>

                        <hr>

                        <p><b>Message:</b><br>
                            <?php echo $row['message']; ?>
                        </p>

                      </div>

                    </div>
                  </div>

                </div>

                <?php } ?>

            <?php } else { ?>

                <tr>
                    <td colspan="7" class="text-danger py-4">
                        No Messages Found
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