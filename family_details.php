<?php include "templates/header.php"; ?>
<main class="main-content">
    <div class="sidebar">
        <p class="welcome-note">Welcome, <span>Seleman</span></p>
        <div class="pager"></div>
        <nav class="navbar">
            <ul>
                <li>
                    <a href="dashboard.php"><i class="las la-home la-lg"></i> Dashboard</a>
                </li>
                <li>
                    <a href="personal_details.php"><i class="las la-user la-lg"></i> Taarifa Binafsi</a>
                </li>
                <li class="current">
                    <a href="family_details.php"><i class="las la-user-friends la-lg"></i> Taarifa za Watoto</a>
                </li>
                <li>
                    <a href="religious_details.php"><i class="las la-church la-lg"></i> Taarifa za Kiimani</a>
                </li>
                <li>
                    <a href="index.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="main-area" data-page__title="family">
        <form action="operation.php" class="input-form family-form" method="POST">
            <div class="tab family-info">
                <div class="input-group">
                    <input type="text" placeholder="Namba ya simu ya Mzazi" name="phone_no" id="phone_no">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Jina la Mzazi" name="parent_name" readonly id="parent_name">
                </div>
                <div class="input-group">
                    <input type="text" placeholder="Jina la Mtoto" name="fullname">
                </div>
                <div class="input-group">
                    <select name="gender" id="gender">
                        <option value="" selected hidden disabled>Jinsi</option>
                        <option value="me">me</option>
                        <option value="fe">ke</option>
                    </select>
                </div>
            </div>
            <div class="tab">
                <div class="input-group">
                    <input type="number" min="0" placeholder="Umri" name="age">
                </div>
                <div class="input-group">
                    <select name="is_staying_home" id="is_staying_home">
                        <option value="" selected hidden disabled>Je anaishi nyumbani?</option>
                        <option value="true">Ndio</option>
                        <option value="false">Hapana</option>
                    </select>
                </div>
                <div class="input-group">
                    <button type="submit" class="submit-btn" name="family_submit" id="submit-btn">
                        <i class="las la-save la-lg"></i> Hifadhi
                    </button>
                </div>

            </div>
            <div class="tab submit-section">
                <div class="photo-details">
                    <div class="photo-area">
                        <img src="images/logo.png" alt="User Photo">
                    </div>
                </div>
            </div>
            <table class="children-details">
                <thead>
                    <tr>
                        <th>Jina la Mtoto</th>
                        <th>Umri</th>
                        <th>Jinsi</th>
                        <th>Je anaishi nyumbani?</th>
                    </tr>
                </thead>
                <tbody>
                    <tr id="no-data">
                        <td colspan="4">
                            <h1>No data</h1>
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>


        <?php include "templates/footer.php"; ?>