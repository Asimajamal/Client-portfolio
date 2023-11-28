<?php
include "incs/database.php";
$id = $_GET['id'];

$sql = "DELETE  FROM resume_experience WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_exp_success'] = "Record is successfully Deleted";
    header("Location: experience_list.php");
    die();
} else {
    $_SESSION['delete_exp_error'] = "Something went wrong";
    header("Location: experience_list.php");
    die();
}
