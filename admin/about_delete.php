<?php
include "incs/database.php";
$id = $_GET['id'];

$sql = "DELETE  FROM about WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_success'] = "Record is successfully Deleted";
    header("Location: about_list.php");
    die();
} else {
    $_SESSION['delete_error'] = "Something went wrong";
    header("Location: about_list.php");
    die();
}
