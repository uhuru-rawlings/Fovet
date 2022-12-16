<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fovet - Blogs</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="FoVET Research & Consultancy Ltd is a Kenyan based research, capacity building and consultancy firm (FoVET is the for-profit arm of Vision & Empowerment Trust (VET), which is a non-profit) with its head office in Nairobi, Kenya." name="keywords">
    <meta content="FoVET Research & Consultancy Ltd is a Kenyan based research, capacity building and consultancy firm (FoVET is the for-profit arm of Vision & Empowerment Trust (VET), which is a non-profit) with its head office in Nairobi, Kenya." name="description">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/assets/images/Transparent.png" type="image/x-icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo get_template_directory_uri() ?>/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri() ?>/lib/animate/animate.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo get_template_directory_uri() ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo get_template_directory_uri() ?>/style.css" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"><img src="assets/images/Full-black-Transparent.png" alt="background image"></div>
    </div> -->
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-lg-8 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <small class="me-3 text-light"><i class="fa fa-map-marker-alt me-2"></i>Thogoto Road United Estate House No 34</small>
                    <small class="text-light"><i class="fa fa-envelope-open me-2"></i><a href="mailto:info@fovet.co" class="text-white">info@fovet.co</a></small>
                </div>
            </div>
            <div class="col-lg-4 text-center text-lg-end">
                <div class="d-inline-flex align-items-center" style="height: 45px;">
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                    <a class="btn btn-sm btn-outline-light btn-sm-square rounded-circle me-2" href="#"><i class="fab fa-youtube fw-normal"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0" style="width: 150px; height: 70px;">
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/Transparent.png" width="100%" height="100%" style="object-fit: scale-down;" alt="image">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="../index.html" class="nav-item nav-link">Home</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                        <div class="dropdown-menu m-0">
                            <a href="../about.html" class="dropdown-item">About Us</a>
                            <a href="../teams.html" class="dropdown-item">Our Team</a>
                        </div>
                    </div>
                    <a href="service.html" class="nav-item nav-link">Services</a>
                    <!-- <a href="users/index.php" class="nav-item nav-link">Training</a> -->
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Learn</a>
                        <div class="dropdown-menu m-0">
                            <a href="index.php" class="dropdown-item">Stories</a>
                        </div>
                    </div>
                    <a href="../contact.php" class="nav-item nav-link">Contact</a>
                    <a href="../auth/index.html" id="auth_accounts" class="nav-item nav-link">Login</a>
                </div>
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">About Us</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->