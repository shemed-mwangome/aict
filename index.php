<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AFRICAN INLAND CHURCH TANZANIA | DAYOSISI YA PWANI</title>
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" href="resources/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="resources/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="resources/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="styles/main.css">
    <link rel="shortcut icon" href="images/logo.png" type="image/x-icon">
</head>

<body>
    <div class="wrapper">
        <header id="banner">
            <div class="container flex">
                <div class="col-left">
                    <img src="images/logo.png" alt="Logo">
                </div>
                <div class="col-right">
                    <h1 class="main-title">AFRICAN INLAND CHURCH TANZANIA - DAYOSISI YA PWANI</h1>
                    <h2 class="sub-title">MFUMO WA SENSA YA WAUMINI</h2>
                </div>
            </div>
        </header>
        <div class="login " data-page__title="login">
            <div class="display-error">

            </div>
            <i class="las la-user-circle la-6x user-avatar"></i>
            <form action="login.php" method="POST" id="loginForm" class="loginForm" enctype="multipart/form-data">

                <div class="input-group">
                    <input type="text" name="username" id="txt_username" placeholder="Username">
                </div>
                <div class="input-group">
                    <input type="password" placeholder="Password" name="password" id="txt_password">
                </div>
                <div class="input-group">
                    <button type="submit" class="submit-btn" id="submit-btn">Login <span class="spinner spinner-border spinner-border-sm" style="visibility:hidden"></span></button>
                </div>
            </form>
        </div>
    </div>
    <?php include "templates/scripts.php"; ?>
    <!-- Custom Scripts -->

    <script>
        const loginForm = document.querySelector("#loginForm")
        const txt_username = document.querySelector("#txt_username")
        const txt_password = document.querySelector("#txt_password")
        const displayError = document.querySelector(".display-error");
        const userAvatar = document.querySelector(".user-avatar");
        const loader = document.querySelector(".spinner");

        const displayLoader = () => {
            loader.style.visibility = 'visible';

            setTimeout(() => {
                loader.style.visibility = 'hidden';
            }, 2000);
        }



        const login = async (e) => {
            e.preventDefault()



            let data = new FormData(loginForm)
            data.append('action', 'login')

            let options = {
                method: 'POST',
                body: data
            }

            fetch('login.php', options)
                .then(response => response.json())
                .then(data => {
                    displayLoader();
                    let output = ""
                    console.table(typeof data)
                    console.log(data)
                    if ('errors' in data) {
                        output += `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 350px" >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>`;
                        let errorArray = Object.values(data.errors);
                        errorArray.forEach(err => {
                            output += `<p>${err}</p>`;
                        })
                        output += `</div>`;
                        userAvatar.style.display = 'none';
                        displayError.innerHTML = output;
                    } else if ('success' in data) {
                        let {
                            status,
                            page
                        } = data.success;
                        if (status) {
                            switch (page) {
                                case 'administrator':
                                    window.location.replace('admin/dashboard.php')
                                    break;
                                case 'standard':
                                    window.location.replace('dashboard.php');
                                    break;
                                default:
                                    window.location.reload();
                            }
                        }
                    }

                })
                .catch(error => {
                    console.log(error)
                })
        }


        loginForm.addEventListener("submit", login)


        // Jquery
        $(document).ready(function() {
            $("input").focus(function() {
                $("div.alert").hide(1000);
                $(".user-avatar").show();
            })
        });
    </script>

    <?php include "templates/footer.php"; ?>