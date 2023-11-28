<?php
include "incs/database.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $degree_title = $_POST['degree_title'];
    $degree_date = $_POST['degree_date'];
    $institute = $_POST['institute'];
    $description = $_POST['description'];

    // Use prepared statements to prevent SQL injection
    $sql = "UPDATE resume_education SET degree_title=?, degree_date=?, institute=?, description=? WHERE id=?";

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        mysqli_stmt_bind_param($stmt, 'ssssi', $degree_title, $degree_date, $institute, $description, $id);
        $query = mysqli_stmt_execute($stmt);

        if ($query) {
            header("location: education_list.php");
            $_SESSION['update_education_success'] = "Updated Successfully";
        } else {
            header("location: education_list.php");
            $_SESSION['update_education_error'] = "Update Failed: " . mysqli_error($con);
        }

        mysqli_stmt_close($stmt);
    } else {
        header("location: education_list.php");
        $_SESSION['update_education_error'] = "Prepared statement error: " . mysqli_error($con);
    }
}
