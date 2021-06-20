<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

// If user is not logged in return to login page - For operator of the page
if (!isset($_SESSION['isLogged'])) {
    header("Location: index.php");
    die();
}


?>


<?php include "templates/header.php"; ?>
<main class="main-content">
    <div class="sidebar">

        <nav class="navbar">
            <ul>
                <li class="current">
                    <a href="dashboard.php"><i class="las la-home la-lg"></i> Dashboard</a>
                </li>
                <li>
                    <a href="personal_details.php"><i class="las la-pen la-lg"></i> Usajili</a>
                </li>
                <li>
                    <a href="report.php"><i class="las la-folder la-lg"></i> Ripoti</a>
                </li>
                <li>
                    <a href="logout.php"><i class="las la-sign-out-alt la-lg"></i> Toka</a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="main-area">
        <div class="container-fluid ">
            <div class="row">
                <h6 class="text-dark pl-3">Welcome
                    <?php if (isset($_SESSION["user_logged"])) : ?>
                        <span>
                            <?php echo $_SESSION["user_logged"]; ?>
                        </span>
                    <?php endif; ?>
                </h6>
            </div>
            <div class="row">
                <div class="col total-users">
                    <div class="card bg-success">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="text-light font-weight-bold total-user">0</h3>
                                    <h5 class="text-light total-user-title">Waumini Wote</h5>
                                </div>
                                <div>
                                    <i class="las la-user-friends la-4x text-light"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  text-center">
                            <a href="#" rel="noopener noreferrer" class="card-link text-white view-all-user">Angalia Wote <i class="las la-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col total-section">
                    <div class="card bg-primary">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="text-light font-weight-bold total-section-count">0</h3>
                                    <h5 class="text-light total-section-title">Idara Zote</h5>
                                </div>
                                <div>
                                    <i class="las la-building la-4x text-light"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  text-center">
                            <a href="#" rel="noopener noreferrer" class="card-link text-white view-all-section">Angalia Wote <i class="las la-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col total-section">
                    <div class="card bg-danger">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="text-light font-weight-bold total-section-count">0</h3>
                                    <h5 class="text-light total-section-title">Idara Zote</h5>
                                </div>
                                <div>
                                    <i class="las la-user-friends la-4x text-light"></i>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer  text-center">
                            <a href="#" rel="noopener noreferrer" class="card-link text-white view-all">Angalia Wote <i class="las la-chevron-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- 
                        <div class="col-md-3 total-section">
                            <div class="card bg-dark">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h3 class="text-light font-weight-bold total-section-count">0</h3>
                                            <h5 class="text-light total-section-title">Idara Zote</h5>
                                        </div>
                                        <div>
                                            <i class="las la-user-friends la-4x text-light"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer  text-center">
                                    <a href="#" rel="noopener noreferrer" class="card-link text-white view-all">Angalia Wote <i class="las la-chevron-right"></i></a>
                                </div>
                            </div>
                        </div> -->

            </div>
            <div class="row  mt-4 ">
                <div class="col-md-12 d-flex justify-content-end">
                    <button class="btn btn-danger close-table" style="display: none;">Funga</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 table-view-all ">

                </div>
            </div>
        </div>

    </div>
</main>

<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
<script>
    const totalUserCount = document.querySelector(".total-user");
    const countUserTitle = document.querySelector(".total-user-title");
    const viewAllUserBtn = document.querySelector(".view-all-user");
    const tableviewAll = document.querySelector(".table-view-all");
    const closeTableBtn = document.querySelector(".close-table");

    // Idara
    const totalSectionCount = document.querySelector(".total-section-count")
    const totalSectionTitle = document.querySelector(".total-section-title")
    const viewAllSectionBtn = document.querySelector(".view-all-section");




    const fetchUserCount = async () => {
        const url = 'operation.php'
        const data = new URLSearchParams();
        data.append('action', 'fetch_user_count');

        let options = {
            method: 'POST',
            body: data
        }


        try {
            const response = await fetch(url, options);
            const result = await response.json();

            if (result) {
                totalUserCount.innerHTML = result.total_user;
            }
        } catch (error) {
            console.log(error);
        }
    }

    const fetchSectionCount = async () => {
        const url = 'operation.php'
        const data = new URLSearchParams();
        data.append('action', 'fetch_section_count');

        let options = {
            method: 'POST',
            body: data
        }


        try {
            const response = await fetch(url, options);
            const result = await response.json();

            if (result) {
                totalSectionCount.innerHTML = result.total_section;
            }
        } catch (error) {
            console.log(error);
        }
    }

    const fetchAllUser = async (e) => {

        e.preventDefault();

        const url = 'operation.php'
        const data = new URLSearchParams();
        data.append('action', 'fetch_all_user');

        let options = {
            method: 'POST',
            body: data
        }



        try {
            const response = await fetch(url, options);
            const result = await response.json();

            if (result.length > 0) {
                console.log(result);
                closeTableBtn.style.display = 'block';
                let out = `
                            <table class="table table-striped table-bordered mt-2">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Jina</th>
                                        <th>Jinsia</th>
                                        <th>Tarehe ya kuzaliwa</th>
                                        <th>Anuani</th>
                                        <th>Namba ya Simu</th>
                                    </tr>
                                </thead>
                                <tbody id="user-view-body"></tbody>
                            
                        `;
                result.forEach(user => {
                    out += `
                            <tr>
                                <td>${user.fullname}</td>
                                <td>${user.gender}</td>
                            <td>${user.date_of_birth}</td>
                                <td>${user.address}</td>
                                <td>${user.phone_no}</td>
                            </tr>`;
                });
                out += `</table`;
                tableviewAll.innerHTML = out;

            } else {
                let out = `<div  class="alert alert-info alert-dismissible text-center mt-2">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h3>Hakuna muumini aliyesajiliwa</h3>
                                    </div>`;
                tableviewAll.innerHTML = out;

            }
        } catch (error) {
            console.log(error);
        }

    }

    const fetchAllSection = async (e) => {

        e.preventDefault();

        const url = 'operation.php'
        const data = new URLSearchParams();
        data.append('action', 'fetch_all_section');

        let options = {
            method: 'POST',
            body: data
        }



        try {
            const response = await fetch(url, options);
            const result = await response.json();

            if (result) {
                console.log(result);
                closeTableBtn.style.display = 'block';
                let out = `
                            <table class="table table-striped table-bordered mt-2">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Na</th>
                                        <th>Jina</th>
                                    </tr>
                                </thead>
                                <tbody id="table-view-body"></tbody>
                            
                        `;
                result.forEach(section => {
                    out += `
                            <tr>
                                <td>${section.id}</td>
                                <td>${section.name}</td>
                            </tr>`;
                });
                out += `</table`;
                tableviewAll.innerHTML = out;


            }
        } catch (error) {
            console.log(error);
        }

    }

    const hideDisplayTable = (e) => {
        const tables = document.querySelectorAll(".table");
        tables.forEach(table => {
            table.style.display = 'none';
        })

        e.target.style.display = 'none';
    }


    fetchUserCount();
    fetchSectionCount();
    // setInterval(fetchUserCount, 10000);

    viewAllUserBtn.addEventListener("click", fetchAllUser);
    viewAllSectionBtn.addEventListener("click", fetchAllSection);
    closeTableBtn.addEventListener("click", hideDisplayTable);
</script>
</body>

</html>