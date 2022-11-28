<?php
    session_start();
    if(isset($_SESSION['current_user'])){
        unset($_SESSION['current_user']);
        header("Location: auth/index.php?error=You were logged out, please login.");
    }
?>