<?php
include "incs/database.php";

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $bio = $_POST['bio'];

    $sql = "UPDATE resume_bio SET   bio='$bio' WHERE id=$id";

    $query = mysqli_query($con, $sql);
    if ($query) {

        header("location:  bio_list.php");
        $_SESSION['update_bio_success'] = " Updated Successfully";
    } else {
        header("location:  bio_list.php");
        $_SESSION['updat_bio_error'] = " Updated Failed";
    }
}