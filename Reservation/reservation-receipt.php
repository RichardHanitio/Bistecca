<?php
    session_start();
    require_once("../db.php");
    require_once("../public/TCPDF-main/tcpdf.php");
    
    $id = $_GET["reservationid"];
    $email = $_SESSION["email"];

    function fetchReservationById() {
        global $conn, $id;
        $query = mysqli_query($conn, "SELECT * FROM reservation WHERE id_reservation='".$id."'");
        $row = mysqli_fetch_assoc($query);

        $output = '
            <tr><td>Reservation ID</td><td width="20">:</td><td>'.$row["id_reservation"].'</td></tr>
            <tr><td>Date</td><td>:</td><td>'.$row["date"].'</td></tr>
            <tr><td>Time</td><td>:</td><td>'.$row["time"].'</td></tr>
            <tr><td>Location</td><td>:</td><td>'.$row["location"].'</td></tr>
            <tr><td>Guest</td><td>:</td><td>'.$row["guest"].'</td></tr>
        ';

        return $output;
    }

    function fetchUserByEmail() {
        global $conn, $email;
        $query = mysqli_query($conn, "SELECT * FROM user WHERE email='".$email."'");
        $row = mysqli_fetch_assoc($query);

        $output = '
            <tr><td>Email</td><td width="20">:</td><td>'.$row["email"].'</td></tr>
            <tr><td>Name</td><td>:</td><td>'.$row["name"].'</td></tr>
            <tr><td>Phone Number</td><td>:</td><td>'.$row["phone_num"].'</td></tr>
        ';

        return $output;
    }

    function fetchOrdersByReservation() {
        global $conn, $id;
        $query = mysqli_query($conn, "SELECT id_order FROM main WHERE id_reservation='".$id."'");
        // $rows = mysqli_fetch_assoc($query);
        $output='';
        $total = 0;
        while($row = mysqli_fetch_assoc($query)) {
            $query2 = mysqli_query($conn, "SELECT menu.name, menu.price, orders.amount, menu.discount FROM orders JOIN menu ON orders.id_menu = menu.id_menu WHERE id_order='".$row["id_order"]."'");
            $row2 = mysqli_fetch_assoc($query2);
            $output .= '
                <tr><td>'.$row2["name"].'</td><td>'.$row2["amount"].'</td><td>Rp'.discountPrice($row2["price"], $row2["discount"]) * $row2["amount"].'</td></tr>
            ';
            $total+=discountPrice($row2["price"], $row2["discount"]) * (int)$row2["amount"];
        }

        $output .= '
            <br>
            <tr><td><strong><h3>Total</h3></strong></td><td></td><td><strong><h3>Rp'.$total.'</h3></strong></td></tr>
        ';

        return $output;
    }

    $pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);

    $pdf->SetCreator(PDF_CREATOR);
    $pdf->SetTitle(PDF_HEADER_TITLE);
    $pdf->SetHeaderData("../images/bistecca1.jpg", 40 , "Bistecca Reservation Receipt", PDF_HEADER_STRING , array(0,0,0), array(0,0,0));

    $pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
    $pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

    $pdf->setMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
    $pdf->setHeaderMargin(PDF_MARGIN_HEADER);
    $pdf->setFooterMargin(PDF_MARGIN_FOOTER);

    $pdf->setPrintHeader(true);
    $pdf->setPrintFooter(true);
    $pdf->SetAutoPageBreak(true, 10);

    $pdf->AddPage(); 

    $html = '';

    $html .= "<h2>User Details</h2>";
    $html .= '<table>';
    $html .= fetchUserByEmail();
    $html .= "</table>";

    $html .="<br>";

    $html .= "<h2>Reservation Details</h2>";
    $html .= '<table>';
    $html .= fetchReservationById();
    $html .= "</table>";

    $html .="<br>";
    
    $html .= "<h2>------------------------------------ Menu Ordered ------------------------------------</h2>";
    $html .= '<table>';
    $html .= "<tr height=\"10\"><th><strong>Name</strong></th><th><strong>Qty</strong></th><th><strong>Price</strong></th></tr>";
    $html .= "<br>";
    $html .= fetchOrdersByReservation();
    $html .= "</table>";
    $html .= "<h2>------------------------------------ Check Closed ------------------------------------</h2>";
    
    $html .="<br>";
    
    $html .="<p style=\"text-align:center;\">";
    $html .= date("Y-m-d H:i:s");
    $html .="</p>";
    
    $html .="<br>";
    
    $html .= "<p style=\"text-align:center;\">All Price are inclusive Tax</p>";
    $html .= "<p style=\"text-align:center;\">Jl. Letjen S Parman No. 58, Petisah Tengah, Kec. Medan Petisah, Kota Medan, Sumatera Utara 20111</p>";


    // $html = <<<EOD
    //     <p>Write Receipt Details here</p>
    // EOD;

    $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

    ob_end_clean();

    $pdf->Output('bistecca-receipt.pdf', 'I');

?>