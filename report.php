<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFRICAN INLAND CHURCH TANZANIA | DAYOSISI YA PWANI</title>
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="../resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="../resources/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="../styles/main.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <header id="banner">
            <div class="container flex">
                <div class="col-left">
                    <img src="../images/logo.png" alt="Logo">
                </div>
                <div class="col-right">
                    <h1 class="main-title">AFRICAN INLAND CHURCH TANZANIA - DAYOSISI YA PWANI</h1>
                    <h2 class="sub-title">MFUMO WA SENSA YA WAUMINI</h2>
                </div>
            </div>
        </header>
        <main class="main-content">
            <div class="sidebar">
                <p class="welcome-note">Welcome, <span>Seleman</span></p>
                <nav class="navbar">
                    <ul>
                        <li>
                            <a href="dashboard.php"><i class="las la-home la-lg" class="current"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="personal_details.php"><i class="las la-pen la-lg"></i> Usajili</a>
                        </li>
                        <li class="current">
                            <a href="report.php"><i class="las la-folder la-lg"></i> Ripoti</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="main-area">

            </div>
        </main>

        <script src="../resources/jquery/jquery.js"></script>
        <script src="../resources/jquery-ui/jquery-ui.min.js"></script>
        <script src="../resources/popper/popper.js"></script>
        <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
        <script src="../scripts/main.js"></script>
</body>

</html>