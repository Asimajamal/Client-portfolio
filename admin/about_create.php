<?php
session_start();
include "incs/authen.php";
?>
<?php include "incs/header.php";
?>
<?php include "incs/sidebar.php";
?>

<!-- form start here -->

<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Add About Info</h2>

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
            if (isset($_SESSION['error_msg'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['error_msg']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['error_msg']);
            ?>

            <div class="row">


                <div class="col-md-12">
                    <form action="about_create_act.php" method="post" class="form-section "
                        enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="3000">
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">About Description</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="write about yourself"
                                    name="about_desc">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Email</label>
                            </div>
                            <div class="col-md-9">
                                <input type="email" class="form-control" id="title" placeholder="Enter Email"
                                    name="email" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Phone Number</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="phonenumber"
                                    data-inputmask="'mask': '9999-9999999'" name="pno" placeholder="Enter Phone Number"
                                    required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Degree</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter degree"
                                    name="degree" required>
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Tagline</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter Tagline"
                                    name="tagline" required>
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

    <script>
    //......................... phone number input................................
    $(document).ready(function() {
        $('#phonenumber').inputmask({
            mask: '9999-9999999', // Specify the desired format
            placeholder: '', // Use underscore () to represent optional characters
        });
    });
    </script>
    <?php include "incs/footer.php"; ?>