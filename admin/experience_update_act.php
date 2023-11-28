<?php
include "incs/database.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $mode = $_POST['mode'];
    $description = $_POST['description'];
    $date = $_POST['date'];

    $sql = "UPDATE resume_experience SET   job_title='$job_title', company_name='$company_name',mode='$mode',description='$description',date='$date' WHERE id=$id";

    $query = mysqli_query($con, $sql);
    if ($query) {

        header("location:  experience_list.php");
        $_SESSION['update_exp_success'] = " Updated Successfully";
    } else {
        header("location:  experience_list.php");
        $_SESSION['update_exp_error'] = " Updated Failed";
    }
}
