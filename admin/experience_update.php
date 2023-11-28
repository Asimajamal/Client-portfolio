<?php

include "incs/database.php"; ?>
<?php include "incs/header.php";

?>
<?php include "incs/sidebar.php";
?>

<!-- form start here -->
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM resume_experience WHERE id=$id";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query); ?>
<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Update Experience Info</h2>

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
            if (isset($_SESSION['update_exp_error'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['update_exp_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['update_exp_errror']);
            ?>




            <div class="row ">


                <div class="col-md-12">
                    <form class="form-section " method="post" action="experience_update_act.php" enctype="multipart/form-data" data-aos="fade-up" data-aos-duration="3000">

                        <div class="row  mb-3">
                            <input type="hidden" name="id" id="id" value="<?php echo $row['id']; ?>">


                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Job Title</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter title" name="job_title" value="<?php echo $row['job_title'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Company Name</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="title" placeholder="Enter name" name="company_name" value="<?php echo $row['company_name'] ?>">
                            </div>
                        </div>

                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="date" class="form-label">Date</label>
                            </div>
                            <div class="col-md-9">

                                <input type="text" class="form-control" id="date" name="date" value="<?php echo $row['date'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3 ">
                                <label for="title" class="form-label">Mode</label>
                            </div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" id="taglines" placeholder="Enter mode" name="mode" value="<?php echo $row['mode'] ?>">
                            </div>
                        </div>
                        <div class="row  mb-3">

                            <div class="col-md-3">
                                <label for="desc" class="form-label">Description</label>
                            </div>
                            <div class="col-md-9">
                                <textarea name="description" id="description" class="form-control" rows="10" placeholder="Enter Description"><?php echo $row['description'] ?></textarea>
                                <p id="wordCount"></p>

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