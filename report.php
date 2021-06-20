<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

// If user is not logged in return to login page - For operator of the page
if (!isset($_SESSION['isLogged'])) {
    header("Location: index.php");
    die();
}


?>

<?php include "templates/header.php"; ?>
<main class="main-content">
    <div class="sidebar">
        <p class="welcome-note">Welcome,
            <?php if (isset($_SESSION["user_logged"])) : ?>
                <span>
                    <?php echo $_SESSION["user_logged"]; ?>
                </span>
            <?php endif; ?>
        </p>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="dashboard.php"><i class="las la-home la-lg"></i> Dashboard</a>
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

<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>