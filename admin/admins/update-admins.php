<?php
    session_start();
    include_once("../../models/Registration.php");
    include_once("../../database/Database.php");
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
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
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
                    <li class="breadcrumb-item active">Update Admins</li>
                </ol>
            </nav>
            <!-- content -->
            <!-- users table -->
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Update Admins</h4>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_GET['success'])){
                            echo "<div class='alert alert-success'>{$_GET['success']}</div>";
                        }else if(isset($_GET['error'])){
                            echo "<div class='alert alert-danger'>{$_GET['error']}</div>";
                        }
                    ?>
                    <form action="update_user_fun.php" method="post">
                        <div class="form-group">
                            <input type="hidden" name="account" id="account" class="form-control" placeholder="First Name" required value="<?php echo $_GET['update'] ?>">
                        </div>
                        <?php
                            $conn = new Database();
                            $db = $conn -> connection();
                            $users = new Registration($db);
                            $users -> Id = $_GET['update'];
                            $user = $users -> updateUser();
                            if($user){
                                $uname = explode(" ",$user['Username']);
                        ?>
                        <div class="form-group">
                            <label for="Fname">First Name</label>
                            <input type="text" name="Fname" id="Fname" class="form-control" placeholder="First Name" required value="<?php echo $uname[0] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Lname">Last Name</label>
                            <input type="text" name="Lname" id="Lname" class="form-control" placeholder="Last Name" required value="<?php echo $uname[1] ?>">
                        </div>
                        <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" id="Email" class="form-control" placeholder="Email" required value="<?php echo $user['Email'] ?>">
                        </div>
                         <div class="form-group">
                            <label for="Password">Password</label>
                            <input type="password" name="Password" id="Password" class="form-control" placeholder="Password">
                        </div>
                         <div class="form-group">
                            <label for="c_password">Confirm Password</label>
                            <input type="password" name="c_password" id="c_password" class="form-control" placeholder="Confirm Password">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Update Admin" name="signup" class="btn btn-primary">
                        </div>
                        <?php
                            }
                        ?>
                    </form>
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