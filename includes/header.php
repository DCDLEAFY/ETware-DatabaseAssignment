<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/main.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>



<body class="bg-secondary">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

                <a class="navbar-brand nav-link" href="/index.php">ETWORLD<img src="/img/logo/Logo.png" alt="logo" width="80" height="80"></a>           
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pages/public/about.php">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" data-toggle="dropdown">
                            Products
                        </a>
                        <div class="dropdown-menu">

                            <a class="dropdown-item" href="/pages/public/Products/product_Desktops.php">Desktops</a>
                            <a class="dropdown-item" href="/pages/public/Products/product_Laptops.php">Laptops</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href=" /pages/public/Products/product_Peripherals.php">Peripherals</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                    <?php
                    if (isset($_SESSION['AccountID'])) {
                        echo '<li class="nav-item">
                                  <a class="nav-link" href="#">Cart
                                    <img src="/img/ico/basket.svg" class="img-fluid" style="width: 1rem;" alt="">
                                  </a>
                              </li>';
                    }
                    ?>

                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['AccountID'])) {
                            echo '<a class="nav-link" href="/includes/logout.inc.php">Logout</a>';
                        } else {
                            echo '<a class="nav-link" href="/pages/public/login.php">Login</a>';
                        }
                        ?>
                    </li>

                    <?php
                    
                    // function set_account_view($acc_role) {
                    //     if (isset($_SESSION['AccountID'])) {
                    //         include $_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php';
                    //         $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountRole` ='.$acc_role;
                    //         $stmt = mysqli_stmt_init($conn);
                    //         if (mysqli_stmt_prepare($stmt, $role_sql)) {
                    //             mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                    //             mysqli_stmt_execute($stmt);
                    //             mysqli_stmt_store_result($stmt);
                    //             $role_res = mysqli_stmt_num_rows($stmt);
                    //             if ($role_res == 1) {
                    //                 echo '<li class="nav-item">';
                    //                 echo '<a class="nav-link" href="/pages/"'.$acc_role.'"/index.php">Admin</a>';
                    //                 echo '</li>';
                    //             }
                    //         }
                    //     }
                    // }

                    // set_account_view('admin');
                    // set_account_view('staff');
                    // set_account_view('customer');
                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "admin"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="/pages/admin/index.php">Admin Portal</a>';
                                echo '</li>';
                            }
                        }
                    }

                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "staff"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="/pages/staff/index.php">Staff Portal</a>';
                                echo '</li>';
                            }
                        }
                    }
                    if (isset($_SESSION['AccountID'])) {
                        include_once($_SERVER['DOCUMENT_ROOT'] . '/includes/db.inc.php');
                        $role_sql = 'SELECT * FROM `Account` WHERE `AccountID`=? AND `AccountType` = "customer"';
                        $stmt = mysqli_stmt_init($conn);
                        if (mysqli_stmt_prepare($stmt, $role_sql)) {
                            mysqli_stmt_bind_param($stmt, "s", $_SESSION['AccountID']);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);
                            $role_res = mysqli_stmt_num_rows($stmt);
                            if ($role_res == 1) {
                                echo '<li class="nav-item">';
                                echo '<a class="nav-link" href="/pages/customer/index.php">Customer Portal</a>';
                                echo '</li>';
                            }
                        }
                    }
                    ?>
                </ul>
            </div>
        </nav>