<?php
    require_once "../../lib.php";
    require_once "../../db.php";

    if(isset($_POST['tambahorders'])){
        global $conn;
        $id_order =  generateNextId("orders","id_order");
        $id_menu = $_POST['id_menu'];
        $amount = $_POST['amount'];
        $getPriceQry = mysqli_query($conn, "SELECT price FROM menu WHERE id_menu = '$id_menu'");
        $getPrice = mysqli_fetch_array($getPriceQry);
        $subtotal = (int)$getPrice[0] * (int)$amount;

        $qry = mysqli_query($conn, "INSERT INTO orders VALUES ('$id_order','$id_menu','$amount','$subtotal')");
        if($qry){
            header("location: ../adminPanel.php?page=4");
        }
        else{
            echo $conn->error;
        }
    }
    else if(isset($_GET['id_order'])){
        global $conn;
        $id_order = $_GET['id_order'];
        $qry = mysqli_query($conn, "DELETE FROM orders WHERE id_order='$id_order'");
        if($qry){
            header("location: ../adminPanel.php?page=4");
        }
        else{
            echo "FAILED";
        }
    }
    else if(isset($_POST['changeorders'])){
        global $conn;
        $id_order =  $_POST['id_order'];
        $id_menu = $_POST['id_menu'];
        $amount = $_POST['amount'];

        $getPriceQry = mysqli_query($conn, "SELECT price FROM menu WHERE id_menu = '$id_menu'");
        $getPrice = mysqli_fetch_array($getPriceQry);
        $subtotal = (int)$getPrice[0] * (int)$amount;

        $qry = mysqli_query($conn, "UPDATE orders SET id_menu='$id_menu',amount='$amount',subtotal='$subtotal' WHERE id_order='$id_order'");
       
        if($qry){
            header("location: ../adminPanel.php?page=4");
        }
        else{
            echo $conn->error;
        }
    }
?>