<?php
include "incs/database.php";


if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $tagline = $_POST['tagline'];
    $category = $_POST['category'];
    $author = $_POST['author'];
    $project_url = $_POST['project_url'];
    $scode = $_POST['scode'];
    $description = $_POST['description'];


    $image_filenames = [];
    $filter = $_POST['filter'];
    // Handle uploaded images
    foreach ($_FILES['image']['tmp_name'] as $key => $tmp_name) {
        $image = $_FILES['image']['name'][$key];
        if ($_FILES['image']['size'][$key] > 0) {
            $check_extension = array('png', 'jpg', 'jpeg', 'svg');
            $check_path = pathinfo($image, PATHINFO_EXTENSION);
            $image = time() . '_' . $key . '.' . $check_path;
            if (!in_array($check_path, $check_extension)) {
                $_SESSION['update_img_extension_error_project'] = "File at index $key is not supported";
                header("location: projects_update.php");
                die();
            }
            if (!move_uploaded_file($tmp_name, 'uploads/' . $image)) {
                $_SESSION['update_path_error_project'] = "File at index $key could not be uploaded";
                header("location: portfolio_update.php");
                die();
            }
            $image_filenames[] = $image;
        }
    }

    // Check if new images were uploaded and update project information accordingly
    if (!empty($image_filenames)) {
        // New images were uploaded, so we should replace the old images
        $image_convert_str = implode(',', $image_filenames);

        // First, retrieve the existing image paths associated with the project
        $sql = "SELECT image FROM portfolio WHERE id = $id";
        $result = mysqli_query($con, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $existing_images = explode(',', $row['image']);

            // Delete the old images from the server
            foreach ($existing_images as $old_image) {
                $old_image_path = 'uploads/' . $old_image;
                if (file_exists($old_image_path)) {
                    unlink($old_image_path);
                }
            }
        }

        // Update project information in the database with new images
        $sql = "UPDATE portfolio SET title=?, tagline=?, category=?,author=?, project_url=?,scode=?, image=?, description=?, filter=? WHERE id=?";
    } else {
        // No new images uploaded, keep the existing ones
        $sql = "UPDATE portfolio SET title=?,tagline=?, category=?, author=?, project_url=?, scode=?, description=?, filter=? WHERE id=?";
    }

    $stmt = mysqli_prepare($con, $sql);

    if ($stmt) {
        if (!empty($image_filenames)) {
            mysqli_stmt_bind_param($stmt, 'ssssssssi', $title, $tagline, $category, $author, $project_url, $scode, $image_convert_str, $description, $filter, $id);
        } else {
            mysqli_stmt_bind_param($stmt, 'ssssssssi', $title, $tagline, $category, $author, $project_url, $scode, $description, $filter, $id);
        }

        if (mysqli_stmt_execute($stmt)) {
            header("location: portfolio_list.php");
            $_SESSION['update_project_success'] = "Updated Successfully";
        } else {
            header("location: portfolio_list.php");
            $_SESSION['update_project_error'] = "Update Failed";
        }
        mysqli_stmt_close($stmt);
    } else {
        header("location: portfolio_list.php");
        $_SESSION['update_project_error'] = "Update Failed";
    }
}
