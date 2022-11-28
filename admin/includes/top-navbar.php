<div class="container-fluid d-flex justify-content-between">
    <div class="logo"><h2><a href="<?php echo BASE_URL.'admin/index.php' ?>">Fovet</a></h2></div>
    <div class="l-user">
        Welcome: 
        <?php
            $conn = new Database();
            $db = $conn -> connection();
            $users = new Registration($db);
            $users -> Email = $_SESSION['current_user'];
            $user = $users -> getUser();
            if($user){
                $user_array = explode(" ",$user['Username']);
                echo $user_array[0];
            }
        ?>
    </div>
</div>