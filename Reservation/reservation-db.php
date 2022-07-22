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

        $orderids = $_SESSION["orders"];
        foreach($orderids as $orderid){
            $newMainId = generateNextMainId();
            $q = "INSERT INTO main VALUES(?,?,?,?)";
            $stmt2 = $conn->prepare($q);
            $stmt2->bind_param("isss",$newMainId,$email,$id,$orderid);
            $stmt2->execute();
        }

        echo $id;

        // echo $_POST["amount"]["O001"];
        // print_r($_POST["amount"]);
        // update table order ke amount yang benar
        $amounts = $_POST["amount"];
        foreach($amounts as $key => $amount) {
            $intamount = (int)$amount;
            $changeAmount = mysqli_query($conn, "UPDATE orders SET amount=$intamount WHERE id_order='$key'");
        }
        
        // header("Location: ../Notification/notification.php?notif=checkout&reservationid=$id");

    } else {
        header("Location: reservation.php");
    }
?>