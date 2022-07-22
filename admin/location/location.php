<?php
    require_once "../../lib.php";
    require_once "../../db.php";

    if(isset($_POST['tambahlocation'])){
        global $conn;
        $imageFile = $_FILES['image'];
        $tipeFile = $imageFile['type'];
        $directoryTujuan = "../../locationImage/".$imageFile['name'];
        move_uploaded_file($imageFile['tmp_name'], $directoryTujuan);
        
        $location = $_POST["location"];
        $image = $imageFile["name"];

        $qry = mysqli_query($conn, "INSERT INTO location VALUES ('$location','$image')");
        if($qry){
            header("location: ../adminPanel.php?page=6");
        }
        else{
            echo $conn->error;
        }
    }
    else if(isset($_GET['location'])){
        global $conn;
        $location = $_GET['location'];
        $qry = mysqli_query($conn, "DELETE FROM location WHERE location='$location'");
        if($qry){
            header("location: ../adminPanel.php?page=6");
        }
        else{
            echo "FAILED";
        }
    }
    else if(isset($_POST['changelocation'])){
        global $conn;
        $imageFile = $_FILES['image'];
        $tipeFile = $imageFile['type'];
        $directoryTujuan = "../../locationImage/".$imageFile['name'];
        move_uploaded_file($imageFile['tmp_name'], $directoryTujuan);

        $location =  $_POST['location'];
        $image = $imageFile['name'];

        $qry = mysqli_query($conn, "UPDATE location SET image='$image' WHERE location='$location'");
       
        if($qry){
            header("location: ../adminPanel.php?page=6");
        }
        else{
            echo $conn->error;
        }
    }
?>