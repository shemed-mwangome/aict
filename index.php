<?php
session_start();
date_default_timezone_set("Africa/Dar_es_Salaam");

?>

<?php require "templates/header.php"; ?>
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
<script src="resources/jquery/jquery.js"></script>
<script src="resources/jquery-ui/jquery-ui.min.js"></script>
<script src="resources/popper/popper.js"></script>
<script src="resources/bootstrap/js/bootstrap.min.js"></script>
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

        let output = ""

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
                output += `
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 350px" >
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>`;
                output += `<p>Please contact System Administrator</p>`;
                output += `</div>`;
                userAvatar.style.display = 'none';
                displayError.innerHTML = output;
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