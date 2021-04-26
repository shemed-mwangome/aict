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
                <li>
                    <a href="religious_details.php"><i class="las la-church la-lg"></i> Taarifa za Kiimani</a>
                </li>
                <li class="current">
                    <a href="family_details.php"><i class="las la-user-friends la-lg"></i> Taarifa za Watoto</a>
                </li>
                <li>
                    <a href="index.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
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
<?php include "templates/footer.php"; ?>