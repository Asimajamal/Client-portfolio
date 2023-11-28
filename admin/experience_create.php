<?php session_start(); include "incs/authen.php";
?>
<?php include "incs/header.php";
?>
<?php include "incs/sidebar.php";
?>

<!-- form start here -->

<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add Experience Info</h2>

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
            if (isset($_SESSION['error_exp_msg'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['error_exp_msg']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['error_exp_msg']);
            ?>

            <div class="row">


                <div class="col-md-12">
                    <form action="experience_create_act.php" method="post" class="form-section "
                        enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="3000">

                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Job Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter title"
                                    name="job_title" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Company Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter name"
                                    name="company_name" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter date" name="date"
                                    required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">mode</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter mode" name="mode"
                                    required>
                            </div>
                        </div>


                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="desc" class="form-label">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" class="form-control" rows="10"
                                    placeholder="Enter Description" required></textarea>
                                <p id="wordCount">0 words</p>



                            </div>
                        </div>

                        <div class="float-right mb-3">
                            <input type="submit" name="submit" value="Add about" class="btn btn-dark">
                        </div>

                    </form>
                </div>

            </div>
        </div>
        <!-- /.card-body end -->



        <!-- /.card-footer-->
        </section>

    </div>
    <!-- Table ends here  -->
    <!-- code for words count -->
    <script>
    // Get the textarea element
    var textarea = document.getElementById("description");

    // Get the paragraph elements to display word and character count
    var wordCount = document.getElementById("wordCount");

    // Set the maximum number of words and characters allowed
    var maxWords = 500;


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


    <?php include "incs/footer.php"; ?>