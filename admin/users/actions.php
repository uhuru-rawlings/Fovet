<?php
    include_once("../../database/Database.php");
    $conn = new Database();
    $db = $conn -> connection();
    if(isset($_GET['delete'])){
        $sql = "DELETE FROM Registration WHERE id = ?";
        $query = $db -> prepare($sql);
        $query -> execute([$_GET['delete']]);
        if($query){
            header("Location: ../index.php?success=user deleted successfully.");
        }else{
            header("Location: ../index.php?error=Oops! sorry something went wrong.");
        }
    }
    if(isset($_GET['activate'])){
        $status = "Active";
        $sql = "UPDATE Registration SET is_active = ? WHERE id = ?";
        $query = $db -> prepare($sql);
        $query -> execute([$status,$_GET['activate']]);
        if($query){
            header("Location: ../index.php?success=user activated successfully.");
        }else{
            header("Location: ../index.php?error=Oops! sorry something went wrong.");
        }
    }
    if(isset($_GET['pause'])){
        $status = "Pause";
        $sql = "UPDATE Registration SET is_active = ? WHERE id = ?";
        $query = $db -> prepare($sql);
        $query -> execute([$status,$_GET['pause']]);
        if($query){
            header("Location: ../index.php?success=user paused successfully.");
        }else{
            header("Location: ../index.php?error=Oops! sorry something went wrong.");
        }
    }
?>