<?php 
    require_once "../../lib.php";
    require_once "../../db.php";
    
    $id_reservation =  $_GET['id_reservation'];
    $date = $_GET['date'];
    $time = $_GET['time'];
    $location = $_GET['location'];
    $guest = (int)$_GET['guest'];

    //Konversi Date
    $dates = strtotime($date);
    $new_date = date('Y-m-d', $dates);

    //Konversi Time
    $time = date("H:i", strtotime($time));

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
    <form action="reservation.php" id="form" method="POST">
        <table>
            <tr>
                <td><label for="">Id Reservation</label></td>
                <td><input type="text" id="" name="" value="<?= $id_reservation ?> " disabled></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" id="" name="id_reservation" value="<?= $id_reservation ?>"></td>
            </tr>
            <tr>
                <td><label for="">Date</label></td>
                <td><input type="date" id="" name="date" value="<?= $new_date ?>"></td>
            </tr>
            <tr>
                <td><label for="">Time</label></td>
                <td><input type="time" id="" name="time" value="<?= $time ?>"></td>

            </tr>
            <tr>
                <td><label for="">Location</label></td>
                <td>
                    <select name="location" id="">
                        <?php $table = selectTableLocation("location", null); while($row = mysqli_fetch_array($table)) { ?>
                            <option <?php if($location == $row[0]) echo "selected='selected'" ?> value="<?= $row[0] ?>"><?= $row[0] ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">guest</label> </td>
                <td><input type="text" name="guest" value="<?= $guest ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="changereservation" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>Change</button></td>
            </tr>
        </table>
      </form>
</body>
</html>