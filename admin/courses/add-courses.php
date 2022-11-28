<?php
    session_start();
    include_once("../../models/Registration.php");
    include_once("../../database/Database.php");
    include_once("../../config.php");
    if(!isset($_SESSION['current_user'])){
        header("Location: ../auth/index.php?error=Please login to proceed.");
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../../assets/images/Transparent.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/all.css">
    <link rel="stylesheet" href="../../assets/css/solid.css">
    <link rel="stylesheet" href="../../assets/css/brands.css">
    <link rel="stylesheet" href="../../assets/css/regular.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Fovet | Courses</title>
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
                    <li class="breadcrumb-item active">Add Courses</li>
                </ol>
            </nav>
            <!-- content -->
            <!-- users table -->
            <div class="card mt-3">
                <div class="card-header">
                    <h4>user Courses</h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['success'])){
                            echo "<div class='alert alert-success'>{$_GET['success']}</div>";
                        }else if(isset($_GET['error'])){
                            echo "<div class='alert alert-success'>{$_GET['error']}</div>";
                        }
                    ?>
                    <form action="save_courses_fun.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="course_name">Course Name</label>
                            <input type="text" name="course_name" id="course_name" class="form-control" placeholder="Course Name" required>
                        </div>
                        <div class="form-group">
                            <label for="course_duration">Course Duration(Months)</label>
                            <input type="number" name="course_duration" id="course_duration" class="form-control" required placeholder="Course Duration">
                        </div>
                        <div class="form-group">
                            <label for="course_fee">Course Fee(Kshs)</label>
                            <input type="number" name="course_fee" id="course_fee" class="form-control" required placeholder="Course Fees">
                        </div>
                        <div class="form-group">
                            <label for="attendance">Attendance</label>
                            <select  name="attendance" id="attendance" class="form-control" required placeholder="Attendance">
                                <option value="In Person">In Person</option>
                                <option value="Hybrid">Hybrid</option>
                                <option value="Online">Online</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class_image">Course Image</label>
                            <input type="file" name="class_image" id="class_image" class="form-control" placeholder="Image" required accept="image/*">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Save Course" name="save" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
            <!-- end users table -->
            </section>
        </section>
    </section>
</body>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
    </script>
    <script defer type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script> 
    <!-- <script src="../assets/js/nicEdit.js"></script> -->
    <script defer src="../assets/js/navbar.js"></script>
    <script defer src="../assets/js/tables.js"></script>
    <script defer src="../../assets/js/all.js"></script>
    <script defer src="../../assets/js/solid.js"></script>
    <script defer src="../../assets/js/brands.js"></script>
    <script defer src="../../assets/js/regular.js"></script>
</html>