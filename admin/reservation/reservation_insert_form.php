<?php 
    require_once "../../lib.php";
    require_once "../../db.php";
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
                <td><label for="">date</label></td>
                <td><input type="date" id="" name="date"></td>
            </tr>
            <tr>
                <td><label for="">time</label></td>
                <td><input type="time" id="" name="time"></td>
            </tr>
            <tr>
                <td><label for="">Location</label></td>
                <td>
                    <select name="location" id="">
                        <?php $table = selectTableLocation("location", null); while($row = mysqli_fetch_array($table)) { ?>
                            <option value="<?= $row[0] ?>"> <?= $row[0] ?> </option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Guest</label></td>
                <td><input type="number" name="guest" placeholder='0'></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="hidden" name="tambahreservation" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>INSERT</button></td>
            </tr>
        </table>
      </form>
</body>
</html>