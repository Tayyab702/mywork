<?php $page = "products"; ?>
<?php include "admin_auth.php"; ?>
<?php
include "header.php";
include "../conn.php";
$select = "select * from category";
$result = mysqli_query($conn,$select);
?>
<?php $page = "products"; ?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Add Product</h3>

                <form method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select class="form-select" name="cid" required>
                            <option value="">Select Category</option>

                            <?php
                            while($row = mysqli_fetch_assoc($result))
                            {
                            ?>
                                <option value="<?php echo $row['id']; ?>">
                                    <?php echo $row['cname']; ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Name</label>
                        <input type="text" name="pname" class="form-control" placeholder="Enter Product Name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="pdesc" class="form-control" rows="3" placeholder="Enter Product Description" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input type="number" name="pprice" class="form-control" placeholder="Enter Product Price" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Quantity</label>
                        <input type="number" name="pqty" class="form-control" placeholder="Enter Product Quantity" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Product Image</label>
                        <input type="file" name="pimage" class="form-control" required>
                    </div>

                    <div class="d-grid">
                        <input type="submit" name="btn_product" value="Add Product" class="btn btn-primary">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>


<?php
if(isset($_POST['btn_product']))
{
   $pname = $_POST['pname'];
   $cid = $_POST['cid'];
   $pdesc = $_POST['pdesc'];
   $pprice = $_POST['pprice'];
   $pqty = $_POST['pqty'];
   $pimage = $_FILES['pimage'];
   $filename = $_FILES['pimage']['name'];
   $temp_name = $pimage['tmp_name'];
   move_uploaded_file($temp_name,"productsimages/$filename");
   $insert = "INSERT INTO `products`( `pname`, `pdesc`, `pimage`, `pprice`, `pqty`, `cid`) VALUES ('$pname','$pdesc','$filename','$pprice','$pqty','$cid')";
   $result = mysqli_query($conn,$insert);
   if($result)
   { 
      echo "<script>alert('Products has been added into database');
      window.location.href='showproducts.php'
      </script>";
   }
   else{
     echo "<script>alert('Products has been not added into database');
      </script>";
   }
}



include "footer.php";
?>