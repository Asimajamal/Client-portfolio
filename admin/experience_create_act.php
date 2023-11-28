<?php

include "incs/database.php";


if (isset($_POST['submit'])) {

    $job_title = $_POST['job_title'];
    $company_name = $_POST['company_name'];
    $mode = $_POST['mode'];
    $description = $_POST['description'];
    $date = $_POST['date'];



    $sql = "INSERT INTO resume_experience (job_title,company_name,mode,description,date) VALUES ('$job_title','$company_name','$mode','$description','$date')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['success_exp_msg'] = "Your data is submitted";
        header("Location: experience_list.php");
        die();
    } else {
        $_SESSION['error__exp_msg'] = "Something went wrong";
        header("Location: experience_create.php");
    }
}
