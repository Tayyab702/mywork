  <?php include "header.php";
 include "conn.php";
 $select = "select * from products inner join category on category.id = products.cid";
 $result=mysqli_query($conn,$select);
 ?>
 <!-- product section -->
      <section class="product_section layout_padding">
         <div class="container">
            <div class="heading_container heading_center">
               <h2>
                  Our <span>products</span>
               </h2>
            </div>
            <div class="row">

            <?php 
            while($row=mysqli_fetch_assoc($result))
            {?>
             <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                               <a href="product_detail.php?id=<?php echo $row['pid']; ?>" class="option1">
        View Details
    </a>
                           
                        
                         <a href="cart_action.php?pid=<?php echo $row['pid']; ?>" class="option2">
   Add to Cart
</a>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="./admin_panel/productsimages/<?php echo $row['pimage'] ?>" alt="">
                     </div>
                     <div class="detail-box">
                        <h5>
                            <?php echo $row['pname'] ?>
                        </h5>
                        <h6>
                           <?php echo $row['pprice'] ?>
                        </h6>
                     </div>
                  </div>
               </div>
         <?php   }
            ?>
               
              
            </div>
         </div>
      </section>
      <!-- end product section -->

       <?php include "footer.php"?>