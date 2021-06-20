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


// If user cookie is set set it as user id and will use it to fetch user info
if (isset($_COOKIE["user_id"])) {
    $user_id = $_COOKIE["user_id"];
} else {
    // // if your cookie is not set return to the reg form
    // header("Location: personal_details.php");
    // die();
}

?>


<?php include "templates/header.php"; ?>

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
                <li class="current">
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
    <div class="main-area" data-page__title="religion">
        <form action="operation.php" class="input-form" method="POST">
            <div class="tab personal-info">
                <div class="input-group">
                    <select name="is_graduate" id="is_graduate">
                        <option value="" selected hidden disabled>Je ni mhitimu? </option>
                        <option value="ndio">Ndio</option>
                        <option value="hapana">Hapana</option>
                    </select>
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <select name="has_bible_knowledge" id="has_bible_knowledge">
                        <option value="" selected hidden disabled>Je una mafunzo ya Biblia? </option>
                        <option value="ndio">Ndio</option>
                        <option value="hapana">Hapana</option>

                    </select>
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="joined_date" id="date_aict" class="date-input" placeholder="Tarehe ya kujiunga AICT Kongowe" onclick="(this.type = 'date')" autocomplete="off">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="salvation_date" id="date_salvation" class="date-input" placeholder="Tarehe ya Kuokoka" onclick="(this.type = 'date')" autocomplete="off">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="baptism_date" id="date_baptism" class="date-input" placeholder="Tarehe ya Kubatizwa" onclick="(this.type = 'date')" autocomplete="off">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="baptism_location" id="baptism_location" placeholder="Mahali Ulikobatizwa">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="prefered_work" id="prefered_work" placeholder="Kazi unayopenda kanisani">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="tab contact-details">
                <div class="input-group">
                    <textarea name="reason" id="reason" cols="30" rows="5" placeholder="Sababu ya Kumuamini Yesu awe Bwana na Mwokozi wa maisha yako"></textarea>
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>

                <div class="input-group">
                    <select name="prefered_section" id="prefered_section">
                        <option value="" disabled selected hidden>Kamati unayopenda kushiriki</option>
                    </select>
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="leadership_type" id="leadership_type" placeholder="Uongozi kanisani">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <input type="text" name="special_needs" id="special_needs" placeholder="Mahitaji Maalumu">
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
                <div class="input-group">
                    <textarea name="description" id="description" cols="30" rows="3" placeholder="Maelezo Mengine"></textarea>
                    <span class="error">
                        <?php
                        if (isset($_SESSION["child_errors"]["child_name"])) {
                            echo $_SESSION["child_errors"]["child_name"];
                        }
                        ?>
                    </span>
                </div>
            </div>
            <div class="tab submit-section">
                <div class="photo-details">
                    <div class="photo-area">
                        <img src="images/logo.png" alt="User Photo" id="user_photo">
                    </div>
                </div>
                <div class="input-group">
                    <input type="hidden" name="action" value="register_religion">
                    <input type="hidden" name="user_id" id="user_id" value='<?php if (isset($user_id)) echo $user_id; ?>'>
                    <button type="submit" class="submit-btn" name="submit" id="submit-btn">
                        <i class="las la-save la-lg"></i> Endelea
                    </button>

                </div>
            </div>

        </form>
    </div>

</main>
</div>

<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        $(".date-input").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:c"
        }).val();
    });


    let user_id = document.querySelector("#user_id");
    let user_photo = document.querySelector("#user_photo");
    let default_photo = user_photo.src

    const loadUser = async () => {
        // Fetch user information
        let url = "operation.php";
        let data = new URLSearchParams()
        data.append('user_id', user_id.value)
        data.append('action', 'load_user')
        let options = {
            method: "POST",
            body: data
        }
        try {
            const response = await fetch(url, options);
            const result = await response.json()
            if (result) {
                user_photo.src = result.photo;
            }
        } catch (error) {
            user_photo.src = default_photo;
            console.log(error);
        }

    }

    const fetchSection = async () => {
        let prefered_section = document.querySelector("#prefered_section");
        let output = ""
        let url = "operation.php";
        let data = new URLSearchParams()
        data.append('action', 'fetch_section')
        let options = {
            method: "POST",
            body: data
        }

        try {
            const response = await fetch(url, options);
            const result = await response.json()
            output += `<option value="" disabled selected hidden>Kamati unayopenda kushiriki</option>`;

            if (result) {
                result.forEach(item => {
                    output += `<option value="${item.id}" >${item.name}</option>`;
                });

                document.querySelector("#prefered_section").innerHTML = output;
            }
        } catch (error) {
            console.log(error);
        }
    }



    loadUser()
    fetchSection()
</script>
</body>

</html>