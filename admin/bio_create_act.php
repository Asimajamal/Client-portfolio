<?php

include "incs/database.php";


if (isset($_POST['submit'])) {


    $bio = $_POST['bio'];



    $sql = "INSERT INTO resume_bio (bio) VALUES ('$bio')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['success_bio_msg'] = "Your data is submitted";
        header("Location: bio_list.php");
        die();
    } else {
        $_SESSION['error_bio_msg'] = "Something went wrong";
        header("Location: bio_create.php");
    }
}
