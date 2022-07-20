<?php 
    require_once "../lib.php";

    $id_menu = $_POST['id_menu'];

    foreach($id_menu as $id){
        echo $id;
    }

?>