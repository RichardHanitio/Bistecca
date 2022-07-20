<?php require_once("../lib.php"); ?>

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
            <form action="menu-selected.php" method="post">
                <section>
                    <div class="container menu-container">
                        <div class="title menu-main-title">
                            <label>Steak</label>
                        </div>

                        <div class="background-container">
                            <?php 
                                $table = selectCategoryMenu("STEAK"); 
                                while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="card-inner-container">
                                        <div class="picture">
                                            <img src="../menuImage/<?= $row[5] ?>"/>
                                        </div>
                                        <div class="card-container-info">
                                            <p class="menu-title"><?= $row[2] ?></p>
                                            <p class="menu-info desc" ><?= chop_string($row[3]) ?></p>
                                            <div class="card-container-amount">
                                                <p class="menu-price">Rp<?= $row[4] ?></p>
                                                <?php if(is_logged_in()) { ?>
                                                    <label class="icon" for="<?= $row[0] ?>">+</label>;
                                                    <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>" onchange="updateCount(this)">;
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                        
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title menu-main-title">
                            <label>Spaghetti</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("SPAGHETTI") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="card-inner-container">
                                        <div class="picture">
                                            <img src="../menuImage/<?= $row[5] ?>"/>
                                        </div>
                                        <div class="card-container-info">
                                            <p class="menu-title"><?= $row[2] ?></p>
                                            <p class="menu-info desc" ><?= chop_string($row[3]) ?></p>
                                            <div class="card-container-amount">
                                                <p class="menu-price">Rp<?= $row[4] ?></p>
                                                <?php if(is_logged_in()) { ?>
                                                    <label class="icon" for="<?= $row[0] ?>">+</label>;
                                                    <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>" onchange="updateCount(this)">;
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title menu-main-title">
                            <label>Snack</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("SNACK") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="card-inner-container">
                                        <div class="picture">
                                            <img src="../menuImage/<?= $row[5] ?>"/>
                                        </div>
                                        <div class="card-container-info">
                                            <p class="menu-title"><?= $row[2] ?></p>
                                            <p class="menu-info desc" ><?= chop_string($row[3]) ?></p>
                                            <div class="card-container-amount">
                                                <p class="menu-price">Rp<?= $row[4] ?></p>
                                                <?php if(is_logged_in()) { ?>
                                                    <label class="icon" for="<?= $row[0] ?>">+</label>;
                                                    <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>" onchange="updateCount(this)">;
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>

                <section>
                    <div class="container menu-container">
                        <div class="title menu-main-title">
                            <label>Drinks</label>
                        </div>

                        <div class="background-container">
                            <?php $table = selectCategoryMenu("DRINKS") ; while( $row = mysqli_fetch_array($table)) {?>
                                <div class="card-container">
                                    <div class="card-inner-container">
                                        <div class="picture">
                                            <img src="../menuImage/<?= $row[5] ?>"/>
                                        </div>
                                        <div class="card-container-info">
                                            <p class="menu-title"><?= $row[2] ?></p>
                                            <p class="menu-info desc" ><?= chop_string($row[3]) ?></p>
                                            <div class="card-container-amount">
                                                <p class="menu-price">Rp<?= $row[4] ?></p>
                                                <?php if(is_logged_in()) { ?>
                                                    <label class="icon" for="<?= $row[0] ?>">+</label>;
                                                    <input type="checkbox" name="id_menu[]" id="<?= $row[0] ?>" value="<?= $row[0] ?>" onchange="updateCount(this)">;
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>     
                            <?php } ?>
                        </div>
                    </div>
                </section>
                
                <?php 
                    if(is_logged_in()) {
                        echo '
                            <button type="submit" class="cartLogo">
                                <svg width="40" height="40" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M8.25 21a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
                                    <path d="M18.75 21a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3Z"></path>
                                    <path d="M7.865 14.25h12.25l1.8-9H6.276L5.88 3H1.5v1.5h3.12l2.25 12.75h13.38v-1.5H8.13l-.265-1.5Z"></path>
                                </svg>
                                <div class="notif">0<div>
                            </button>
                        ';
                    }
                ?>
            </form>            
        </main>
    </body>

</html>

<script src="menu.js"></script>
