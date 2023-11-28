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
            <h2 class="card-title">Contact List</h2>

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



            <div class="row">


                <div class="col-md-12">


                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Sno</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                $sql = "SELECT * FROM contact";
                                $result = mysqli_query($con, $sql);
                                ?>
                                <?php while ($row = mysqli_fetch_array($result)) { ?>
                                <tr>


                                    <td><?php echo $sn++ ?></td>
                                    <td><?php echo $row['name'] ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td style="max-width: 200px;"><?php echo $row['subject'] ?></td>
                                    <td style="max-width: 200px;"><?php echo $row['message'] ?></td>


                                    <td><span>

                                            <a href="about_delete.php?id=<?php echo $row['id'] ?>"
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