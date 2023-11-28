<?php

include "incs/database.php";

if (isset($_POST['project_create'])) {

    $title = $_POST['title'];
    $tagline = $_POST['tagline'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $project_url = $_POST['project_url'];
    $scode = $_POST['scode'];
    $description = $_POST['description'];
    $image_filenames = [];
    $filter = $_POST['filter'];
    foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
        $image = $_FILES['image']['name'][$key];
        if ($_FILES['image']['size'][$key] > 0) {
            $check_extension = array('png', 'jpg', 'jpeg', 'svg');
            $check_path = pathinfo($image, PATHINFO_EXTENSION);
            $image = time() . '_' . $key . '.' . $check_path;
            if (!in_array($check_path, $check_extension)) {
                $_SESSION['img_extension_error_project'] = "File at index $key is not supported";
                header("location: projects_create.php");
                die();
            }
            if (!move_uploaded_file($tmp_name, 'uploads/' . $image)) {
                $_SESSION['path_error_project'] = "File at index $key could not be uploaded";
                header("location: portfolio_create.php");
                die();
            }
        }
        $image_multiple[] = $image;
    }
    $image_convert_str = implode(',', $image_multiple);
    $sql = "INSERT INTO portfolio(title,tagline,category,author,project_url,scode,description,image,filter) VALUES ('$title','$tagline','$category','$author','$project_url','$scode','$description','$image_convert_str','$filter')";
    $query = mysqli_query($con, $sql);
    if ($query) {
        $_SESSION['data_project_submit'] = "Your data is submitted";
        header("Location: portfolio_list.php");
        die();
    } else {
        $_SESSION['data_project_error'] = "Something went wrong";
        header("Location: portfolio_create.php");
    }
}
