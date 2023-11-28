<?php
include "database.php";
// $_SESSION['logged_in'] = false;
if (isset($_POST['submit'])) {

    $admin_email = $_POST['admin_email'];
    $password = $_POST['password'];

    $_SESSION['admin_email'] = $admin_email;

    $sql = "SELECT * FROM user_login WHERE admin_email='$admin_email' AND password='$password'";
    $query = mysqli_query($con, $sql);
    $result = mysqli_num_rows($query);
    if (!$admin_email) {
        $_SESSION['invalid_email'] = "Invalid email";
        header("Location : index.php#");
    }
    if ($result > 0) {
        $get_data = mysqli_fetch_assoc($query);

        $_SESSION['user_id'] = $get_data['id'];
        $_SESSION['logged_in'] = true;
        $_SESSION['login_success'] = "Logged In Successfully";
        header("Location: admin/dashboard.php");
    } else {

        $_SESSION['login_error'] = "Not found Your account";
        header("Location: index.php");
    }
}