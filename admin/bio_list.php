<?php
include "incs/database.php";


?>
<?php include "incs/authen.php";
?>
<?php include "incs/header.php" ?>
<?php include "incs/sidebar.php" ?>

<!-- Table start here -->


<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Bio List</h2>

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
            if (isset($_SESSION['success_bio_msg'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['success_bio_msg']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['success_bio_msg']);
            ?>
            <?php
            if (isset($_SESSION['update_bio_success'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['update_bio_success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['update_bio_success']);
            ?>
            <?php
            if (isset($_SESSION['delete_bio_success'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['delete_bio_success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['delete_bio_success']);
            ?>
            <?php
            if (isset($_SESSION['delete_bio_error'])) { ?>

            <div class="alert alert-info alert-dismissible " role="alert">
                <?php echo $_SESSION['delete_bio_error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['delete_bio_error']);
            ?>
            <div class="row">


                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sno</th>
                                    <th scope="col">Bio</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                $sql = "SELECT * FROM resume_bio";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>


                                    <td><?php echo $sn++ ?></td>

                                    <td><?php
                                            $bio = $row['bio'];
                                            $wordLimit = 5; // Set your desired word limit here

                                            // Split the description into an array of words
                                            $words = explode(' ', $bio);

                                            // Check if the description exceeds the word limit
                                            if (count($words) > $wordLimit) {
                                                // If it does, truncate it and add an ellipsis
                                                $shortDescription = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
                                                echo $shortDescription;
                                            } else {
                                                // If it doesn't exceed the limit, display the full description
                                                echo $bio;
                                            }
                                            ?></td>


                                    <td><span>
                                            <a href="bio_update.php?id=<?php echo $row['id'] ?>"
                                                class="btn btn-dark">Update</a>
                                            <a href="bio_delete.php?id=<?php echo $row['id'] ?>"
                                                class="btn btn-dark my-md-0 my-2">Delete</a>

                                        </span></td>

                                </tr>
                                <?php } ?>


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.card-body end -->
        <div class="card-footer">
            <?php include "incs/footer.php"; ?>
        </div>
        <!-- /.card-footer-->
        </section>
    </div>
    <!-- Table ends here  -->