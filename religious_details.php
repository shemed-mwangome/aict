<?php include "templates/header.php"; ?>
<?php

if (isset($_COOKIE["user_id"])) {
    $user_id = $_COOKIE["user_id"];
}

?>
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
                    <a href="index.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
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
            </div>
            <div class="tab contact-details">
                <div class="input-group">
                    <textarea name="reason" id="reason" cols="30" rows="10" placeholder="Sababu ya Kumuamini Yesu awe Bwana na Mwokozi wa maisha yako"></textarea>
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
                <div class="input-group">
                    <select name="prefered_section" id="prefered_section">
                        <option value="" disabled selected hidden>Kamati unayopenda kushiriki</option>
                        <option value="usafi">Usafi</option>
                        <option value="usafi"> Usafi </option>
                        <option value="usafi">Usafi</option>
                        <option value="usafi">Usafi</option>
                    </select>
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
                        <i class="las la-save la-lg"></i> Hifadhi
                    </button>
                </div>
            </div>

        </form>
    </div>

</main>
</div>

<?php include "templates/footer.php"; ?>>
<script>
    let user_id = document.querySelector("#user_id");
    let user_photo = document.querySelector("#user_photo");
    let default_photo = user_photo.src
    console.log(document.images);
    // Fetch user information
    let url = "operation.php";
    let data = new URLSearchParams()
    data.append('user_id', user_id.value)
    data.append('action', 'load_user')
    let options = {
        method: "POST",
        body: data
    }
    const loadUser = async () => {
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


    $(document).ready(function() {
        $(".date-input").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "1900:c"
        }).val();
    });

    loadUser()
</script>