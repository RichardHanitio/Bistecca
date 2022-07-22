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
    <form action="location.php" id="form" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td><label for="">Location</label></td>
                <td><input type="text" id="" name="location"></td>

            </tr>
            <tr>
                <td><label for="">Image</label></td>
                <td><input type="file" id="" name="image"></td>
            </tr>
            
            <tr>
                <td></td>
                <td><input type="hidden" name="tambahlocation" value="yes"></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit" class='btn'>INSERT</button></td>
            </tr>
        </table>
      </form>
</body>
</html>