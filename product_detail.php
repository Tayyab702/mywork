<?php
include "header.php";
include "conn.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $query = "SELECT * FROM products WHERE pid='$id'";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_assoc($result);
}
?>

<div class="container py-5">
    <div class="row">

        <!-- Product Image -->
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <img src="./admin_panel/productsimages/<?php echo $row['pimage']; ?>" 
                     class="img-fluid p-3"
                     alt="<?php echo $row['pname']; ?>">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-md-6">

            <h2 class="fw-bold">
                <?php echo $row['pname']; ?>
            </h2>

            <h3 class="text-danger mt-3">
                Rs. <?php echo $row['pprice']; ?>
            </h3>

            <hr>

            <h5>Description</h5>

            <p class="text-muted" style="line-height:1.8;">
                <?php echo $row['pdesc']; ?>
            </p>

            <a href="cart_action.php?pid=<?php echo $row['pid']; ?>" 
               class="btn btn-primary btn-lg mt-3">
                Add To Cart
            </a>

        </div>

    </div>
</div>

<?php include "footer.php"; ?>