<?php
    require_once "../../lib.php";
    require_once "../../db.php";

    if(isset($_POST['tambahmenu'])){
        global $conn;
        $imageFile = $_FILES['image'];
        $tipeFile = $imageFile['type'];
        $directoryTujuan = "../../menuImage/".$imageFile['name'];
        move_uploaded_file($imageFile['tmp_name'], $directoryTujuan);
        $id_menu =  generateNextId("menu" ,"id_menu");
        $category = $_POST['category'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $image = $imageFile['name'];
        $discount;
        if(isset($_POST['discount'])){
            $discount = $_POST['discount'];
        }
        else{
            $discount = 0;
        }
        
        $qry = mysqli_query($conn, "INSERT INTO menu VALUES ('$id_menu','$category','$name','$description','$price','$image','$discount')");
        header("location: ../adminPanel.php?page=2");
    }
    else if(isset($_GET['id_menu'])){
        global $conn;
        $id_menu = $_GET['id_menu'];
        $qry = mysqli_query($conn, "DELETE FROM menu WHERE id_menu='$id_menu'");
        if($qry){
            header("location: ../adminPanel.php?page=2");
        }
        else{
            echo "FAILED";
        }
    }
    else if(isset($_POST['changemenu'])){
        global $conn;
        $id_menu =  $_POST['id_menu'];
        $category = $_POST['category'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = (int)$_POST['price'];
        $image = $_POST['image'];
        $discount;
        if(isset($_POST['discount'])){
            $discount = $_POST['discount'];
        }
        else{
            $discount = 0;
        }
        $qry = mysqli_query($conn, "UPDATE menu SET category='$category',name='$name',description='$description',price='$price',image='$image',discount='$discount' WHERE id_menu='$id_menu'");

        if($qry){
            header("location: ../adminPanel.php?page=2");
        }
        else{
            echo "ERORR";
        }
    }
?>