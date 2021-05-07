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
                        <li class="current">
                            <a href="personal_details.php"><i class="las la-user la-lg"></i> Taarifa Binafsi</a>
                        </li>

                        <li>
                            <a href="religious_details.php"><i class="las la-church la-lg"></i> Taarifa za Kiimani</a>
                        </li>
                        <li>
                            <a href="family_details.php"><i class="las la-user-friends la-lg"></i> Taarifa za Watoto</a>
                        </li>
                        <li>
                            <a href="logout.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="main-area personal__page" data-page__title="personal" id="personal__page">
                <form action="operation.php" class="input-form" method="POST" id="personal__info__form" enctype="multipart/form-data">
                    <div class="tab personal-info">
                        <div class="input-group">
                            <input type="text" name="fullname" class="form-control" id="fullname" placeholder="Jina Kamili" value='<?php if (isset($_SESSION["userdata"]["fullname"])) echo $_SESSION["userdata"]["fullname"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["fullnameErr"])) {
                                    echo $_SESSION["errors"]["fullnameErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <select name="gender" id="gender" class="form-control">
                                <option value="" selected hidden disabled>Jinsi</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["gender"]) && $_SESSION["userdata"]["gender"] == "me") {
                                            echo "selected";
                                        }
                                        ?> value="me">me</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["gender"]) && $_SESSION["userdata"]["gender"] == "ke") {
                                            echo "selected";
                                        }
                                        ?> value="ke">ke</option>

                            </select>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["genderErr"])) {
                                    echo $_SESSION["errors"]["genderErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="dob" id="dob" class="form-control date-input" placeholder="Tarehe ya Kuzaliwa" onclick="(this.type = 'date');" autocomplete="off" value='<?php if (isset($_SESSION["userdata"]["dob"])) echo $_SESSION["userdata"]["dob"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["dobErr"])) {
                                    echo $_SESSION["errors"]["dobErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <select name="marital_status" id="marital_status" class="form-control">
                                <option value="" disabled selected hidden>Hali ya Ndoa</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["marital_status"]) && $_SESSION["userdata"]["marital_status"] == "single") {
                                            echo "selected";
                                        }
                                        ?> value="single">Sijaoa / Sijaolewa</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["marital_status"]) && $_SESSION["userdata"]["marital_status"] == "married") {
                                            echo "selected";
                                        }
                                        ?> value="married">Nimeoa / Nimeolewa</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["marital_status"]) && $_SESSION["userdata"]["marital_status"] == "divorced") {
                                            echo "selected";
                                        }
                                        ?> value="divorced">Mtalaka</option>
                                <option <?php
                                        if (isset($_SESSION["userdata"]["marital_status"]) && $_SESSION["userdata"]["marital_status"] == "widowed") {
                                            echo "selected";
                                        }
                                        ?> value="widowed">Mjane / Mgane</option>
                            </select>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["marital_statusErr"])) {
                                    echo $_SESSION["errors"]["marital_statusErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="spouse_name" id="spouse_name" class="form-control" placeholder="Jina la Mwenzi wa Ndoa" value='<?php if (isset($_SESSION["userdata"]["spouse_name"])) echo $_SESSION["userdata"]["spouse_name"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["spouse_nameErr"])) {
                                    echo $_SESSION["errors"]["spouse_nameErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="date_marriage" id="date_marriage" class="form-control date-input" placeholder="Tarehe ya Ndoa" onclick="(this.type = 'date')" autocomplete="off" value='<?php if (isset($_SESSION["userdata"]["date_marriage"])) echo $_SESSION["userdata"]["date_marriage"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["date_marriageErr"])) {
                                    echo $_SESSION["errors"]["date_marriageErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="parent_name" class="form-control" id="parent_name" placeholder="Jina la Mzazi / Mlezi" value='<?php if (isset($_SESSION["userdata"]["parent_name"])) echo $_SESSION["userdata"]["parent_name"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["parent_nameErr"])) {
                                    echo $_SESSION["errors"]["parent_nameErr"];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="tab contact-details">
                        <div class="input-group">
                            <input type="text" name="employer" id="employer" placeholder="Jina la Mwajiri" class="form-control" value='<?php if (isset($_SESSION["userdata"]["employer"])) echo $_SESSION["userdata"]["employer"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["employerErr"])) {
                                    echo $_SESSION["errors"]["employerErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="skills" id="skills" placeholder="Ujuzi" class="form-control" value='<?php if (isset($_SESSION["userdata"]["skills"])) echo $_SESSION["userdata"]["skills"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["skillErr"])) {
                                    echo $_SESSION["errors"]["skillErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="address" id="address" placeholder="Anuani" class="form-control" value='<?php if (isset($_SESSION["userdata"]["address"])) echo $_SESSION["userdata"]["address"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["addressErr"])) {
                                    echo $_SESSION["errors"]["addressErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="phone_no" id="phone_no" placeholder="Namba ya Simu" class="form-control" value='<?php if (isset($_SESSION["userdata"]["phone_no"])) echo $_SESSION["userdata"]["phone_no"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["phone_noErr"])) {
                                    echo $_SESSION["errors"]["phone_noErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email" placeholder="Anuani ya Barua Pepe" class="form-control" value='<?php if (isset($_SESSION["userdata"]["email"])) echo $_SESSION["userdata"]["email"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["emailErr"])) {
                                    echo $_SESSION["errors"]["emailErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="location" id="location" placeholder="Eneo unaloishi" class="form-control" value='<?php if (isset($_SESSION["userdata"]["location"])) echo $_SESSION["userdata"]["location"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["locationErr"])) {
                                    echo $_SESSION["errors"]["locationErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="street" id="street" placeholder="Mtaa" class="form-control" value='<?php if (isset($_SESSION["userdata"]["street"])) echo $_SESSION["userdata"]["street"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["streetErr"])) {
                                    echo $_SESSION["errors"]["streetErr"];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="input-group">
                            <input type="text" name="house_no" class="form-control" id="house_no" placeholder="Nyumba namba" value='<?php if (isset($_SESSION["userdata"]["house_no"])) echo $_SESSION["userdata"]["house_no"]; ?>'>
                            <span class="error">
                                <?php
                                if (isset($_SESSION["errors"]["house_noErr"])) {
                                    echo $_SESSION["errors"]["house_noErr"];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="tab submit-section">
                        <div class="photo-details">
                            <div class="photo-area">
                                <img src="images/logo.png" alt="User Photo" id="user__image">
                            </div>
                            <input type="file" name="user_photo" id="photo__input" accept="image/*">
                            <button for="user-photo" id="user-photo-btn" class="user-photo-btn"><i class="las la-camera la-lg"></i> Weka Picha</button>
                        </div>
                        <div class="input-group">
                            <button type="submit" class="submit-btn" name="personal_submit" id="submit-btn">
                                <i class="las la-save la-lg"></i> Endelea
                            </button>
                        </div>
                    </div>
            </div>

        </main>
    </div>
    <script src="../resources/jquery/jquery.js"></script>
    <script src="../resources/jquery-ui/jquery-ui.min.js"></script>
    <script src="../resources/popper/popper.js"></script>
    <script src="../resources/bootstrap/js/bootstrap.min.js"></script>
    <script src="../scripts/main.js"></script>
    <script>
        $(document).ready(function() {
            $(".date-input").datepicker({
                dateFormat: "yy-mm-dd",
                changeMonth: true,
                changeYear: true,
                yearRange: "1900:c"
            }).val();
        });

        const maritalStatus = document.querySelector("#marital_status")


        const fetchMaritalStatus = async (e) => {
            const url = 'operation.php'
            const data = new URLSearchParams();
            data.append('action', 'fetch_marital_status');

            let options = {
                method: 'POST',
                body: data
            }


            try {
                const response = await fetch(url, options);
                const result = await response.json();

                if (result) {
                    console.log(result);
                }
            } catch (error) {
                console.log(error);
            }
        }

        

        fetchMaritalStatus()
    </script>
</body>

</html>