<?php include "database.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Majid Khan - Data Scientist</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/bd03566d29.js" crossorigin="anonymous"></script>

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
    <!-- Modal for admin login -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Admin Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body modal-text">
                    <form action="login_act.php" method="post">
                        <div class="mb-3 t">
                            <label for="email" class="form-label text-dark">Email address</label>
                            <input type="email" class="form-control" name="admin_email" id="emali" placeholder="name@example.com">
                            <?php
                            if (isset($_SESSION['invalid_email'])) {

                                echo '<small class="text-danger">' . $_SESSION['invalid_email'] . '</small>'
                            ?>
                            <?php

                            }
                            unset($_SESSION['invalid_email']);
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="password text-dark" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                        <div class="modal-footer">
                            <a href="" class="me-auto ">Forgot Password</a>


                            <button type="submit" name="submit" class="btn btn-dark">Login</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ======= Mobile nav toggle button ======= -->
    <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
    <i class="bi bi-list mobile-nav-toggle d-lg-none"></i>
    <!-- ======= Header ======= -->
    <header id="header" class="d-flex flex-column justify-content-center">

        <nav id="navbar" class="navbar nav-menu">
            <ul>
                <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a>
                </li>
                <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>
                <li><a href="#resume" class="nav-link scrollto"><i class="bx bx-file-blank"></i> <span>Resume</span></a>
                </li>
                <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i>
                        <span>Portfolio</span></a>
                </li>
                <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a>
                </li>
                <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a>
                </li>
                <?php if (isset($_SESSION['logged_in']) == true) { ?>
                    <li class="nav-item">
                        <a class="nav-link scrollto" href="admin/dashboard.php"><i class="bi bi-speedometer2"></i><span>Dashboard</span></a>
                    </li>
                <?php } else {
                } ?>
                <li class="nav-item">
                    <?php if (isset($_SESSION['logged_in']) == true) { ?>
                        <a class="nav-link scrollto" href="logout.php"><i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </a>
                    <?php } else { ?>
                        <a class="nav-link scrollto" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-box-arrow-left"></i>
                            <span>Login</span>
                        </a>
                    <?php } ?>
                </li>
            </ul>
            </ul>
        </nav><!-- .nav-menu -->

    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex flex-column justify-content-center">
        <div class="container" data-aos="zoom-in" data-aos-delay="100">
            <?php $user = "SELECT * FROM user";
            $row = mysqli_query($con, $user);
            $result = mysqli_fetch_assoc($row);
            ?>
            <h1><?php echo $result['name'] ?></h1>
            <p>Expert in <span class="typed" data-typed-items="<?php echo $result['designation'] ?>"></span></p>
            <div class="social-links">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27" height="25" viewBox="0,0,256,256" style="fill:#000000;" class="mb-2">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <g transform="scale(10.66667,10.66667)">
                                <path d="M11,4l-8,5h5.49219c-0.0206,0.0755 -0.05382,0.14412 -0.07031,0.22266c-0.046,0.242 -0.08203,0.50816 -0.08203,0.78516c0,3.571 3.65039,3.16797 3.65039,3.16797v0.91016c0,0.369 0.48402,0.24123 0.54102,0.99023c-0.242,0 -5.05664,-0.13862 -5.05664,3.10938c0,3.26 4.25,3.09961 4.25,3.09961c0,0 4.9082,0.2195 4.9082,-3.8125c0.002,-2.409 -2.81055,-3.19316 -2.81055,-4.16016c0,-0.979 2.11914,-1.26659 2.11914,-3.55859c0,-1.002 -0.06858,-1.71566 -0.51758,-2.22266c-0.035,-0.035 -0.0578,-0.05903 -0.0918,-0.08203c-0.00773,-0.0072 -0.01755,-0.01244 -0.02539,-0.01953h0.12305l2.07031,-1.55273v2.12305c-0.00057,0.03874 0.00336,0.07741 0.01172,0.11523c-0.31978,0.17891 -0.51611,0.51837 -0.51172,0.88477v1c-0.0051,0.36064 0.18438,0.69608 0.49587,0.87789c0.3115,0.18181 0.69676,0.18181 1.00825,0c0.3115,-0.18181 0.50097,-0.51725 0.49587,-0.87789v-1c0.00439,-0.3664 -0.19194,-0.70586 -0.51172,-0.88477c0.00836,-0.03783 0.01229,-0.0765 0.01172,-0.11523v-2.875l1.5,-1.125zM11.69141,7.05273c0.28781,-0.01303 0.57752,0.05689 0.85352,0.21289c0.207,0.104 0.40122,0.2525 0.57422,0.4375c0.357,0.357 0.65736,0.87533 0.81836,1.48633c0.38,1.451 -0.11367,2.84633 -1.13867,3.11133c-1.014,0.287 -2.14416,-0.65961 -2.53516,-2.09961c-0.173,-0.702 -0.14912,-1.38088 0.04688,-1.92188c0.00185,-0.00698 0.0059,-0.0126 0.00781,-0.01953c0.00336,-0.00165 0.00846,-0.00623 0.01172,-0.00781c0.05618,-0.21389 0.14802,-0.40579 0.25977,-0.56445c0.20554,-0.30028 0.47663,-0.50366 0.81445,-0.59375c0.095,-0.023 0.19117,-0.03667 0.28711,-0.04102zM12.08203,15.68555c1.693,-0.127 3.13428,0.80527 3.23828,2.07227c0.07,1.256 -1.2325,2.37328 -2.9375,2.48828c-1.693,0.115 -3.15533,-0.80455 -3.23633,-2.06055c-0.081,-1.267 1.23055,-2.373 2.93555,-2.5z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/majid0110"><i class="bx bxl-linkedin"></i></a>
                <a href="https://github.com/majid0110" class="linkedin"><i class="bx bxl-github"></i></a>

                <a href="https://x.com/majid_0110"><i class="bx bxl-twitter"></i></a>
                <a href="https://wa.me/3105288044"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://join.skype.com/invite/xhGW3N1Hn7N6"><i class="bx bxl-skype"></i></a>

            </div>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">

                    <?php $about = "SELECT * FROM about";
                    $row = mysqli_query($con, $about);
                    $about_result = mysqli_fetch_assoc($row);
                    ?>
                    <h2>About</h2>
                    <p><?php echo $about_result['about_desc'] ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <img src="assets/img/profile-img.jpeg" class="img-fluid rounded" alt="">
                    </div>
                    <div class="col-lg-8 pt-4 pt-lg-0 content">
                        <h3><?php echo $result['name'] ?> - Software Engineer</h3>
                        <p class="fst-italic">
                            <?php echo $about_result['tagline'] ?>
                        </p>
                        <div class="row">
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Birthday:</strong> <span>2nd April
                                            2000
                                        </span></li>

                                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                        <span><?php echo $about_result['pno'] ?></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>City:</strong> <span>Mardan,
                                            Pakistan
                                            USA</span></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <ul>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Age:</strong> <span>23</span></li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                        <span><?php echo $about_result['degree'] ?></span>
                                    </li>
                                    <li><i class="bi bi-chevron-right"></i> <strong>PhEmailone:</strong>
                                        <span><?php echo $about_result['email'] ?></span>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <p>
                            <?php echo $about_result['description'] ?>
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->






        <!-- ======= Resume Section ======= -->
        <section id="resume" class="resume">
            <div class="container" data-aos="fade-up">
                <?php $bio = "SELECT * FROM resume_bio";
                $bio_res = mysqli_query($con, $bio);
                $bio_row = mysqli_fetch_assoc($bio_res); ?>
                <div class="section-title">
                    <h2>Resume</h2>
                    <p><?php echo $bio_row['bio'] ?></p>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="resume-title">Sumary</h3>
                        <div class="resume-item pb-0">
                            <h4><?php echo $result['name'] ?></h4>
                            <ul>
                                <li>Portland par 127,Orlando, FL</li>
                                <li><?php echo $about_result['pno'] ?></li>
                                <li><?php echo $about_result['email'] ?></li>
                            </ul>
                        </div>

                        <h3 class="resume-title">Education</h3>
                        <?php $edu = "SELECT * FROM resume_education";
                        $edu_res = mysqli_query($con, $edu);
                        if (mysqli_num_rows($edu_res) > 0) {
                            while ($row_edu = mysqli_fetch_array($edu_res)) {
                        ?>
                                <div class="resume-item">
                                    <h4><?php echo $row_edu['degree_title'] ?></h4>
                                    <h5><?php echo $row_edu['degree_date'] ?></h5>
                                    <p><em><?php echo $row_edu['institute'] ?></em></p>
                                    <p><?php echo $row_edu['description'] ?></p>
                                </div>
                        <?php }
                        } ?>

                    </div>
                    <div class="col-lg-6">
                        <h3 class="resume-title">Professional Experience</h3>
                        <?php $exp = "SELECT * FROM resume_experience";
                        $exp_res = mysqli_query($con, $exp);
                        if (mysqli_num_rows($exp_res) > 0) {
                            while ($row_exp = mysqli_fetch_array($exp_res)) {
                        ?>
                                <div class="resume-item">
                                    <h4><?php echo $row_exp['job_title'] ?></h4>
                                    <h5><?php echo $row_exp['date'] ?></h5>
                                    <p><em><?php echo $row_exp['company_name'] ?> </em> - <?php echo $row_exp['mode'] ?></p>
                                    <p>

                                    <ul>
                                        <li><?php echo $row_exp['description'] ?></li>
                                    </ul>


                                    </p>
                                </div>
                        <?php }
                        } ?>

                    </div>
                </div>

            </div>
        </section><!-- End Resume Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Portfolio</h2>

                    <?php $p = "SELECT * FROM about";
                    $row = mysqli_query($con, $p);
                    $p_result = mysqli_fetch_assoc($row);
                    ?>
                    <p><?php echo $p_result['tagline'] ?></p>
                </div>

                <div class="row g-4">
                    <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-project">Projects</li>
                            <li data-filter=".filter-publication">Publications</li>

                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    <?php $p = "SELECT * FROM portfolio";
                    $p_res = mysqli_query($con, $p);
                    if (mysqli_num_rows($p_res) > 0) {
                        while ($p_re = mysqli_fetch_array($p_res)) {
                    ?>
                            <div class="col-lg-4 col-md-6  portfolio-item <?php echo $p_re['filter'] ?>">
                                <div class="portfolio-wrap rounded-3">
                                    <?php
                                    // Split the cell's content into an array using a delimiter (e.g., comma)
                                    $imageUrls = explode(',', $p_re['image']);

                                    // Select the first image URL from the array (you can modify this logic)
                                    $selectedImageUrl = $imageUrls[0];
                                    ?>
                                    <img src="admin/uploads/<?php echo $selectedImageUrl; ?>" class="img-fluid" alt="">
                                    <div class="portfolio-info">
                                        <h4><?php echo $p_re['title'] ?></h4>
                                        <p><?php echo $p_re['category'] ?></p>
                                        <div class="portfolio-links">
                                            <a href="admin/uploads/<?php echo $selectedImageUrl; ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="<?php echo $p_re['title'] ?>"><i class="bx bx-plus"></i></a>
                                            <a href="portfolio-details.php?id=<?php echo $p_re['id']; ?>" data-gallery="portfolioDetailsGallery" data-glightbox="type: external" class="portfolio-details-lightbox" title="Project Details"><i class="bx bx-link"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php }
                    } ?>


                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Services</h2>

                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit
                        sint
                        consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea.
                        Quia fugiat sit
                        in iste officiis commodi quidem hic quas.</p>
                </div>

                <div class="row g-4">
                    <?php $service = "SELECT * FROM services";
                    $service_res = mysqli_query($con, $service);
                    if (mysqli_num_rows($service_res) > 0) {
                        while ($serv_re = mysqli_fetch_array($service_res)) {
                    ?>
                            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                                <div class="icon-box iconbox-blue">
                                    <div class="icon">
                                        <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174">
                                            </path>
                                        </svg>
                                        <i class="<?php echo $serv_re['image'] ?>"></i>
                                    </div>
                                    <h4><a href=""><?php echo $serv_re['title'] ?></a></h4>
                                    <p class="text-primary"><?php echo $serv_re['description'] ?></p>
                                </div>
                            </div>
                    <?php }
                    } ?>


                </div>
        </section><!-- End Services Section -->



        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Contact</h2>
                </div>

                <div class="row mt-1">

                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Location:</h4>
                                <p>Mardan, Pakistan</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4>Email:</h4>
                                <p><?php echo $about_result['email'] ?></p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4>Call:</h4>
                                <p><?php echo $about_result['pno'] ?></p>
                            </div>

                        </div>

                    </div>

                    <div class="col-lg-8 mt-5 mt-lg-0">

                        <form action="contact_act.php" method="post" role="form" class="php-email-form ">
                            <div class="mb-3">
                                <?php
                                if (isset($_SESSION['alert_msg'])) { ?>

                                    <div class="text-light fw-bold">
                                        <strong> <?php echo $_SESSION['alert_msg']; ?></strong>

                                    </div>

                                <?php

                                }
                                unset($_SESSION['alert_msg']);
                                ?>
                            </div>

                            <div class="row">

                                <div class="col-md-6 form-group">
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required value="<?php if (isset($_SESSION['name'])) echo $_SESSION['name'];
                                                                                                                                            unset($_SESSION['name']); ?>">
                                    <?php
                                    if (isset($_SESSION['alert-name'])) {

                                        echo '<small class="text-white">' . $_SESSION['alert-name'] . '</small>'
                                    ?>
                                    <?php

                                    }
                                    unset($_SESSION['alert-name']);
                                    ?>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required value="<?php if (isset($_SESSION['email'])) echo $_SESSION['email'];
                                                                                                                                                unset($_SESSION['email']); ?>">
                                    <?php
                                    if (isset($_SESSION['alert-unique'])) {

                                        echo '<small class="text-white">' . $_SESSION['alert-unique'] . '</small>'
                                    ?>
                                    <?php

                                    }
                                    unset($_SESSION['alert-unique']);
                                    ?>
                                    <?php
                                    if (isset($_SESSION['alert-unique'])) {

                                        echo '<small class="text-white">' . $_SESSION['alert-unique'] . '</small>'
                                    ?>
                                    <?php

                                    }
                                    unset($_SESSION['alert-unique']);
                                    ?>


                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
                                <?php
                                if (isset($_SESSION['alert-subject'])) {

                                    echo '<small class="text-white">' . $_SESSION['alert-subject'] . '</small>'
                                ?>
                                <?php

                                }
                                unset($_SESSION['alert-subject']);
                                ?>
                            </div>
                            <div class="form-group mt-3">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
                                <?php
                                if (isset($_SESSION['alert-textmsg'])) {

                                    echo '<small class="text-white">' . $_SESSION['alert-textmsg'] . '</small>'
                                ?>
                                <?php

                                }
                                unset($_SESSION['alert-msg']);
                                ?>
                            </div>

                            <div class="text-center mt-3"><button type="submit" name="send">Send Message</button></div>
                        </form>

                    </div>

                </div>

            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container">
            <h3><?php echo $result['name'] ?></h3>
            <p>If you want to ask about anything, feel free to react me out at the following profiles.</p>
            <div class="social-links">
                <a href=""><svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="27" height="25" viewBox="0,0,256,256" style="fill:#000000;">
                        <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <g transform="scale(10.66667,10.66667)">
                                <path d="M11,4l-8,5h5.49219c-0.0206,0.0755 -0.05382,0.14412 -0.07031,0.22266c-0.046,0.242 -0.08203,0.50816 -0.08203,0.78516c0,3.571 3.65039,3.16797 3.65039,3.16797v0.91016c0,0.369 0.48402,0.24123 0.54102,0.99023c-0.242,0 -5.05664,-0.13862 -5.05664,3.10938c0,3.26 4.25,3.09961 4.25,3.09961c0,0 4.9082,0.2195 4.9082,-3.8125c0.002,-2.409 -2.81055,-3.19316 -2.81055,-4.16016c0,-0.979 2.11914,-1.26659 2.11914,-3.55859c0,-1.002 -0.06858,-1.71566 -0.51758,-2.22266c-0.035,-0.035 -0.0578,-0.05903 -0.0918,-0.08203c-0.00773,-0.0072 -0.01755,-0.01244 -0.02539,-0.01953h0.12305l2.07031,-1.55273v2.12305c-0.00057,0.03874 0.00336,0.07741 0.01172,0.11523c-0.31978,0.17891 -0.51611,0.51837 -0.51172,0.88477v1c-0.0051,0.36064 0.18438,0.69608 0.49587,0.87789c0.3115,0.18181 0.69676,0.18181 1.00825,0c0.3115,-0.18181 0.50097,-0.51725 0.49587,-0.87789v-1c0.00439,-0.3664 -0.19194,-0.70586 -0.51172,-0.88477c0.00836,-0.03783 0.01229,-0.0765 0.01172,-0.11523v-2.875l1.5,-1.125zM11.69141,7.05273c0.28781,-0.01303 0.57752,0.05689 0.85352,0.21289c0.207,0.104 0.40122,0.2525 0.57422,0.4375c0.357,0.357 0.65736,0.87533 0.81836,1.48633c0.38,1.451 -0.11367,2.84633 -1.13867,3.11133c-1.014,0.287 -2.14416,-0.65961 -2.53516,-2.09961c-0.173,-0.702 -0.14912,-1.38088 0.04688,-1.92188c0.00185,-0.00698 0.0059,-0.0126 0.00781,-0.01953c0.00336,-0.00165 0.00846,-0.00623 0.01172,-0.00781c0.05618,-0.21389 0.14802,-0.40579 0.25977,-0.56445c0.20554,-0.30028 0.47663,-0.50366 0.81445,-0.59375c0.095,-0.023 0.19117,-0.03667 0.28711,-0.04102zM12.08203,15.68555c1.693,-0.127 3.13428,0.80527 3.23828,2.07227c0.07,1.256 -1.2325,2.37328 -2.9375,2.48828c-1.693,0.115 -3.15533,-0.80455 -3.23633,-2.06055c-0.081,-1.267 1.23055,-2.373 2.93555,-2.5z">
                                </path>
                            </g>
                        </g>
                    </svg>
                </a>
                <a href="https://www.linkedin.com/in/majid0110"><i class="bx bxl-linkedin"></i></a>
                <a href="https://github.com/majid0110" class="linkedin"><i class="bx bxl-github"></i></a>

                <a href="https://x.com/majid_0110"><i class="bx bxl-twitter"></i></a>
                <a href="https://wa.me/3105288044"><i class='bx bxl-whatsapp'></i></a>
                <a href="https://join.skype.com/invite/xhGW3N1Hn7N6"><i class="bx bxl-skype"></i></a>

            </div>
            <div class="copyright">
                &copy; Copyright <strong><span>Majidkhan</span></strong>. All Rights Reserved
            </div>

        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/typed.js/typed.umd.js"></script>
    <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>