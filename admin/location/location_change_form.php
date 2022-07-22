<?php 
    require_once "../../lib.php";
    require_once "../../db.php";
    
    $location =  $_GET['location'];
    $qryOrder = mysqli_query($conn, "SELECT id_order FROM orders");

?>  


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../form_style.css">
</head>
<body>
    <form action="location.php" id="form" method="POST" enctype="multipart/form-data" >
        <table>
            <tr>
                <td><label for="">Location</label></td>
                <td><input type="text" id="" name="" value="<?= $location ?> " disabled></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" id="" name="location" value="<?= $location ?>"></td>
            </tr>
            <tr>
                <td><label for="">Image</label></td>
                <td><input type="file" id="" name="image"></td>
            </tr>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="changelocation" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>Change</button></td>
            </tr>
        </table>
      </form>
</body>
</html>