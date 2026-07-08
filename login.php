<?php
ob_start();
session_start();
include "conn.php";
include "header.php";
?>

<div class="container">
    <h1>Login</h1>

    <form method="post">
        <input type="email" name="uemail" class="form-control mb-2" placeholder="Email" required>
        <input type="password" name="upass" class="form-control mb-2" placeholder="Password" required>
        <input type="submit" name="btn_login" class="btn btn-dark" value="Login">
    </form>
</div>

<?php
if(isset($_POST['btn_login']))
{
    $uemail = $_POST['uemail'];
    $upass = $_POST['upass'];

    // ADMIN LOGIN
    if($uemail == 'admin@gmail.com' && $upass == '1234')
    {
        $_SESSION['admin'] = $uemail;
        header("Location: admin_panel/index.php");
        exit();
    }

    // USER LOGIN
    $result = mysqli_query($conn,"SELECT * FROM signup WHERE uemail='$uemail'");

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);

        if(password_verify($upass, $row['upass']))
        {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['uemail'] = $row['uemail'];

            header("Location: profile.php");
            exit();
        }
        else
        {
            echo "<script>alert('Wrong Password');</script>";
        }
    }
    else
    {
    

    echo "<script>
        alert('Account not found! Please register first.');
        window.location='signup.php';
    </script>";
    exit();
       
    }
}
?>

<?php include "footer.php"; ?>