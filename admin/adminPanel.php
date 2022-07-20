<?php 
    require_once "../lib.php";
    require_once "../db.php";

    if(!isset($_GET['keyword'])) $_GET['keyword'] = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adminStyle.css">
    <title>Admin Panel</title>
</head>
<body>
    <!-- Autentikasi Login Admin -->
    <?php if($_SESSION['isAdmin']) { ?>

        <div class="navAdmin">
            <div class="blank"></div>
            <a href="adminLogout.php">LOGOUT</a>
        </div>
        <div class="content">
            <aside>
                <a href="adminPanel.php?page=1" class="asi">User</a>
                <a href="adminPanel.php?page=2" class="asi">Menu</a>
                <a href="adminPanel.php?page=3" class="asi">Reservation</a>
                <a href="adminPanel.php?page=4" class="asi">Orders</a>
                <a href="adminPanel.php?page=5" class="asi">Main</a>
            </aside>

            <div class="container">
                <!-- user -->
                <?php if(!isset($_GET['page']) || $_GET['page'] == 1) {?>
                    <div class="container-side">
                        <a href="user/user_insert_form.php" class="btn">Tambah Data</a>
                        <form class="right" action="adminPanel.php" method="GET">
                            <input type="text" id="search" placeholder='Search Keyword . . .' name='keyword'>
                            <input type="hidden" name="page" value='1'>
                            <input type="submit" value="send" class="btn">    
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Password</th>
                            <th>PhoneNum</th>
                            <th>IsAdmin</th>
                            <th>edit</th>
                        </tr>
                        
                        <?php 
                            $table = selectTableUser("user", $_GET['keyword']);  
                            while($row = mysqli_fetch_array($table)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td><?= $row[4] ?></td>
                                <td>
                                    <a href="user/user.php?email=<?= $row[0] ?>">Hapus</a> 
                                    <a href="user/user_change_form.php?email=<?= $row[0] ?> &name=<?= $row[1] ?> &password=<?= $row[2] ?> &phone_num=<?= $row[3] ?> &is_admin=<?= $row[4] ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                <!-- menu -->
                <?php } else if ($_GET['page'] == 2) { ?>

                    <div class="container-side">
                        <a href="menu/menu_insert_form.php" class="btn">Tambah Data</a>
                        <form class="right" action="adminPanel.php" method="GET">
                            <input type="text" id="search" placeholder='Search Keyword . . .' name='keyword'>
                            <input type="hidden" name="page" value='2'>
                            <input type="submit" value="send" class="btn">    
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>id_menu</th>
                            <th>category</th>
                            <th>name</th>
                            <th>description</th>
                            <th>price</th>
                            <th>image</th>
                            <th>discount</th>
                            <th>edit</th>
                        </tr>
                        
                        <?php $table = selectTableMenu("menu", $_GET['keyword']);  while($row = mysqli_fetch_array($table)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td><?= $row[4] ?></td>
                                <td> <img src="../menuImage/<?= $row[5] ?>" alt=""></td>
                                <td><?= $row[6] ?></td>
                                <td>
                                    <a href="menu/menu.php?id_menu=<?= $row[0] ?>">Hapus</a> 
                                    <a href="menu/menu_change_form.php?id_menu=<?= $row[0] ?> &category=<?= $row[1] ?> &name=<?= $row[2] ?> &description=<?= $row[3] ?> &price=<?= $row[4] ?> &image=<?= $row[5] ?> &discount=<?= $row[6] ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                <!-- reservation -->
                <?php } else if ($_GET['page'] == 3) { ?>

                    <div class="container-side">
                        <a href="reservation/reservation_insert_form.php" class="btn">Tambah Data</a>
                        <form class="right" action="adminPanel.php" method="GET">
                            <input type="text" id="search" placeholder='Search Keyword . . .' name='keyword'>
                            <input type="hidden" name="page" value='3'>
                            <input type="submit" value="send" class="btn">    
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>id_reservation</th>
                            <th>date</th>
                            <th>time</th>
                            <th>location</th>
                            <th>guest</th>
                            <th>edit</th>
                        </tr>
                        
                        <?php $table = selectTableReservation("reservation", $_GET['keyword']);  while($row = mysqli_fetch_array($table)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td><?= $row[4] ?></td>
                                <td>
                                    <a href="reservation/reservation.php?id_reservation=<?= $row[0] ?>">Hapus</a> 
                                    <a href="reservation/reservation_change_form.php?id_reservation=<?= $row[0] ?> &date=<?= $row[1] ?> &time=<?= $row[2] ?> &location=<?= $row[3] ?> &guest=<?= $row[4] ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                <!-- orders -->
                <?php } else if ($_GET['page'] == 4) { ?>

                    <div class="container-side">
                        <a href="orders/orders_insert_form.php" class="btn">Tambah Data</a>
                        <form class="right" action="adminPanel.php" method="GET">
                            <input type="text" id="search" placeholder='Search Keyword . . .' name='keyword'>
                            <input type="hidden" name="page" value='4'>
                            <input type="submit" value="send" class="btn">    
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>id_order</th>
                            <th>id_menu</th>
                            <th>amount</th>
                            <th>subtotal</th>
                            <th>edit</th>
                        </tr>
                        
                        <?php $table = selectTableorders("orders", $_GET['keyword']);  while($row = mysqli_fetch_array($table)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td>
                                    <a href="orders/orders.php?id_order=<?= $row[0] ?>">Hapus</a> 
                                    <a href="orders/orders_change_form.php?id_order=<?= $row[0] ?> &id_menu=<?= $row[1] ?> &amount=<?= $row[2] ?> &subtotal=<?= $row[3] ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>


                <!-- main -->
                <?php } else if ($_GET['page'] == 5) { ?>

                    <div class="container-side">
                        <a href="main/main_insert_form.php" class="btn">Tambah Data</a>
                        <form class="right" action="adminPanel.php" method="GET">
                            <input type="text" id="search" placeholder='Search Keyword . . .' name='keyword'>
                            <input type="hidden" name="page" value='5'>
                            <input type="submit" value="send" class="btn">    
                        </form>
                    </div>
                    <table>
                        <tr>
                            <th>id_main</th>
                            <th>email</th>
                            <th>id_reservation</th>
                            <th>id_order</th>
                            <th>edit</th>
                        </tr>
                        
                        <?php $table = selectTableMain("main", $_GET['keyword']);  while($row = mysqli_fetch_array($table)) { ?>
                            <tr>
                                <td><?= $row[0] ?></td>
                                <td><?= $row[1] ?></td>
                                <td><?= $row[2] ?></td>
                                <td><?= $row[3] ?></td>
                                <td>
                                    <a href="main/main.php?id_main=<?= $row[0] ?>">Hapus</a> 
                                    <a href="main/main_change_form.php?id_main=<?= $row[0] ?> &email=<?= $row[1] ?> &id_reservation=<?= $row[2] ?> &id_order=<?= $row[3] ?>">Ubah</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </table>

                <?php } ?>

            </div>
        </div>

        

    <?php } else header("location: ../index.php");?>
</body>
</html>