<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="payment.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:ital,wght@0,700;1,400&family=Inria+Serif:wght@400;700&display=swap" rel="stylesheet">
    <title>Payment Method</title>
</head>
<body>
    <nav>
        <div class="container navbar-container">
            <div class="navbar-logo">
                <img src="/images/bistecca-logo-white.png" />
            </div>
            <div class="navbar-links">
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Menu</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </div>
            <div class="navbar-reserve">
                <input
                    type="button"
                    value="Reservations"
                    class="btn navbar-reserve-btn"
                />
            </div>
        </div>
    </nav>
    
    <button class="back">Back</button>
    <div class="reservation-container">
        <h1>Reservation Information</h1>
        <div class="information-container">
            <div class="card">
                <img src="Calendar.png" alt="">
                <div class="icon-info">Monday, 27<sup>th</sup> February 2022</div>
            </div>
            <div class="card">
                <img src="Clock.png" alt="">
                <div class="icon-info">17 : 00</div>
    
            </div>
            <div class="card">
                <img src="Guest.png" alt="">
                <div class="icon-info">2 People</div>

            </div>
            <div class="card">
                <img src="Location.png" alt="">
                <div class="icon-info">Italian Greenville</div>
            </div>
        </div>
        
        <div class="second-container">
            <div class="left">
                <div class="left-inner-container">
                    <h2>User Information</h2>
                    <div class="text">Name : Ricky</div>
                    <div class="text">Email : Rickycen123@gmail.com</div>
                    <div class="text">Phone Number : 085276759281</div>
                </div>
            </div>

            <div class="right">
                <h2>Choose Your Payment Method</h2>
                <div class="pay-method">
                    <button class="card-pay">
                        <img src="/images/ovo.png" alt="">
                        <div class="pay-info">OVO</div>
                    </button>
            
                    <button class="card-pay">
                        <img src="/images/gopay.png" alt="">
                        <div class="pay-info">gopay</div>
                    </button>
                </div>
            </div>
        </div>
       
    </div>
    
    
     
</body>
</html>