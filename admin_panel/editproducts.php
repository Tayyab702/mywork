
 <?php 
include "header.php";
include "../conn.php";
$pid = $_GET['Id'];
$select="SELECT * FROM products where pid = $pid";
$result = mysqli_query($conn,$select);
$row=mysqli_fetch_assoc($result);
?>

<form method="post" enctype="multipart/form-data">
    <h1>Edit Products Detail Here...</h1>
    <input type="text" class="form-control" value="<?php echo $row['pname'] ?>" name="pname">
    <input type="text" class="form-control" value="<?php echo $row['pdesc'] ?>" name="pdesc">
    <input type="text" class="form-control" value="<?php echo $row['pprice'] ?>" name="pprice">
    <input type="text" class="form-control" value="<?php echo $row['pqty'] ?>" name="pqty">
    <input type="file" class="form-control" name="pimage">
    <img src="productsimages/<?php echo $row['pimage']?>" height="200px" width="200px" alt="<?php echo $row['pimage']?>"><br>
    <input type="submit" class="btn btn-info" value="Update Products" name="btn_update">
</form>

<?php 
if(isset($_POST['btn_update']))
{
   $pname = $_POST['pname'];
   $pdesc = $_POST['pdesc'];
   $pprice = $_POST['pprice'];
   $pqty = $_POST['pqty'];
   $pimage = $_FILES['pimage'];
   $filename = $_FILES['pimage']['name'];
   $temp_name = $pimage['tmp_name'];
   move_uploaded_file($temp_name,"productsimages/$filename");

  if($filename==null)
  {
$update = "UPDATE `products` SET `pname`='$pname',`pdesc`='$pdesc',`pprice`='$pprice',`pqty`='$pqty' WHERE pid = $pid";
  }
  else{
    $update = "UPDATE `products` SET `pname`='$pname',`pdesc`='$pdesc',`pimage`='$filename',`pprice`='$pprice',`pqty`='$pqty' WHERE pid = $pid";
  }

  $result1=mysqli_query($conn,$update);
  if($result1)
  {
     echo "<script>alert('Products has been updated successfullyyy');
     window.location.href='showproducts.php';
     </script>";
  }
  else{
     echo "<script>alert('Products has been not updated ');
     window.location.href='showproducts.php';
     </script>";
  }


}


 include "footer.php"
 ?>
 