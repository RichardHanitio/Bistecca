<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap"
            rel="stylesheet"
        />
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="./menu.css" />
        <link rel="stylesheet" href="../global_styles.css" />
        <title>Bistecca | Menu</title>
    </head>
    <body>
        <?php require "../Navbar/navbar.php" ?>
        <main>
            <form action="cart.php" method="post">
                <section>
                    <div class="container menu-container">
                        <div class="title menu-main-title">
                            <label>Special Offer</label>
                        </div>
                        <div class="image-container">
                            <div class="card-container">
                                <div class="picture">
                                    <img src="../images/tenderloin.png" alt="tenderloin" />
                                </div>
                                <div class="card-container-info">
                                    <p class="menu-title">Tenderloin Stick</p>
                                    <p class="menu-info">Steak with Lorem Ipsum</p>
                                    <div class="card-container-amount">
                                        <p>Rp.500.000,00</p>
                                        
                                            <label class="icon">+</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-container">
                                <div class="picture">
                                    <img src="../images/tenderloin.png" alt="tenderloin" />
                                </div>
                                <div class="card-container-info">
                                    <p class="menu-title">Tenderloin Stick</p>
                                    <p class="menu-info">Steak with Lorem Ipsum</p>
                                    <div class="card-container-amount">
                                        <p>Rp.500.000,00</p>
                                        
                                            <label class="icon">+</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card-container">
                                <div class="picture">
                                    <img src="../images/tenderloin.png" alt="tenderloin" />
                                </div>
                                <div class="card-container-info">
                                    <p class="menu-title">Tenderloin Stick</p>
                                    <p class="menu-info">Steak with Lorem Ipsum</p>
                                    <div class="card-container-amount">
                                        <p>Rp.600.000,00</p>
                                        
                                            <label class="icon">+</label>
                                    </div>
                                </div>
                            </div>     
                            
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title">
                            <label>Steak</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("STEAK") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="picture">
                                        <img src="../menuImage/<?= $row[5] ?>" alt="tenderloin" />
                                    </div>
                                    <div class="card-container-info">
                                        <p class="menu-title"><?= $row[2] ?></p>
                                        <p class="menu-info"><?= $row[3] ?></p>
                                        <div class="card-container-amount">
                                            <p><?= $row[4] ?></p>
                                            <label class="icon" for="<?= $row[0] ?>">+</label>
                                            <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>">
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                        
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title">
                            <label>Spaghetti</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("SPAGHETTI") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="picture">
                                        <img src="../menuImage/<?= $row[5] ?>" alt="tenderloin" />
                                    </div>
                                    <div class="card-container-info">
                                        <p class="menu-title"><?= $row[2] ?></p>
                                        <p class="menu-info"><?= $row[3] ?></p>
                                        <div class="card-container-amount">
                                            <p><?= $row[4] ?></p>                                         
                                                <label class="icon" for="<?= $row[0] ?>">+</label>
                                                <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>">
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title">
                            <label>Snack</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("SNACK") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="picture">
                                        <img src="../menuImage/<?= $row[5] ?>" alt="tenderloin" />
                                    </div>
                                    <div class="card-container-info">
                                        <p class="menu-title"><?= $row[2] ?></p>
                                        <p class="menu-info"><?= $row[3] ?></p>
                                        <div class="card-container-amount">
                                            <p><?= $row[4] ?></p>
                                            <label class="icon" for="<?= $row[0] ?>">+</label>
                                            <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>">
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title">
                            <label>Tea</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("TEA") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="picture">
                                        <img src="../menuImage/<?= $row[5] ?>" alt="tenderloin" />
                                    </div>
                                    <div class="card-container-info">
                                        <p class="menu-title"><?= $row[2] ?></p>
                                        <p class="menu-info"><?= $row[3] ?></p>
                                        <div class="card-container-amount">
                                            <p><?= $row[4] ?></p>
                                            <label class="icon" for="<?= $row[0] ?>">+</label>
                                            <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>">
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title">
                            <label>Coffee</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("COFFEE") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="picture">
                                        <img src="../menuImage/<?= $row[5] ?>" alt="tenderloin" />
                                    </div>
                                    <div class="card-container-info">
                                        <p class="menu-title"><?= $row[2] ?></p>
                                        <p class="menu-info"><?= $row[3] ?></p>
                                        <div class="card-container-amount">
                                            <p><?= $row[4] ?></p>
                                            <label class="icon" for="<?= $row[0] ?>">+</label>
                                            <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>">
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>
                
                <button type="submit" class="cartLogo">TAS</button>

            </form>
            
        </main>
    </body>

    <script>

    </script>
</html>
