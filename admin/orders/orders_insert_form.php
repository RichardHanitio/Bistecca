<?php 
    require_once "../../lib.php";
    require_once "../../db.php";

    $qry = mysqli_query($conn, "SELECT id_menu FROM menu");

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
    <form action="orders.php" id="form" method="POST">
        <table>
            <tr>
                <td><label for="">Id Menu</label></td>
                <td>
                    <select name="id_menu" id="menu">
                        <?php while($row = mysqli_fetch_array($qry)) {?>
                            <option value="<?=$row[0]?>"><?=$row[0]?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Amount</label></td>
                <td><input type="number" id="" name="amount"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="tambahorders" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>INSERT</button></td>
            </tr>
        </table>
      </form>
</body>
</html>