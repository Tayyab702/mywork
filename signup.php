<?php
include "header.php";
include "conn.php";
?>

<div class="container">
    <h1>Signup Form</h1>

    <form method="post">
        <input type="text" placeholder="Enter your User Name" class="form-control mb-2" name="uname" required>

        <input type="email" placeholder="Enter your User Email" class="form-control mb-2" name="uemail" required>

        <input type="text" placeholder="Enter your User Address" class="form-control mb-2" name="uaddress" required>

        <input type="text" placeholder="Enter your User Phone" class="form-control mb-2" name="uphone" required>

        <input type="password" placeholder="Enter your User Password" class="form-control mb-2" name="upass" required>

        <input type="submit" value="Signup" class="btn btn-dark" name="btn_sign">
    </form>
</div>

<?php

if (isset($_POST['btn_sign'])) {

    $uname = mysqli_real_escape_string($conn, $_POST['uname']);
    $uemail = mysqli_real_escape_string($conn, $_POST['uemail']);
    $uaddress = mysqli_real_escape_string($conn, $_POST['uaddress']);
    $uphone = mysqli_real_escape_string($conn, $_POST['uphone']);
    $upass = $_POST['upass'];

    // Check if email already exists
    $checkEmail = "SELECT * FROM signup WHERE uemail='$uemail'";
    $checkResult = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($checkResult) > 0) {

        echo "
        <script>
            alert('Email already exists! Please use another email.');
            window.location.href='signup.php';
        </script>
        ";

    } else {

        // Password Hash
        $hashPass = password_hash($upass, PASSWORD_DEFAULT);

        // Insert Query
        $insert = "INSERT INTO signup(uname, uemail, uaddress, uphone, upass)
                   VALUES('$uname', '$uemail', '$uaddress', '$uphone', '$hashPass')";

        $result = mysqli_query($conn, $insert);

        if ($result) {

            echo "
            <script>
                alert('Signup Successful');
                window.location.href='login.php';
            </script>
            ";

        } else {

            echo "
            <script>
                alert('Signup Failed');
                window.location.href='signup.php';
            </script>
            ";
        }
    }
}

include "footer.php";
?>