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
    <div class="main-area">
        <form action="#" class="input-form family-form">
            <div class="tab family-info">
                <div class="input-group">
                    <input type="text" placeholder="Jina la Mtoto" name="fullname">
                </div>
                <div class="input-group">
                    <select name="gender" id="gender">
                        <option value="" selected hidden disabled>Jinsi</option>
                        <option value="m">Me</option>
                        <option value="f">Ke</option>
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
                    <button type="submit" class="submit-btn" name="submit" id="submit-btn">
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
                    <tr>
                        <td>John Lenin</td>
                        <td>10</td>
                        <td>Me</td>
                        <td>Ndio</td>
                    </tr>
                    <tr>
                        <td>Sarah palin</td>
                        <td>12</td>
                        <td>Ke</td>
                        <td>hapana</td>
                    </tr>
                    <tr>
                        <td>Josh Hamelton</td>
                        <td>15</td>
                        <td>Me</td>
                        <td>Ndio</td>
                    </tr>
                    <tr>
                        <td>Wendy Anderson</td>
                        <td>8</td>
                        <td>Ke</td>
                        <td>Ndio</td>
                    </tr>

                </tbody>
            </table>

        </form>


        <?php include "templates/footer.php"; ?>