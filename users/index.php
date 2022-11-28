<?php
    session_start();
    include_once("../models/Registration.php");
    include_once("../database/Database.php");
    include_once("../config.php");
    if(!isset($_SESSION['current_user'])){
        header("Location: ../auth/index.html?error=Please login to proceed.");
    }
    $_SESSION['active'] = "dashboard";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../assets/images/Transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/all.css">
    <link rel="stylesheet" href="../assets/css/solid.css">
    <link rel="stylesheet" href="../assets/css/brands.css">
    <link rel="stylesheet" href="../assets/css/regular.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Fovet | Home</title>
</head>
<body>
    <section class="top-navbar d-flex justify-content-between">
    <!-- top nav -->
        <?php
            include_once("includes/top-navbar.php");
        ?>
    </section>
    <section class="full-body d-flex">
        <section class="side-navbar">
            <section class="container-fluid">
            <!-- side nav -->
            <?php
                include_once("includes/side-nav.php");
            ?>
            </section>
        </section>
        <section class="content w-100">
            <section class="container-fluid">
            <nav aria-label="breadcrumb mt-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
            <!-- content -->
            <!-- users table -->
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="assets/images/user.png" width="100%" style="height: auto;" alt="">
                        </div>
                        <div class="col-sm-9">
                         <?php
                            $conn = new Database();
                            $db = $conn -> connection();
                            $users = new Registration($db);
                            $users -> Email = $_SESSION['current_user'];
                            $user = $users -> getUser();
                            if($user){
                                $user_array = explode(" ",$user['Username']);
                        ?>
                            <p>
                            <i class="fa-solid fa-address-card"></i> First name: <?php  echo $user_array[0] ?> 
                            </p>
                            <p>
                                <i class="fa-solid fa-address-card"></i> Last name: <?php  echo $user_array[1] ?>
                            </p>
                            <p>
                                <i class="fa-solid fa-envelope"></i> Email: <?php  echo $user['Email'] ?>
                            </p>
                            <p>
                                <i class="fa-solid fa-user-check"></i> Roles: <?php  echo $user['Roles'] ?>
                            </p>
                        <?php
                            }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end users table -->
            </section>
        </section>
    </section>
</body>
    <script defer src="assets/js/navbar.js"></script>
    <script defer src="assets/js/tables.js"></script>
    <script defer src="../assets/js/all.js"></script>
    <script defer src="../assets/js/solid.js"></script>
    <script defer src="../assets/js/brands.js"></script>
    <script defer src="../assets/js/regular.js"></script>
</html>