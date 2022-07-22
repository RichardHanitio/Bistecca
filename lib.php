<?php
    require_once "db.php";

    function is_logged_in() {
        return isset($_SESSION["email"]);
    }

    function display_error() {
        if (isset($_GET["err"])) {
            echo "<p class='error'>" . $_GET["err"] . "</p>";
        }
    }

    function chop_string($str) {
        return substr($str, 0, 50)."...";
    }

    function generateNextId($table, $column) {
        global $conn;
        $qry = mysqli_query($conn, "SELECT * FROM $table ORDER BY $column DESC LIMIT 1");
        $res = mysqli_fetch_assoc($qry);
        
        if(mysqli_num_rows($qry) > 0) {
            $lastId = $res[$column];
            $lastIdNum = (int)substr($lastId, 2, strlen($lastId)-1);
            $lastIdPrefix = substr($lastId, 0, 1);
            
            $newIdNum = $lastIdNum + 1;
            if($newIdNum<10) $newId = $lastIdPrefix."00".$newIdNum;
            else if($newIdNum<100) $newId = $lastIdPrefix."0".$newIdNum;
            else $newId = $lastIdPrefix.$newIdNum;
        } else {
            $firstIdPrefix = strtoupper(substr($table, 0, 1));
            $firstIdNum = "001";
            $firstId =  $firstIdPrefix.$firstIdNum;
            return $firstId;
        }

        return $newId;
    }

    function generateNextMainId() {
        global $conn;
        $qry = mysqli_query($conn, "SELECT * FROM main ORDER BY id_main DESC LIMIT 1");
        $res = mysqli_fetch_assoc($qry);
        if(mysqli_num_rows($qry) > 0) {
            $lastId = (int)$res["id_main"];
            $newId = $lastId + 1;
        } else {
            return 1;
        }
        return $newId;
    }

    function discountPrice($price, $discount) {
        return (100 - (int)$discount) / 100 * (int)$price;
    }

    function selectTableUser($table, $keyword=null){
        global $conn;
        $key = "$keyword" . "%";
        if($keyword == null){
            return mysqli_query($conn, "SELECT * FROM $table");
        }
        else{
            return mysqli_query($conn, "SELECT * FROM $table WHERE email LIKE '$key'");
        }
    }
    
    function selectTableMenu($table, $keyword=null){
        global $conn;
        $key = "$keyword" . "%";
        if($keyword == null){
            return mysqli_query($conn, "SELECT * FROM $table");
        }
        else{
            return mysqli_query($conn, "SELECT * FROM $table WHERE id_menu LIKE '$key' OR name LIKE '$key'");
        }
    }

    function selectTableReservation($table, $keyword=null){
        global $conn;
        $key = "$keyword" . "%";
        if($keyword == null){
            return mysqli_query($conn, "SELECT * FROM $table");
        }
        else{
            return mysqli_query($conn, "SELECT * FROM $table WHERE id_reservation LIKE '$key' OR date LIKE '$key'");
        }
    }

    function selectTableOrders($table, $keyword=null){
        global $conn;
        $key = "$keyword" . "%";
        if($keyword == null){
            return mysqli_query($conn, "SELECT * FROM $table");
        }
        else{
            return mysqli_query($conn, "SELECT * FROM $table WHERE id_order LIKE '$key'");
        }
    }

    function selectTableMain($table, $keyword=null){
        global $conn;
        $key = "$keyword" . "%";
        if($keyword == null){
            return mysqli_query($conn, "SELECT * FROM $table");
        }
        else{
            return mysqli_query($conn, "SELECT * FROM $table WHERE id_main LIKE '$key' OR email LIKE '$key' OR id_reservation LIKE '$key'");
        }
    }

    function selectCategoryMenu($category){
        global $conn;
        return mysqli_query($conn, "SELECT * FROM menu WHERE category = '$category'");
    }

    
?>