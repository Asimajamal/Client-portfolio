<?php

include "incs/database.php";


if (isset($_POST['submit'])) {

    $degree_title = $_POST['degree_title'];
    $degree_date = $_POST['degree_date'];
    $institute = $_POST['institute'];
    $description = $_POST['description'];



    $sql = "INSERT INTO resume_education (degree_title,degree_date,institute,description) VALUES ('$degree_title','$degree_date','$institute','$description')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['success_education_msg'] = "Your data is submitted";
        header("Location: education_list.php");
        die();
    } else {
        $_SESSION['error__education_msg'] = "Something went wrong";
        header("Location: education_create.php");
    }
}
