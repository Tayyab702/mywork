  <?php include "admin_auth.php"; ?>
  <?php 
include "header.php";
include "../conn.php";
$pid = $_GET['Id'];
$delete = "DELETE FROM PRODUCTS WHERE pid = $pid";
$result = mysqli_query($conn,$delete);
 if($result)
   { 
      echo "<script>alert('Products has been deleted into database');
      window.location.href='showproducts.php'
      </script>";
   }
   else{
     echo "<script>alert('Products has been not deleted into database');
      window.location.href='products.php'
      </script>";
   }
?>



 <?php 
 include "footer.php"
 ?>