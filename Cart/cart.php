
<!DOCTYPE html>
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Mulish:wght@700&display=swap"
            rel="stylesheet"
        />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="cart.css" />
        <link rel="stylesheet" href="styles.css" />
        <link rel="stylesheet" href="./menu.css" />
        <link rel="stylesheet" href="../global_styles.css" />
        <link rel="stylesheet" href="../Navbar/navbar.css" />
        <title>Bistecca | Cart </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <style>
        
    </style>
    <body>
    <?php require "../Navbar/navbar.php" ?>
        <section class="cart-container box">
            <h1 class="cart-title" >Cart</h1>
            <div class="cart-container inside-cart-container" >
                <div class="quantity">
                    <button class="btn-quantity">-</button>
                    <span>1</span>
                    <button class="btn-quantity">+</button>
                </div>
                <div class="image-container">
                    <img src="../images/tenderloin.png" alt="Tenderloin">
                    <p class="menu-name">Tenderloin Steak</p>
                </div>
                <div class="amount">
                    <p class="amount-nominal">Rp.500.000,00</p>
                </div>
            </div>
            <hr/>
            <div class="container-subtotal" >
                <p class="total">Total</p>
                <div class="subtotal">Rp.1.000.000,00</div>
            </div>

        </section>
        
        <script src="" async defer></script>
    </body>
</html>