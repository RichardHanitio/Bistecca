<?php require_once("../lib.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reservation.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,700;1,400&family=Inria+Serif:wght@400;700&display=swap" rel="stylesheet">
    <title>Bistecca | Reservation</title>
</head>

<body>
    <?php require "../Navbar/navbar.php" ?>
    <form action="reservation-db.php" method="POST">
        <?php
            if(isset($_POST["id_menu"])) {
                echo '
                    <section class="cart-container box">
                        <h1 class="cart-title">Cart</h1>
                ';
                $id_menu = $_POST['id_menu'];
                $total = 0;
                $arr_orders = array();
                foreach($id_menu as $id){
                    // masukkan ke db orders
                    $id_order = generateNextId("orders", "id_order");

                    array_push($arr_orders, $id_order);
                    
                    $getprice = mysqli_query($conn, "SELECT price FROM menu WHERE id_menu = '$id'");
                    $pricerow = mysqli_fetch_assoc($getprice);
                    $price = (int)$pricerow["price"];
                    $amount = 1;
                    
                    $stmt = $conn->prepare("INSERT INTO orders VALUES(?,?,?,?)");
                    $stmt->bind_param("ssii", $id_order, $id, $amount, $price);
                    $stmt->execute();

                    // tampilkan menu ke layar & hitung total
                    $getmenu = mysqli_query($conn, "SELECT * FROM menu WHERE id_menu = '$id'");
                    while($menu = mysqli_fetch_assoc($getmenu)) { 
                            $total+=(int)$menu["price"];
                        ?>
                        <div class="cart-container inside-cart-container" id="<?php echo $id ?>" >
                            <div class="quantity">
                                <button type="button" class="btn-quantity btn-quantity-minus" onclick="
                                    handleAmount('-',this.parentNode.parentNode);
                                    ">-</button>
                                <span class="amount">1</span>
                                <input type="hidden" name="amount[<?=$id_order?>]" class="hidden-amount" value="1">
                                <button type="button" class="btn-quantity btn-quantity-plus" onclick="
                                    handleAmount('+',this.parentNode.parentNode);
                                ">+</button>
                            </div>
                            <div class="image-container">
                                <img src="../menuImage/<?= $menu["image"] ?>">
                                <p class="menu-name"><?= $menu["name"] ?></p>
                            </div>
                            <div class="amount">
                                <p class="amount-nominal">Rp<span class="nominal"><?= $menu["price"] ?></span></p>
                            </div>
                        </div>
                        
                    <?php
                    }
                }
                echo '
                        <hr/>
                        <div class="container-subtotal" >
                            <p class="total">Total</p>
                            <div class="subtotal">Rp<span class="total-nominal">'.$total.'</span></div>
                        </div>
                    ';
                $_SESSION["orders"] = $arr_orders;
            }
        ?>
            
        </section>

        <section class="reservation">
            <div class="banner">Reservation</div>
            <div class="reservation-container">
                <div class="reservation-info">
                    <div class="card a">
                        <img src="../images/Calendar.png" alt="">
                        <div class="icon-info">Reservation Date</div>
                        <input type="date" name="reservation_date" id="" required>
                    </div>
                    <div class="card b">
                        <img src="../images/Clock.png" alt="">
                        <div class="icon-info">Time</div>
                        <select name="reservation_time" id="" required>
                            <option value="07:00">07:00</option>
                            <option value="12:30">12:30</option>
                            <option value="17:00">17:00</option>
                            <option value="21:00">21:00</option>
                        </select>

                    </div>
                    <div class="card c">
                        <img src="../images/Guest.png" alt="">
                        <div class="icon-info">Num of Guest</div>
                        <input type="number" name="reservation_guest" id="" min="1" required>
                    </div>
                    <div class="card d">
                        <img src="../images/Location-logo.png" alt="">
                        <div class="icon-info">Location</div>
                        <select name="reservation_location" id="" required>
                            <option value="Italian Greenville">Italian Greenville</option>
                            <option value="Carrolwood">Carrolwood</option>
                            <option value="Coral Springs">Coral Springs</option>
                            <option value="Daytona">Daytona</option>
                            <option value="Gainsville">Gainsville</option>
                            <option value="Jacksonville">Jacksonville</option>
                            <option value="Kissimmee">Kissimmee</option>
                            <option value="Longwood">Longwood</option>
                            <option value="Orange Park">Orange Park</option>
                            <option value="South Tampa">South Tampa</option>
                        </select>
                    </div>
                    <button type="button" class="btn btn-reserve" onclick="choosePaymentMethod()">RESERVE</button>
                    <div class="pop-up pop-up-payment">
                        <div class="pop-up-container pop-up-container-payment">
                            <svg width="25" height="25" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="pop-up-close pop-up-close-payment" onclick="closePaymentPopUp()">
                                <path d="M17.25 17.25 6.75 6.75"></path>
                                <path d="m17.25 6.75-10.5 10.5"></path>
                            </svg>
                            <div class="pop-up-inner-container pop-up-inner-container-payment">
                                <div class="title pop-up-title pop-up-title-payment">Choose Your Payment Method</div>
                                <div class="logos">
                                    <button type="submit" class="logo logo-ovo" name="reserve-ovo">
                                        <!-- <img src="../images/ovo.png" alt="ovo" onclick="window.location.href='../Notification/notification.php?notif=checkout'" /> -->
                                        <img src="../images/ovo.png" alt="ovo"  />
                                    </button>
                                    <button type="submit" class="logo logo-bca" name="reserve-bca">
                                        <img src="../images/bca.png" alt="bca" />
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</body>
</html>


<script src="../script.js" defer></script>
<script src="./reservation.js" defer></script>