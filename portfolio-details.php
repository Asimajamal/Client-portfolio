<?php include "database.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Portfolio Details - Personal Bootstrap Template</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: MyResume
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/free-html-bootstrap-template-my-resume/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <main id="main">

        <!-- ======= Portfolio Details ======= -->
        <div id="portfolio-details" class="portfolio-details">
            <div class="container">

                <div class="row">
                    <?php
          $projectId = isset($_GET['id']) ? $_GET['id'] : null;

          if ($projectId) {
            // Fetch details for a specific project
            $sql = "SELECT * FROM portfolio WHERE id=$projectId";
          } else {
            // Fetch all projects
            $sql = "SELECT * FROM portfolio";
          }

          $result = mysqli_query($con, $sql);

          while ($row = mysqli_fetch_assoc($result)) {
            $images = explode(',', $row['image']); // Split image paths into an array
          ?>

                    <div class="col-lg-8">

                        <div class="portfolio-details-slider swiper">
                            <div class="swiper-wrapper align-items-center">
                                <?php
                  foreach ($images as $image) {
                    if (!empty($image)) {
                      // Only generate a slide if the image path is not empty
                  ?>
                                <div class="swiper-slide">
                                    <img src="admin/uploads/<?php echo $image; ?>" alt=""
                                        style="width: 700px; height: 400px;">
                                </div>

                                <?php }
                  } ?>
                            </div>
                            <div class="swiper-pagination"></div>
                            <h2 class="portfolio-title"><?php echo $row['title'] ?></h2>
                            <p>


                                <?php echo $row['description'] ?>
                            </p>
                        </div>

                    </div>

                    <div class="col-lg-4 portfolio-info">
                        <h3>Project information</h3>
                        <ul>

                            <li><strong>Title</strong>: <?php echo $row['title'] ?></li>
                            <li><strong>Author: <?php echo $row['author'] ?></strong></li>


                            <?php
                if (!empty($row['scode'])) {
                  $githubProjectUrl = $row['scode']; // Replace with the GitHub or Behance project URl

                  // Display the link of live project if available
                  echo '<li><a href="' . $githubProjectUrl . '" target="_blank"><i class="bx bxs-show"></i><span class="visually-hidden">' . $githubProjectUrl . '</span> <span class="text-white">Source Code</span></a></li>';
                }
                ?>


                            <?php
                if (!empty($row['project_url'])) {
                  // Display the 'View' icon and hide the URL text
                  echo '<li> <a href="' . $row['project_url'] . '"><i class="bx bx-link-external"></i><span class="visually-hidden">' . $row['project_url'] . '</span><span class="text-white">  Project Live Preview</span></a></li>';
                }
                ?>
                            <li><strong>Category</strong>: <?php echo $row['category'] ?></li>
                        </ul>


                    </div>
                    <?php } ?>
                </div>

            </div>
        </div><!-- End Portfolio Details -->

    </main><!-- End #main -->


    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>