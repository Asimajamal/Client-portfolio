<?php
include "incs/database.php";
$id = $_GET['id'];

$sql = "DELETE  FROM resume_education WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_edu_success'] = "Record is successfully Deleted";
    header("Location: education_list.php");
    die();
} else {
    $_SESSION['delete_edu_error'] = "Something went wrong";
    header("Location: education_list.php");
    die();
}
