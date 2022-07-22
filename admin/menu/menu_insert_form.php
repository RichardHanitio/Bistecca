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
                <!-- <td><input type="text" id="" name="category"></td> -->
            </tr>
            <tr>
                <td><label for="">name</label></td>
                <td><input type="text" id="" name="name"></td>

            </tr>
            <tr>
                <td><label for="">Description</label></td>
                <td><textarea id="" name="description"></textarea></td>
                <!-- <td><input type="text" id="" name="description"></td> -->
            </tr>
            <tr>
                <td><label for="">Price</label></td>
                <td><input type="number" name="price" placeholder="0"></td>
            </tr>
            <tr>
                <td><label for="">Image</label></td>
                <td><input type="file" id="" name="image"></td>
            </tr>
            <tr>
                <td><label for="">Discount</label></td>
                <td><input type="number" id="" name="discount" placeholder="0"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="hidden" name="tambahmenu" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>INSERT</button></td>
            </tr>
        </table>
      </form>
</body>
</html>