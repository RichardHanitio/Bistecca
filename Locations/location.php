<?php 
  require_once "../lib.php";
  require_once "../db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Bistecca | Location</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="location.css">
</head>
<body>
    <?php require "../Navbar/navbar.php" ?>

    <div class="img1">
        <div class="centered">
            <h2 class="title locations-title">OUR LOCATIONS</h2>
            <p class="desc locations-desc">Come or reserve a table from these locations</p>
        </div>
    </div>

    <div class="location">
        <p>Locations</p>
    </div>

    <div class="grid-container">
        <?php $table = selectTableLocation("location", null); while($row = mysqli_fetch_array($table)) { ?>
          <div class="container">
              <img src="../locationImage/<?= $row[1] ?>" alt="Avatar" class="image">
              <div class="middle">
                <div class="text"><?= $row[0] ?></div>
              </div>
          </div>
        <?php } ?>
    </div>

    <div class="location">
        <p></p>
    </div>

    <div class="img1">
        <div class="centered1">
            <div class="text1">
                <h2>Ready For Dinner?</h2>
            </div>
            <button type="submit" class="submit-button btn" onclick="window.location.href='../Menu/menu.php'">See The Menu</button>
            
        </div>
    </div>

</body>
</html>

<script src="/script.js" defer></script>

