<?php include "header.php"; ?>
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
                <li>
                    <a href="family_details.php"><i class="las la-user-friends la-lg"></i> Taarifa za Watoto</a>
                </li>
                <li class="current">
                    <a href="religious_details.php"><i class="las la-church la-lg"></i> Taarifa za Kiimani</a>
                </li>
                <li>
                    <a href="../index.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="main-area">
        <form action="#" class="input-form">
            <div class="tab personal-info">
                <div class="input-group">
                    <select name="is_graduate" id="is_graduate">
                        <option value="" selected hidden disabled>Je ni mhitimu? </option>
                        <option value="true">Ndio</option>
                        <option value="false">Hapana</option>

                    </select>
                </div>
                <div class="input-group">
                    <select name="has_bible_knowledge" id="has_bible_knowledge">
                        <option value="" selected hidden disabled>Je una mafunzo ya Biblia? </option>
                        <option value="true">Ndio</option>
                        <option value="false">Hapana</option>

                    </select>
                </div>
                <div class="input-group">
                    <input type="text" name="date_aict" id="date_aict" placeholder="Tarehe ya kujiunga AICT Kongowe" onclick="(this.type = 'date')" autocomplete="off">
                </div>
                <div class="input-group">
                    <input type="text" name="date_salvation" id="date_salvation" placeholder="Tarehe ya Kuokoka" onclick="(this.type = 'date')" autocomplete="off">
                </div>
                <div class="input-group">
                    <input type="text" name="date_baptism" id="date_aict" placeholder="Tarehe ya Kubatizwa" onclick="(this.type = 'date')" autocomplete="off">
                </div>
                <div class="input-group">
                    <input type="text" name="baptism_location" id="baptism_location" placeholder="Mahali Ulikobatizwa">
                </div>
            </div>
            <div class="tab contact-details">
                <div class="input-group">
                    <textarea name="reason" id="reason" cols="30" rows="10" placeholder="Sababu ya Kumuamini Yesu awe Bwana na Mwokozi wa maisha yako"></textarea>
                </div>
                <div class="input-group">
                    <input type="text" name="prefered_work" id="prefered_work" placeholder="Kazi unayopenda kanisani">
                </div>
                <div class="input-group">
                    <select name="prefered_section" id="prefered_section">
                        <option value="" disabled selected hidden>Kamati unayopenda kushiriki</option>
                        <option value="">Usafi</option>
                        <option value=""> Usafi </option>
                        <option value="">Usafi</option>
                        <option value="">Usafi</option>
                    </select>
                </div>
            </div>
            <div class="tab submit-section">
                <div class="photo-details">
                    <div class="photo-area">
                        <img src="images/logo.png" alt="User Photo">
                    </div>
                </div>
                <div class="input-group">
                    <button type="submit" class="submit-btn" name="submit" id="submit-btn">
                        <i class="las la-save la-lg"></i> Hifadhi
                    </button>
                </div>
            </div>

        </form>

        <?php include "footer.php"; ?>