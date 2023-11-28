<?php include "incs/database.php";
?>
<?php include "incs/authen.php";
?>
<?php include "incs/header.php" ?>
<?php include "incs/sidebar.php" ?>

<!-- Table start here -->

<div class="content-wrapper mt-5 pt-3">
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Projects List</h2>

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
            if (isset($_SESSION['data_project_submit'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['data_project_submit']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['data_project_submit']);
            ?>
            <?php
            if (isset($_SESSION['update_project_success'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['update_project_success']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['update_project_success']);
            ?>
            <?php
            if (isset($_SESSION['delete_project_success'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['delete_project_success']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['delete_project_success']);
            ?>

            <?php
            if (isset($_SESSION['delete_project_error'])) { ?>

                <div class="alert alert-info alert-dismissible " role="alert">
                    <?php echo $_SESSION['delete_project_error']; ?>
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>

            <?php

            }
            unset($_SESSION['delete_project_error']);
            ?>
            <div class="row">


                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sno</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Tagline</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Project Url</th>
                                    <th scope="col">SCode Url</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Filter</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                $sql = "SELECT * FROM portfolio";
                                $result = mysqli_query($con, $sql);
                                ?>

                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                                    <tr>
                                        <td> <?php echo $sn++ ?></td>
                                        <td><?php echo $row['title'] ?></td>
                                        <td>
                                            <?php
                                            $description = $row['tagline'];
                                            $wordLimit = 2; // Set  word limit 

                                            // Split the description into an array of words
                                            $words = explode(' ', $description);

                                            // Check if the description exceeds the word limit
                                            if (count($words) > $wordLimit) {
                                                // If it does, truncate it and add an ellipsis
                                                $shortDescription = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
                                                echo $shortDescription;
                                            } else {
                                                // If it doesn't exceed the limit, display the full description
                                                echo $description;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['category'] ?></td>
                                        <td><?php echo $row['author'] ?></td>
                                        <td style="max-width: 150px;"><?php echo $row['project_url'] ?></td>
                                        <td style="max-width: 150px;"><?php echo $row['scode'] ?></td>

                                        <td>
                                            <?php
                                            $description = $row['description'];
                                            $wordLimit = 2; // Set  word limit 

                                            // Split the description into an array of words
                                            $words = explode(' ', $description);

                                            // Check if the description exceeds the word limit
                                            if (count($words) > $wordLimit) {
                                                // If it does, truncate it and add an ellipsis
                                                $shortDescription = implode(' ', array_slice($words, 0, $wordLimit)) . '...';
                                                echo $shortDescription;
                                            } else {
                                                // If it doesn't exceed the limit, display the full description
                                                echo $description;
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo $row['filter'] ?></td>
                                        <td style="text-align: center; vertical-align: middle;">
                                            <?php $image_filenames = explode(',', $row['image']);
                                            foreach ($image_filenames as $image) { ?>
                                                <img src="uploads/<?php echo $image ?>" alt="" style="max-width: 50px; max-height: 30px; width: auto; height: auto; display: inline-block;">
                                            <?php  }   ?>
                                        </td>


                                        <td><span>
                                                <a href="portfolio_update.php?id=<?php echo $row['id'] ?>" class="btn btn-dark">Update</a>
                                                <a href="portfolio_delete.php?id=<?php echo $row['id'] ?>" class="btn btn-dark  my-2">Delete</a>
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