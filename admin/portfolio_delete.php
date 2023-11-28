<?php

include "incs/database.php";

$id = $_GET['id'];

$sql = "DELETE  FROM portfolio WHERE id=$id";
$query = mysqli_query($con, $sql);
if ($query) {
    $_SESSION['delete_project_success'] = "record is successfully Deleted";
    header("Location: portfolio_list.php");
    die();
} else {
    $_SESSION['delete_project_error'] = "Something went worng";
    header("Location: portfolio_list.php");
    die();
}
