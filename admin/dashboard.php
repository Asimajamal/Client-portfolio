<?php include "incs/database.php";
include "incs/authen.php";
include "incs/header.php";
?>
<?php
include "incs/sidebar.php";
?>

<!-- dashboar content -->

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <?php
            if (isset($_SESSION['login_success'])) { ?>

            <div class="alert alert-success alert-dismissible " role="alert">
                <?php echo $_SESSION['login_success']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            </div>

            <?php

            }
            unset($_SESSION['login_success']);
            ?>


            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php
                    $serv = "SELECT * FROM services";
                    $result = mysqli_query($con, $serv);
                    $total_serv = mysqli_num_rows($result);
                    ?>
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $total_serv ?></h3>

                            <p>Total Services</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="services_list.php" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <?php
                    $project = "SELECT * FROM portfolio";
                    $result = mysqli_query($con, $project);
                    $total_projects = mysqli_num_rows($result);
                    ?>
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $total_projects ?></h3>

                            <p>Total Projects</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="portfolio_list.php" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->



                <div class="col-lg-3 col-6">
                    <!-- small box -->

                    <?php $contacts = "SELECT * FROM contact";
                    $result = mysqli_query($con, $contacts);
                    $total_contacts = mysqli_num_rows($result);
                    ?>
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $total_contacts ?></h3>

                            <p>Total Users Contacts</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="contact_list.php" class="small-box-footer">View All <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>






            </div>
            <!-- /.row -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<?php
include "incs/footer.php"; ?>