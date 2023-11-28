<?php
include "incs/database.php";
?>
<?php include "incs/authen.php";
?>
<?php include "incs/header.php" ?>
<?php include "incs/sidebar.php" ?>

<!-- form start here -->


<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add Projects</h2>

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
            if (isset($_SESSION['data_project_error'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['data_project_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['data_project_error']);
            ?>
            <?php
            if (isset($_SESSION['path_error_project'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['path_error_project']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['path_error_project']);
            ?>
            <?php
            if (isset($_SESSION['img_extension_error_project'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['img_extension_error_project']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['img_extension_error_project']);
            ?>

            <div class="row">


                <div class="col-md-12">
                    <form class="form-section " method="post" action="portfolio_create_act.php" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="3000">



                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Tagline</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Tagline" name="tagline" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Category</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter category" name="category" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Author</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter author" name="author" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Project Url</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="title" placeholder="Enter url" pattern="https://.*" name="project_url">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Source Code Url</label>
                            </div>
                            <div class="col-md-9">
                                <input type="url" class="form-control" id="title" placeholder="Enter url" pattern="https://.*" name="scode">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Filter</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter filter" name="filter" required>
                            </div>
                        </div>

                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="desc" class="form-label">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Enter Description" required></textarea>
                                <p id="wordCount">0 words</p>

                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="image" class="form-label">Image</label>
                            </div>
                            <div class="col-md-9">
                                <input type="file" name="image[]" id="image" class="form-control" multiple required>
                            </div>
                        </div>

                        <div class="float-right mb-3">
                            <input type="submit" name="project_create" value="Add Project" class="btn btn-dark">
                        </div>

                    </form>
                </div>


            </div>
            <!-- /.card-body end -->
            <div class="card-footer">
                <?php include "incs/footer.php"; ?>
            </div>
            <!-- /.card-footer-->

        </div>
        <!-- Table ends here  -->


        <!-- form ends here end -->
        <?php include "incs/footer.php" ?>

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