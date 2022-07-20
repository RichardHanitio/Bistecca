<?php
    require "../lib.php";
    require "../db.php";

    $qry = "INSERT INTO reservation VALUES(?,?,?,?,?)";
    if(isset($_POST["reserve-ovo"]) || isset($_POST["reserve-bca"])) {
        $date = $_POST["reservation_date"];
        $time = $_POST["reservation_time"];
        $guest = $_POST["reservation_guest"];
        $location = $_POST["reservation_location"];
        $id = generateNextId("reservation", "id_reservation");
        $email = $_SESSION["email"];
        
        $stmt = $conn->prepare($qry);
        $stmt->bind_param("ssssi",$id, $date, $time, $location, $guest);
        $stmt->execute();

        print_r($_SESSION["orders"]);

        $orderids = $_SESSION["orders"];
        foreach($orderids as $orderid){
            $newMainId = generateNextMainId();
            $q = "INSERT INTO main VALUES(?,?,?,?)";
            $stmt2 = $conn->prepare($q);
            $stmt2->bind_param("isss",$newMainId,$email,$id,$orderid);
            $stmt2->execute();
        }
        
        header("Location: ../Notification/notification.php?notif=checkout&reservationid=$id");

    } else {
        header("Location: reservation.php");
    }
?>