<?php 
    require "../lib.php";
    require "../db.php";
    $query = "SELECT * FROM user WHERE email=?";

    if(isset($_POST['login'])){
        $email = $_POST["email"];
        $password = $_POST["password"];

        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();

        $res = $stmt->get_result()->fetch_assoc();

        if(!empty($res) && $res['is_admin'] == 0){
            $_SESSION["name"] = $res["name"];
            $_SESSION["email"] = $res["email"];
            header("Location: ../index.php");
        } 
        else if(!empty($res) && $res['is_admin'] == 1){
            $_SESSION["name"] = $res["name"];
            $_SESSION["email"] = $res["email"];
            $_SESSION["isAdmin"] = true;
            header("Location: ../admin/adminPanel.php");
        }
        else {
            header("Location: ./login.php?err=Wrong email or password");
        }


    } else {
        header("Location: login.php");
    }


?>