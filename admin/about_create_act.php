<?php

include "incs/database.php";


if (isset($_POST['submit'])) {
    $about_desc = $_POST['about_desc'];
    $email = $_POST['email'];
    $pno = $_POST['pno'];
    $tagline = $_POST['tagline'];
    $degree = $_POST['degree'];
    $description = $_POST['description'];



    $sql = "INSERT INTO about (about_desc,email,pno,tagline,degree,description) VALUES ('$about_desc','$email','$pno','$tagline','$degree','$description')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['success_msg'] = "Your data is submitted";
        header("Location: about_list.php");
        die();
    } else {
        $_SESSION['error_msg'] = "Something went worng";
        header("Location: about_create.php");
    }
}
