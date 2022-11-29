<?php
    if(isset($_GET['apply'])){
        session_start();
        $user = $_SESSION['current_user'];
        $course = $_GET['apply'];
    }
?>