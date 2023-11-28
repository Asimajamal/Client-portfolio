<?php
include "incs/database.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $about_desc = $_POST['about_desc'];
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $tagline = $_POST['tagline'];
    $degree = $_POST['degree'];
    $description = $_POST['description'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE about SET about_desc=?,email=?, pno=?, tagline=?,degree=?, description=? WHERE id=?";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssssi', $about_desc, $email, $pno, $tagline, $degree, $description, $id);
        $query = mysqli_stmt_execute($stmt);

        if ($query) {
            header("location:  about_list.php");
            $_SESSION['update_success'] = "Updated Successfully";
        } else {
            header("location:  about_list.php");
            $_SESSION['update_error'] = "Update Failed";
        }

        mysqli_stmt_close($stmt);
    } else {
        // Handle the case where the prepared statement fails
        header("location:  about_list.php");
        $_SESSION['update_error'] = "Update Failed";
    }
}
