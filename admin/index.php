<?php
    session_start();
    include_once("../models/Registration.php");
    include_once("../database/Database.php");
    if(!isset($_SESSION['current_user'])){
        header("Location: auth/index.php?error=Please login to proceed.");
    }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <!-- content -->
            <!-- users table -->
            <div class="card mt-5">
                <div class="card-header">
                    <h4>user details.</h4>
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
                                <th>Fullname</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Activate</th>
                                <th>Pause</th>
                                <th>Date Added</th>
                                <th><i class="fa-solid fa-trash text-danger"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $conn = new Database();
                                $db = $conn -> connection();
                                $users = new Registration($db);
                                $user = $users -> getUsers();
                                if($user){
                                    foreach($user as $user){
                            ?>
                            <tr>
                                <td><?php echo $user['Username'] ?></td>
                                <td><?php echo $user['Email'] ?></td>
                                <td>
                                    <?php
                                        if($user['is_active'] == "Active"){
                                            echo"<span class='text-success'>{$user['is_active']}</span>";
                                        }else{
                                            echo"<span class='text-warning'>Inactive</span>";
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($user['is_active'] == "Active"){
                                            echo"<a href='javascript:void(0)'>
                                                <button class='btn btn-success' disabled>Activate</button>
                                            </a>";
                                        }else{
                                             echo"<a href='users/actions.php?activate={$user['id']}'>
                                                <button class='btn btn-success'>Activate</button>
                                            </a>";
                                        
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        if($user['is_active'] == "Pause"){
                                           echo"<a href='javascript:void(0)'>
                                                <button class='btn btn-warning' disabled>Pause</button>
                                            </a>";
                                        }else{
                                             echo"<a href='users/actions.php?pause={$user['id']}'>
                                                <button class='btn btn-warning'>Pause</button>
                                            </a>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $user['Date_added'] ?></td>
                                <td><a href="users/actions.php?delete=<?php echo $user['id'] ?>"><i class="fa-solid fa-trash text-danger"></i></a></td>
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
    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/solid.js"></script>
    <script src="../assets/js/brands.js"></script>
    <script src="../assets/js/regular.js"></script>
</html>