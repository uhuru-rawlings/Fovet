<?php
    session_start();
    include_once("../../models/Registration.php");
    include_once("../../database/Database.php");
    include_once("../../models/Courses.php");
    include_once("../../config.php");
    if(!isset($_SESSION['current_user'])){
        header("Location: ../auth/index.php?error=Please login to proceed.");
    }
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
                                <th><i class="fa-solid fa-trash text-danger"></i></th>
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
                                    <a href="update-course.php?update=<?php echo $user['id'] ?>"><i class="fa-solid fa-pen text-primary"></i></a>
                                    <a href="delete_course.php?delete=<?php echo $user['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a>
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
</body>
    <script src="../assets/js/tables.js"></script>
    <script src="../../assets/js/all.js"></script>
    <script src="../../assets/js/solid.js"></script>
    <script src="../../assets/js/brands.js"></script>
    <script src="../../assets/js/regular.js"></script>
</html>