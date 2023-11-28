<?php
include "incs/database.php";
$id = $_GET['id'];

$sql = "DELETE  FROM services WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_serv_success'] = "Record is successfully Deleted";
    header("Location: services_list.php");
    die();
} else {
    $_SESSION['delete_serv_error'] = "Something went wrong";
    header("Location: services_list.php");
    die();
}
