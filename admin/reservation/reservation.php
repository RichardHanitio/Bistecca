<?php
    require_once "../../lib.php";
    require_once "../../db.php";

    if(isset($_POST['tambahreservation'])){
        global $conn;
        $id_reservation =  generateNextId("reservation","id_reservation");
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $guest = (int)$_POST['guest'];
        $qry = mysqli_query($conn, "INSERT INTO reservation VALUES ('$id_reservation','$date','$time','$location','$guest')");
        header("location: ../adminPanel.php?page=3");
    }
    else if(isset($_GET['id_reservation'])){
        global $conn;
        $id_reservation = $_GET['id_reservation'];
        $qry = mysqli_query($conn, "DELETE FROM reservation WHERE id_reservation='$id_reservation'");
        if($qry){
            header("location: ../adminPanel.php?page=3");
        }
        else{
            echo "FAILED";
        }
    }
    else if(isset($_POST['changereservation'])){
        global $conn;
        $id_reservation =  $_POST['id_reservation'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $location = $_POST['location'];
        $guest = (int)$_POST['guest'];
        $qry = mysqli_query($conn, "UPDATE reservation SET date='$date',time='$time',location='$location',guest='$guest' WHERE id_reservation='$id_reservation'");
        header("location: ../adminPanel.php?page=3");
    }
?>