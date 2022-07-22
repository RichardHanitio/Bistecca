<?php 
    $id_menu =  $_GET['id_menu'];
    $category = $_GET['category'];
    $name = $_GET['name'];
    $description = $_GET['description'];
    $price = $_GET['price'];
    $image = $_GET['image'];
    $discount = $_GET['discount'];
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
    <form action="menu.php" id="form" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="">Id_menu</label></td>
                <td><input type="text" id="" name="" value="<?= $id_menu ?>"  disabled></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" id="" name="id_menu" value="<?= $id_menu ?>"></td>
            </tr>
            <tr>
                <td><label for="">Category</label></td>
                <td>
                    <select name="category" required>
                        <option value="Special Offer">Special Offer</option>
                        <option value="Steak">Steak</option>
                        <option value="Spaghetti">Spaghetti</option>
                        <option value="Snack">Snack</option>
                        <option value="Drinks">Drinks</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="">Name</label></td>
                <td><input type="text" id="" name="name" value="<?= $name ?>"></td>

            </tr>
            <tr>
                <td><label for="">Description</label></td>
                <td><textarea name="description"><?= $description ?></textarea></td>
            </tr>
            <tr>
                <td><label for="">Price</label></td>
                <td><input type="text" name="price" value="<?= $price ?>"></td>
            </tr>
            <tr>
                <td><label for="">Image</label></td>
                <td><input type="text" id="" name="image" value="<?= $image ?>" disabled></td>
            </tr>
            <tr>
                <td><label for=""></label></td>
                <td><input type="hidden" id="" name="image" value="<?= $image ?>"></td>
            </tr>
            <tr>
                <td><label for="">Discount</label></td>
                <td><input type="text" id="" name="discount" value="<?= $discount ?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="hidden" name="changemenu" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>Change</button></td>
            </tr>
        </table>
      </form>
</body>
</html>