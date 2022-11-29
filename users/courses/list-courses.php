<?php
    session_start();
    include_once("../../models/Registration.php");
    include_once("../../database/Database.php");
    include_once("../../models/Courses.php");
    include_once("../../config.php");
    if(!isset($_SESSION['current_user'])){
        header("Location: ../../auth/index.html?error=Please login to proceed.");
    }
    $_SESSION['active'] = "courses";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/images/Transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/all.css">
    <link rel="stylesheet" href="../../assets/css/solid.css">
    <link rel="stylesheet" href="../../assets/css/brands.css">
    <link rel="stylesheet" href="../../assets/css/regular.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Fovet | Home</title>
</head>
<body>
    <section class="top-navbar d-flex justify-content-between">
    <!-- top nav -->
        <?php
            include_once("../includes/top-navbar.php");
        ?>
    </section>
    <section class="full-body d-flex">
        <section class="side-navbar">
            <section class="container-fluid">
            <!-- side nav -->
            <?php
                include_once("../includes/side-nav.php");
            ?>
            </section>
        </section>
        <section class="content w-100">
            <section class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo BASE_URL.'admin/index.php' ?>">Home</a></li>
                    <li class="breadcrumb-item active">Manage Courses</li>
                </ol>
            </nav>
            <!-- content -->
            <!-- users table -->
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Manage Courses</h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['success'])){
                            echo "<div class='alert alert-success'>{$_GET['success']}</div>";
                        }else if(isset($_GET['error'])){
                            echo "<div class='alert alert-success'>{$_GET['error']}</div>";
                        }
                    ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Course Name</th>
                                <th>Duration</th>
                                <th>Fees</th>
                                <th>Attendance</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn = new Database();
                                $db = $conn -> connection();
                                $users = new Courses($db);
                                $user = $users -> getCourses();
                                if($user){
                                    foreach($user as $user){
                            ?>
                            <tr>
                                <td><?php echo $user['id'] ?></td>
                                <td><?php echo $user['Course_Name'] ?></td>
                                <td><?php echo $user['Course_Duration'].' Months' ?></td>
                                <td><?php echo 'Kshs '.$user['Course_Fee'] ?></td>
                                <td><?php echo $user['Course_Attendance'] ?></td>
                                <td><?php echo $user['Date_added'] ?></td>
                                <td>
                                    <button class="btn btn-primary" id="<?php echo $user['id'] ?>" onclick="openApplicationForm(this.id)">Apply Now</button>
                                </td>
                            </tr>
                            <?php
                                    }
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- end users table -->
            </section>
        </section>
    </section>
    <div class="carousel-container" id="carousel-container">
        <div class="container py-4">
            <div class="carousel col-sm-6 m-auto card">
                <div class="card-header">
                    <h3 class="text-center">Fill The Form To Apply</h3>
                </div>
                <div class="card-body">
                    <?php
                        $conn = new Database();
                        $db = $conn -> connection();
                        $profile = new Registration($db);
                        $profile -> Email = $_SESSION['current_user'];
                        $user = $profile -> getUser();
                        $profile -> Id = $user['id'];
                        $user = $profile -> getProfile();
                        if($user){
                    ?>
                    <form action="save_application.php" method="post">
                        <div class="form-group">
                            <!-- <label for="course_id">Course Id</label> -->
                            <input type="hidden" name="course_id" id="course_id" class="form-control" placeholder="Course Id" required>
                        </div>
                        <div class="form-group">
                            <label for="Fullname">Fullname</label>
                            <input type="text" name="Fullname" id="Fullname" class="form-control" placeholder="Enter Fullname" required value="<?php echo $user['Username'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" id="Email" class="form-control" placeholder="Enter Email" required value="<?php echo $user['Email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Phone">Phone</label>
                            <input type="tel" name="Phone" id="Phone" class="form-control" placeholder="Enter Phone Number" required value="<?php echo $user['Phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Alt_Phone">Alternative Phone</label>
                            <input type="tel" name="Alt_Phone" id="Alt_Phone" class="form-control" placeholder="Enter Alternative Phone Number" required value="<?php echo $user['Phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Start_date">Start Date</label>
                            <input type="date" name="Start_date" id="Start_date" class="form-control" placeholder="Start Date" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Application" name="apply" class="btn btn-primary">
                        </div>
                    </form>
                    <?php
                        }else{
                            echo "<div class='alert alert-danger'>Fill in personal details to proceed.</div>";
                        }
                    ?>
                </div>
                <div class="card-footer">
                    <button class="btn btn-secondary" onclick="closeApplicationForm()">Close</button>
                </div>
            </div>
        </div>
    </div>
</body>
    <script defer src="../assets/js/navbar.js"></script>
    <script defer src="../assets/js/tables.js"></script>
    <script defer src="../../assets/js/all.js"></script>
    <script defer src="../../assets/js/solid.js"></script>
    <script defer src="../../assets/js/brands.js"></script>
    <script defer src="../../assets/js/regular.js"></script>
</html>