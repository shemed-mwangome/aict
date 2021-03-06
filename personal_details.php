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
<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<script>
    const maritalStatus = document.querySelector("#marital_status")
    let formData;

    const submitForm = document.getElementById("personal__info__form")
    const imageSelectorBtn = document.getElementById('user-photo-btn')
    const image__input = document.getElementById('photo__input')
    const user__image = document.getElementById('user__image')
    const form_controls = document.querySelectorAll(".form-control");



    const removeError = (e) => {
        let span = e.target.nextElementSibling
        span.style.display = "none";
    }

    const submitData = async (e) => {
        e.preventDefault()

        formData = new FormData(submitForm)

        const response = await fetch("operation.php", {
            method: "POST",
            body: formData
        })

        const result = await response.json();
        console.log(result);

    }

    const showThumbnail = (e) => {
        //Show thumbnails
        let file = image__input.files[0]
        let reader = new FileReader()
        reader.onload = (e) => {
            user__image.src = e.target.result

        }
        reader.readAsDataURL(file)

    }

    const selectFile = (e) => {
        e.preventDefault()
        image__input.click()
    }






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
            const result = await response.text();

            if (result) {
                console.log(result);
            }
        } catch (error) {
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


    fetchMaritalStatus()
    imageSelectorBtn.addEventListener('click', selectFile, false)
    image__input.addEventListener('change', showThumbnail, false)
    form_controls.forEach(form_control => form_control.addEventListener('focus', removeError, false))
</script>
</body>

</html>