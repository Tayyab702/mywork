<?php 
session_start();
include "header.php";
include "conn.php";

// ONLY 3 PRODUCTS
$select = "SELECT * 
           FROM products 
           INNER JOIN category ON category.id = products.cid
           LIMIT 3";

$result = mysqli_query($conn, $select);
?>

<!-- slider section -->
<section class="slider_section">
   <div class="slider_bg_box">
      <img src="images/slider-bg.jpg" alt="">
   </div>

   <div id="customCarousel1" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">

         <div class="carousel-item active">
            <div class="container">
               <div class="row">
                  <div class="col-md-7 col-lg-6">
                     <div class="detail-box">
                        <h1><span>Sale 20% Off</span><br>On Everything</h1>
                        <p>Best shopping experience with amazing discounts.</p>
                        <div class="btn-box">
                           <a href="product.php" class="btn1">Shop Now</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</section>

<!-- product section -->
<section class="product_section layout_padding">
   <div class="container">

      <div class="heading_container heading_center">
         <h2>Our <span>products</span></h2>
      </div>
      <div id="search-result" class="mb-4"></div>

      <div class="row">

         <?php 
         while($row = mysqli_fetch_assoc($result)) { 
         ?>

         <div class="col-sm-6 col-md-4 col-lg-4">
            <div class="box">

               <div class="option_container">
                  <div class="options">

                                              <a href="product_detail.php?id=<?php echo $row['pid']; ?>" class="option1">
        View Details
    </a>
         
                     <a href="cart_action.php?pid=<?php echo $row['pid']; ?>" class="option2">
                        Add To Cart
                     </a>

                  </div>
               </div>

               <div class="img-box">
                  <img src="./admin_panel/productsimages/<?php echo $row['pimage']; ?>" alt="">
               </div>

               <div class="detail-box">
                  <h5><?php echo $row['pname']; ?></h5>
                  <h6><?php echo $row['pprice']; ?></h6>
               </div>

            </div>
         </div>

         <?php } ?>

      </div>

      <div class="btn-box">
         <a href="product.php">View All Products</a>
      </div>

   </div>
</section>

<!-- subscribe section -->
<section class="subscribe_section">
   <div class="container-fuild">
      <div class="box">
         <div class="row">
            <div class="col-md-6 offset-md-3">

               <div class="subscribe_form">
                  <h3>Subscribe To Get Discount Offers</h3>
                  <p>Get latest updates and offers.</p>

                  <form>
                     <input type="email" placeholder="Enter your email">
                     <button type="submit">Subscribe</button>
                  </form>
               </div>

            </div>
         </div>
      </div>
   </div>
</section>

<?php include "footer.php"; ?>