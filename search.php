<?php
include "conn.php";

if (isset($_GET['search'])) {

    $search = mysqli_real_escape_string($conn, $_GET['search']);

    $sql = "SELECT * FROM products WHERE pname LIKE '%$search%' LIMIT 5";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            ?>

            <div class="search-item" style="display:flex; gap:10px; padding:5px; border-bottom:1px solid #eee; align-items:center;">

                <img src="./admin_panel/productsimages/<?php echo $row['pimage']; ?>"
                     width="40" height="40">

                <a href="product_detail.php?id=<?php echo $row['pid']; ?>"
                   style="text-decoration:none; color:#000;">
                    <?php echo $row['pname']; ?>
                </a>

            </div>

            <?php
        }

    } else {
        echo "<div class='search-item' style='padding:10px;'>No Product Found</div>";
    }
}
?>