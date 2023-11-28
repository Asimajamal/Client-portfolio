<?php
include "incs/database.php";
$id = $_GET['id'];

$sql = "DELETE  FROM resume_bio WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_bio_success'] = "Record is successfully Deleted";
    header("Location: bio_list.php");
    die();
} else {
    $_SESSION['delete_bio_error'] = "Something went wrong";
    header("Location: bio_list.php");
    die();
}
