<?php $page = "category"; ?>
<?php include "admin_auth.php"; ?>

<?php 
include "header.php";
include "../conn.php";

?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow p-4">
                <h3 class="text-center mb-4">Add Category</h3>

                <form method="post">

                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text"
                               name="cname"
                               class="form-control"
                               placeholder="Enter Category Name"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category Description</label>
                        <textarea name="cdesc"
                                  class="form-control"
                                  rows="4"
                                  placeholder="Enter Category Description"
                                  required></textarea>
                    </div>

                    <div class="d-grid">
                        <input type="submit"
                               name="btn_cate"
                               value="Add Category"
                               class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php 

if(isset($_POST['btn_cate']))
{
    $cname = $_POST['cname'];
    $cdesc = $_POST['cdesc'];
    $insert = "INSERT INTO `category`( `cname`, `cdesc`) VALUES ('$cname','$cdesc')";
    $result = mysqli_query($conn,$insert);
    if($result)
    {
      echo "<script>alert('Category Addedd successs');
        window.location.href='showcategory.php';    
      </script>";
    }
    else{
        echo "<script>alert('Category not added into database');
           </script>";
    }
}


include "footer.php"
?>