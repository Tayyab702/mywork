      <?php
      $current_page = basename($_SERVER['PHP_SELF']);
      ?>
      <?php
      if(session_status() == PHP_SESSION_NONE){
         session_start();
      }

      if(isset($_POST['logout'])){
         session_unset();
         session_destroy();
         header("Location: login.php");
         exit();
      }

      ?><!DOCTYPE html>
      <html>
         <head>
            <!-- Basic -->
            <meta charset="utf-8" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge" />
            <!-- Mobile Metas -->
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <!-- Site Metas -->
            <meta name="keywords" content="" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <link rel="shortcut icon" href="images/favicon.png" type="">
            <title>Ecomerce</title>
            <!-- bootstrap core css -->
         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
            <!-- font awesome style -->
            <link href="css/font-awesome.min.css" rel="stylesheet" />
            <!-- Custom styles for this template -->
            <link href="css/style.css" rel="stylesheet" />
            <!-- responsive style -->
            <link href="css/responsive.css" rel="stylesheet" />
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
         </head>
         <body>
            <div class="hero_area">
               <!-- header section strats -->
               <header class="header_section">
                  <div class="container">
                     <nav class="navbar navbar-expand-lg custom_nav-container ">
                     <a class="navbar-brand" href="index.php"><img width="250" src="images/logo.png" alt="#" /></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                           <ul class="navbar-nav">
                              <li class="nav-item <?php if($current_page == 'index.php') echo 'active'; ?>">
         <a class="nav-link" href="index.php">Home</a>
      </li>
                           <li class="nav-item <?php if($current_page == 'product.php') echo 'active'; ?>">
         <a class="nav-link" href="product.php">Products</a>
      </li>
                              <li class="nav-item <?php if($current_page == 'contact.php') echo 'active'; ?>">
         <a class="nav-link" href="contact.php">Contact</a>
      </li>
                                 <?php
      if(isset($_SESSION['uemail']))
      {
      ?>
         <li class="nav-item">
            <a class="nav-link">
               <?php echo $_SESSION['uemail']; ?>
            </a>
         </li>

         
            <li class="nav-item">
            <a class="nav-link" href="profile.php"><i class="fa-solid fa-user-tie" style="color: rgb(225, 19, 19);"></i></a>
         </li>
      <?php
      }
      else
      {
      ?>
         <li class="nav-item">
            <a class="nav-link" href="signup.php">Signup</a>
         </li>

         <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
         </li>
      <?php
      }
      ?>
                        <li class="nav-item">
      <?php if(isset($_SESSION['uemail'])) { ?>
         <a class="nav-link" href="cart.php">
      <?php } else { ?>
         <a class="nav-link" href="#" onclick="alert('Please login first!'); window.location='login.php'; return false;">
      <?php } ?>
                                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;" xml:space="preserve">
                                       <g>
                                          <g>
                                             <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                                                c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                          </g>
                                       </g>
                                       <g>
                                          <g>
                                             <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                                                C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                                                c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                                                C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                          </g>
                                       </g>
                                       <g>
                                          <g>
                                             <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                                                c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                          </g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                       <g>
                                       </g>
                                    </svg>
         
                                 </a>
      


<li class="nav-item ms-3 d-flex align-items-center position-relative">

    <!-- SEARCH ICON -->
    <i class="fa fa-search"
       id="search-icon"
       style="cursor:pointer; font-size:18px;"></i>

    <!-- SEARCH BOX -->
    <div id="search-box"
         style="display:none;
                position:absolute;
                top:35px;
                right:0;
                width:250px;
                z-index:9999;">

        <input type="text"
               id="search"
               class="form-control"
               placeholder="Search Products"
               autocomplete="off">

        <div id="search-result"
             style="background:#fff;
                    border:1px solid #ddd;
                    display:none;">
        </div>

    </div>

</li>
</ul>
                        </div>
                     </nav>
                  </div>
               </header>
               <!-- end header section -->
               <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

              <script>
document.addEventListener("DOMContentLoaded", function () {

    const search = document.getElementById("search");
    const result = document.getElementById("search-result");

    search.addEventListener("keyup", function () {

        let value = this.value.trim();

        if (value === "") {
            result.innerHTML = "";
            result.style.display = "none";
            return;
        }

        fetch("search.php?search=" + encodeURIComponent(value))
            .then(res => res.text())
            .then(data => {
                result.innerHTML = data;
                result.style.display = "block";
            });

    });

});
</script>
<script>
document.addEventListener("DOMContentLoaded", function () {

    const icon = document.getElementById("search-icon");
    const box = document.getElementById("search-box");
    const search = document.getElementById("search");
    const result = document.getElementById("search-result");

    // ICON CLICK → TOGGLE SEARCH BOX
    icon.addEventListener("click", function () {
        if (box.style.display === "none" || box.style.display === "") {
            box.style.display = "block";
            search.focus();
        } else {
            box.style.display = "none";
            result.style.display = "none";
        }
    });

    // SEARCH AJAX
    search.addEventListener("keyup", function () {

        let value = this.value.trim();

        if (value === "") {
            result.innerHTML = "";
            result.style.display = "none";
            return;
        }

        fetch("search.php?search=" + encodeURIComponent(value))
            .then(res => res.text())
            .then(data => {
                result.innerHTML = data;
                result.style.display = "block";
            });

    });

});
</script>