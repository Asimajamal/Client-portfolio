<?php
include "incs/database.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $tagline = $_POST['tagline'];
    $title = $_POST['title'];
    $image = $_POST['image'];
    $description = $_POST['description'];

    $sql = "UPDATE services SET tagline='$tagline',  title='$title',image='$image',description='$description' WHERE id=$id";

    $query = mysqli_query($con, $sql);
    if ($query) {

        header("location:  services_list.php");
        $_SESSION['update_serv_success'] = " Updated Successfully";
    } else {
        header("location:  about_list.php");
        $_SESSION['updat_serv_error'] = " Updated Failed";
    }
}
