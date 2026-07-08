    <?php include "header.php";
    include "conn.php";
    ?>
   <!-- inner page section -->
      <section class="inner_page_head">
         <div class="container_fuild">
            <div class="row">
               <div class="col-md-12">
                  <div class="full">
                     <h3>Contact us</h3>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end inner page section -->
      <!-- why section -->
      <section class="why_section layout_padding">
         <div class="container">
         
            <div class="row">
               <div class="col-lg-8 offset-lg-2">
                  <div class="full">
                     <form method="post">
                        <fieldset>
                           <input type="text" placeholder="Enter your full name" name="name" required />
                           <input type="email" placeholder="Enter your email address" name="email" required />
                           <input type="number" placeholder="Enter your phone number" name="phone" required />
                           <input type="text" placeholder="Enter subject" name="subject" required />
                           <textarea placeholder="Enter your message" name="message" required></textarea>
                           <input type="submit" value="Submit" name="btn_con"/>
                        </fieldset>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end why section -->
     
       <?php
       
       if(isset($_POST['btn_con']))
       { 
           $na = $_POST['name'] ;
           $em = $_POST['email'] ;
           $ph = $_POST['phone'] ;
           $sub = $_POST['subject'] ;
           $mess = $_POST['message'] ;
           $insert = "INSERT INTO `contact_us`( `name`, `phone`, `email`, `subject`, `message`) VALUES 
           ('$na','$ph','$em','$sub','$mess')";
           $result = mysqli_query($conn,$insert);
           if($result)
           {
               echo "<script>alert('Data has been sent into database');</script>";
           }
           else{
              echo "<script>alert('Data has been not sent into database');</script>";
           }
       }
       
       
       include "footer.php"?>