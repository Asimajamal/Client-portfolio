<?php include "incs/database.php";
?>
<?php include "incs/header.php"; ?>
<?php include "incs/sidebar.php";
?>

<!-- form start here -->
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM portfolio WHERE id='$id'";
$query = mysqli_query($con, $sql);
$r = mysqli_fetch_assoc($query);
?>




<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Update Projects</h2>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">

            <?php
            if (isset($_SESSION['update_project_error'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['update_project_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['update_project_error']);
            ?>
            <?php
            if (isset($_SESSION['update_img_extension_error_project'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['update_img_extension_error_project']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['update_img_extension_error_project']);
            ?>
            <?php
            if (isset($_SESSION['update_path_error_project'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['update_path_error_project']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['update_path_error_project']);
            ?>
            <div class="row ">


                <div class="col-md-12">
                    <form class="form-section " method="post" action="portfolio_update_act.php" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="3000">

                        <div class="row  mb-3">
                            <input type="hidden" name="id" id="id" value="<?php echo $r['id']; ?>">

                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Tagline</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Tagline" name="tagline" value="<?php echo $r['tagline'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" value="<?php echo $r['title'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Author</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter author name" name="author" value="<?php echo $r['author'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Category</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter category" name="category" value="<?php echo $r['category'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Live Project Url</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="title" placeholder="Enter url" pattern="https://.*" name="project_url" value="<?php echo $r['project_url'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Source Code Url</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="title" placeholder="Enter url" pattern="https://.*" name="scode" value="<?php echo $r['scode'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Filter</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter filter" name="filter" value="<?php echo $r['filter'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="desc" class="form-label">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Enter Description"><?php echo $r['description'] ?></textarea>
                                <p id="wordCount" class="float-right"></p>

                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="image" class="form-label">Image</label>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="image[]" id=" image" class="form-control" multiple>
                                <input type="hidden" name="old_image" id="image" value="<?php echo $r['image']; ?>">
                            </div>
                            <div class="col-md-3">
                                <?php $image_filenames = explode(',', $r['image']);
                                foreach ($image_filenames as $image) { ?>
                                    <img src="uploads/<?php echo $image ?>" alt="" style="max-width: 100px;max-height:30px">
                                <?php  }   ?>
                            </div>
                        </div>

                        <div class="float-right mb-3">
                            <input type="submit" name="update" value="Update" class="btn btn-dark">
                        </div>

                    </form>
                </div>

            </div>

        </div>
        <!-- /.card-body end -->
        <div class="card-footer">
            <?php include "incs/footer.php"; ?>
        </div>
        <!-- /.card-footer-->

    </div>
    <!-- Table ends here  -->

    <!-- code for words count -->

    <script>
        // Get the textarea element
        var textarea = document.getElementById("description");

        // Get the paragraph elements to display word and character count
        var wordCount = document.getElementById("wordCount");

        // Set the maximum number of words and characters allowed
        var maxWords = 80;


        // Add an input event listener to the textarea
        textarea.addEventListener("input", function() {
            // Split the text by spaces to count words
            var words = textarea.value.trim().split(/\s+/);

            // Update the word count
            var numWords = words.length;
            wordCount.textContent = numWords + " " + (numWords === 1 ? "word" :
                "words");

            // Check and limit the number of words
            if (numWords > maxWords) {
                // Trim the text to the allowed word limit
                textarea.value = words.slice(0, maxWords).join(" ");
                wordCount.textContent = maxWords + " words (maximum)";
            }


        });
    </script>