<?php

include "incs/database.php";


if (isset($_POST['submit'])) {


    $tagline = $_POST['tagline'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];



    $sql = "INSERT INTO services (tagline,title,image,description) VALUES ('$tagline','$title','$image','$description')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['success_serv_msg'] = "Your data is submitted";
        header("Location: services_list.php");
        die();
    } else {
        $_SESSION['error_serv_msg'] = "Something went worng";
        header("Location: services_create.php");
    }
}
