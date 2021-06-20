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


<?php include "templates/header.php"; ?>


<main class="main-content">
    <div class="sidebar">
        <p class="welcome-note">Welcome,
            <?php if (isset($_SESSION["user_logged"])) : ?>
                <span>
                    <?php echo $_SESSION["user_logged"]; ?>
                </span>
            <?php endif; ?>
        </>
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
                    <br>
                    <a href="dashboard.php" class="btn btn-danger text-uppercase" id="submit-btn">
                        <i class="las la-save la-lg"></i> Kamilisha
                    </a>
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
<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<!-- Custom scripts -->
<script>
    const phone_no = document.querySelector("#phone_no");
    const form_input = document.querySelectorAll(".form-control");

    const searchUser = async (e) => {
        let num = e.target.value

        let url = "operation.php"
        let data = new URLSearchParams();
        data.append("phone_no", num)
        data.append("action", "search_user")
        let options = {
            method: "POST",
            body: data
        }

        try {
            let response = await fetch(url, options)

            let result = await response.json();
            if (result !== false) {
                document.querySelector("#parent_name").value = result.fullname
                document.querySelector("#parent_id").value = result.id

                // Store parent id on localstorage
                localStorage.setItem("parent_id", result.id)
                document.querySelector("#parent_photo").src = result.photo

            } else {
                document.querySelector("#parent_name").value = ""
                document.querySelector("#parent_id").value = ""
                document.querySelector("#parent_id").value = "";
            }

        } catch (err) {
            console.log(err);
            console.log("No such user");
        }
    }

    const fetchChildren = async (e) => {
        let num = e.target.value
        let output = "";

        let url = "operation.php"
        let data = new URLSearchParams();
        data.append("action", "fetch_children")
        data.append("phone_no", num)
        let options = {
            method: "POST",
            body: data
        }
        try {
            let response = await fetch(url, options)
            let result = await response.json();

            if (result.length > 0) {
                console.log(result)
                result.forEach(item => {
                    output += `
                <tr>
                    <td>${item.fullname}</td>
                    <td>${item.gender}</td>
                    <td>${item.age}</td>
                    <td>${item.is_staying_home}</td>
                    <td class="action-item">
                        <a href="#" title="Edit" class="action"><i class="las la-pen la-lg" ></i></a>
                        <a href="#" title="Delete" class="action"><i class="las la-trash la-lg"></i></a>
                    </td>
                </tr>
            `
                });

            } else {
                output += `
                    <tr id="no-data">
                            <td colspan="5">
                                <h1>Hakuna Taarifa</h1>
                            </td>
                    </tr>`;
            }

            document.querySelector("#display-data").innerHTML = output;
        } catch (err) {
            output += `
                    <tr id="no-data">
                        <td colspan="5">
                            <h1>Hakuna Taarifa</h1>
                        </td>
                    </tr>`;
            document.querySelector("#display-data").innerHTML = output;
        }
    }


    phone_no.addEventListener("keyup", searchUser, false);
    phone_no.addEventListener("input", fetchChildren, false);
</script>
</body>

</html>