<?php
require_once("./lib.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="styles.css" />
    <title>Bistecca | Home</title>
</head>

<body>
    <?php require "./Navbar/navbar.php" ?>

    <header>
        <div class="container header-container">
            <h1 class="header-title">
                <?php
                    if (!is_logged_in()) {
                        echo "The place where texture meets flavor";
                    } else {
                        echo "Hi, " . $_SESSION["name"];
                        echo "<p class='header-desc'>Have a taste of Bistecca today to make your day better :)</p>";
                    }
                ?>
            </h1>
            <div class="header-button">
                <input type="button" value="Order Now" class="btn header-button-btn" onclick="window.location.href='./Menu/menu.php'"/>
            </div>
        </div>
    </header>

    <main>
        <section class="who-section">
            <div class="container who-container">
                <div class="title who-title">Who we are</div>
                <div class="desc who-desc">
                    We are an Italian restaurant that serves all Italian
                    foods especially steaks. We strives to be the best
                    restaurant in every sense of the word. That’s why we
                    source our ingredients carefully and precisely, and put
                    our community at the center of everything we do.
                </div>
            </div>
        </section>

        <section class="special-section">
            <div class="container special-container">
                <div class="title special-title">
                    Special Offer Just for Today
                </div>
                <div class="special-menus">
                    <?php
                        $table = selectCategoryMenu("SPECIAL OFFER"); 
                        while( $row = mysqli_fetch_assoc($table)) {?>
                            <div class="special-menu">
                                <div class="container special-menu-container">
                                    <div class="special-menu-image">
                                        <img src="./menuImage/<?= $row["image"]?>"/>
                                    </div>
                                    <div class="desc special-menu-caption">
                                        <div class="special-menu-title">
                                            <?= $row["name"] ?>
                                        </div>
                                        <div class="special-menu-desc">
                                            <?= $row["description"] ?>
                                        </div>
                                        <div class="special-menu-price">
                                            <div>Rp<?=discountPrice($row["price"], $row["discount"])?></div>
                                            <div>Rp<?= $row["price"]?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php } ?>
                </div>
                <div class="special-order">
                    <input type="button" value="Order Now" class="btn special-order-btn" onclick="window.location.href='./Menu/menu.php'"/>
                </div>
            </div>
        </section>

        <section class="meet-section">
            <div class="container meet-container">
                <div class="title">Meet Our Chefs</div>
                <div class="meet-chefs">
                    <div class="meet-chef meet-chef-1">
                        <div class="meet-chef-image">
                            <img src="images/chef.jpeg" />
                        </div>
                        <div class="desc meet-chef-profile">
                            <div class="meet-chef-position">Head Chef</div>
                            <div class="meet-chef-name">
                                Chef Giovanni Di Lorenzo
                            </div>
                            <div class="meet-chef-desc">
                                Born in Rome, Italy, Giovanni had a very
                                strong pedigree of food in her blood. His
                                grandfather owned a restaurant, DDL Foodshow
                                in Beverly Hills, California.
                            </div>
                        </div>
                    </div>

                    <div class="meet-chef meet-chef-2">
                        <div class="meet-chef-image">
                            <img src="images/chef2.jpg" />
                        </div>
                        <div class="desc meet-chef-profile">
                            <div class="meet-chef-position">Head Chef</div>
                            <div class="meet-chef-name">
                                Chef Giovanni Di Lorenzo
                            </div>
                            <div class="meet-chef-desc">
                                Born in Rome, Italy, Giovanni had a very
                                strong pedigree of food in her blood. His
                                grandfather owned a restaurant, DDL Foodshow
                                in Beverly Hills, California.
                            </div>
                        </div>
                    </div>

                    <div class="meet-chef meet-chef-3">
                        <div class="meet-chef-image">
                            <img src="images/chef3.jpg" />
                        </div>
                        <div class="desc meet-chef-profile">
                            <div class="meet-chef-position">Head Chef</div>
                            <div class="meet-chef-name">
                                Chef Giovanni Di Lorenzo
                            </div>
                            <div class="meet-chef-desc">
                                Born in Rome, Italy, Giovanni had a very
                                strong pedigree of food in her blood. His
                                grandfather owned a restaurant, DDL Foodshow
                                in Beverly Hills, California.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="review-section">
            <div class="container review-container">
                <div class="review-caption">
                    <div class="title">Customer Review</div>
                    <div>What our customers say about us</div>
                </div>
                <div class="review-customers">
                    <div class="review-customer">
                        <div class="review-customer-image">
                            <img src="images/customer1.png" />
                        </div>
                        <div class="review-customer-caption">
                            <div class="review-customer-caption-double-quote">
                                <img src="/images/double-quotes.png" />
                            </div>
                            <div class="review-customer-caption-comment">
                                Bistecca is the best Italian restaurant in
                                the world. The food made by world class
                                chef, the place is aesthetic, everything is
                                just perfect.
                            </div>
                            <div class="review-customer-caption-name">
                                Richard Hanitio, CEO of Google
                            </div>
                        </div>
                    </div>
                    <div class="review-customer">
                        <div class="review-customer-image">
                            <img src="images/customer2.png" />
                        </div>
                        <div class="review-customer-caption">
                            <div class="review-customer-caption-double-quote">
                                <img src="/images/double-quotes.png" />
                            </div>
                            <div class="review-customer-caption-comment">
                                Bistecca is one of the best Italian
                                restaurant in the world. The food is really
                                awesome and the place also awesome.
                            </div>
                            <div class="review-customer-caption-name">
                                Calvin Wendy, Founder and CEO of Tesla
                            </div>
                        </div>
                    </div>
                    <div class="review-customer">
                        <div class="review-customer-image">
                            <img src="images/customer3.png" />
                        </div>
                        <div class="review-customer-caption">
                            <div class="review-customer-caption-double-quote">
                                <img src="/images/double-quotes.png" />
                            </div>
                            <div class="review-customer-caption-comment">
                                BISTECCA is the best reustaurant in the
                                world in my opinion. Everything we ate was
                                fresh and delicious. The award-winning chefs
                                use the best quality ingredients to produce
                                dishes that are simply delightful.
                            </div>
                            <div class="review-customer-caption-name">
                                Ricky , Founder and CEO of Universitas
                                Pelita Harapan
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer>
        <div class="container footer-container">
            <div class="footer-inner-container">
                <div class="footer-logo-sosmed">
                    <div class="footer-logo">
                        <img src="/images/bistecca-logo-white-horizontal.png" />
                    </div>
                    <div class="footer-sosmed">
                        <div class="footer-sosmed-title">Social Media : </div>
                        <div>
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M16 4H8a4 4 0 0 0-4 4v8a4 4 0 0 0 4 4h8a4 4 0 0 0 4-4V8a4 4 0 0 0-4-4Z"></path>
                                <path d="M12 15a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"></path>
                                <path d="M16.5 7.5v.001"></path>
                            </svg>
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="m3 20.999 1.65-3.8a9 9 0 1 1 3.4 2.9l-5.05.9"></path>
                                <path d="M9 10a.5.5 0 0 0 1 0V9a.5.5 0 1 0-1 0v1Zm0 0a5 5 0 0 0 5 5h1a.5.5 0 0 0 0-1h-1a.5.5 0 0 0 0 1"></path>
                            </svg>
                            <svg width="30" height="30" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 4.009c-1 .49-1.98.689-3 .99-1.121-1.265-2.783-1.335-4.38-.737S11.977 6.322 12 7.999v1c-3.245.083-6.135-1.395-8-4 0 0-4.182 7.433 4 11-1.872 1.247-3.739 2.088-6 2 3.308 1.803 6.913 2.423 10.034 1.517 3.58-1.04 6.522-3.723 7.651-7.742a13.84 13.84 0 0 0 .497-3.753c-.002-.249 1.51-2.772 1.818-4.013v.001Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="footer-menu">
                    <ul>
                        <li class="footer-title footer-menu-title">Menu</li>
                        <li>Steak</li>
                        <li>Sphagetti</li>
                        <li>Snacks</li>
                        <li>Tea</li>
                        <li>Coffee</li>
                    </ul>
                </div>
                <div class="footer-support">
                    <ul>
                        <li class="footer-title footer-support-title">Support</li>
                        <li>Contact Us</li>
                        <li>About Us</li>
                        <li>Location</li>
                        <li>Reservations</li>
                        <li>Gallery</li>
                    </ul>
                </div>
                <div class="footer-address-operational">
                    <div class="footer-address">
                        <div class="footer-title">Address :</div>
                        <div>
                            Jl. Letjen S Parman No. 58, Petisah Tengah, Kec.
                            Medan Petisah, Kota Medan, Sumatera Utara 20111
                        </div>
                    </div>
                    <div class="footer-operational">
                        <div class="footer-title">Operational Hours :</div>
                        <div>Monday - Sunday 08.00 - 23.00 (GMT+7)</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            Copyright © 2022 Bistecca. All rights reserved
        </div>
    </footer>

</body>

</html>

<script src="/script.js" defer></script>