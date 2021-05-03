<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

?>
<?php
// If user is not logged in return to login page - For operator of the page
if (!isset($_SESSION['isLogged'])) {
    header("Location: index.php");
    die();
}
// if your cookie is  set make it as user id and use it to insert child data to the reg form
if (isset($_COOKIE["user_id"])) {
    $user_id = $_COOKIE["user_id"];
} else {
    // if your cookie is not set return to the reg form
    // header("Location: personal_details.php");
    // die();
}


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
                            <a href="dashboard.php"><i class="las la-home la-lg"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="personal_details.php"><i class="las la-user la-lg"></i> Taarifa Binafsi</a>
                        </li>
                        <li>
                            <a href="religious_details.php"><i class="las la-church la-lg"></i> Taarifa za Kiimani</a>
                        </li>
                        <li class="current">
                            <a href="family_details.php"><i class="las la-user-friends la-lg"></i> Taarifa za Watoto</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="main-area" data-page__title="family">
                <form action="operation.php" class="input-form family-form" method="POST" id="family-form">
                    <div class="tab family-info">
                        <div class="input-group">
                            <input type="text" placeholder="Namba ya simu ya Mzazi" name="phone_no" id="phone_no" value='<?php if (isset($_SESSION["child_data"]["phone_no"])) echo $_SESSION["child_data"]["phone_no"]; ?>' required>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Jina la Mzazi" name="parent_name" readonly id="parent_name" value='<?php if (isset($_SESSION["child_data"]["parent_name"])) echo $_SESSION["child_data"]["parent_name"]; ?>'>
                        </div>
                        <div class="input-group">
                            <input type="text" placeholder="Jina la Mtoto" name="child_name" id="fullname" class="form-control" value='<?php if (isset($_SESSION["child_data"]["child_name"])) echo $_SESSION["child_data"]["child_name"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["child_errors"]["child_name"])) {
                                    echo $_SESSION["child_errors"]["child_name"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <select name="child_gender" id="gender" class="form-control">
                                <option value="" selected hidden disabled>Jinsi</option>
                                <option value="" selected hidden disabled>Jinsi</option>
                                <option <?php
                                        if (isset($_SESSION["child_data"]["child_gender"]) && $_SESSION["child_data"]["child_gender"] == "me") {
                                            echo "selected";
                                        }
                                        ?> value="me">me</option>
                                <option <?php
                                        if (isset($_SESSION["child_data"]["child_gender"]) && $_SESSION["child_data"]["child_gender"] == "ke") {
                                            echo "selected";
                                        }
                                        ?> value="ke">ke</option>
                            </select>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["child_errors"]["child_gender"])) {
                                    echo $_SESSION["child_errors"]["child_gender"];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="tab">
                        <div class="input-group">
                            <input type="number" min="0" placeholder="Umri" name="child_age" id="age" class="form-control" value='<?php if (isset($_SESSION["child_data"]["child_age"])) echo $_SESSION["child_data"]["child_age"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["child_errors"]["child_age"])) {
                                    echo $_SESSION["child_errors"]["child_age"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <select name="child_location" id="is_staying_home" class="form-control">
                                <option value="" selected hidden disabled>Je anaishi nyumbani?</option>
                                <option <?php
                                        if (isset($_SESSION["child_data"]["child_location"]) && $_SESSION["child_data"]["child_location"] == "ndio") {
                                            echo "selected";
                                        }
                                        ?> value="ndio">ndio</option>
                                <option <?php
                                        if (isset($_SESSION["child_data"]["child_location"]) && $_SESSION["child_data"]["child_location"] == "hapana") {
                                            echo "selected";
                                        }
                                        ?> value="hapana">hapana</option>
                            </select>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["child_errors"]["child_location"])) {
                                    echo $_SESSION["child_errors"]["child_location"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="hidden" name="parent_id" id="parent_id" value='<?php if (isset($user_id)) echo $user_id; ?>'>
                            <input type="hidden" name="action" value="register_children">
                            <button type="submit" class="submit-btn" name="family_submit" id="submit-btn" value="Submit">
                                <i class="las la-save la-lg"></i> Hifadhi
                            </button>
                        </div>

                    </div>
                    <div class="tab submit-section">
                        <div class="photo-details">
                            <div class="photo-area">
                                <img src="images/logo.png" alt="User Photo" id="parent_photo">
                            </div>
                        </div>
                    </div>
                    <table class="children-details">
                        <thead>
                            <tr>
                                <th>Jina la Mtoto</th>
                                <th>Jinsi</th>
                                <th>Umri</th>
                                <th>Je anaishi nyumbani?</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="display-data">
                            <tr id="no-data">
                                <td colspan="5">
                                    <h1>Hakuna Taarifa</h1>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </form>

            </div>

        </main>
    </div>
    <script src="../resources/jquery/jquery.js"></script>
    <script src="../resources/jquery-ui/jquery-ui.min.js"></script>
    <script src="../resources/popper/popper.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="../scripts/main.js"></script>
    <!-- Custom scripts -->
    <script>



    </script>
</body>

</html>