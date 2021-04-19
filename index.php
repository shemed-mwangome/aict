<?php include("templates/header.php"); ?>
<div class="login " data-page__title="login">
    <i class="las la-user-circle la-6x user-avatar"></i>
    <form action="dashboard.php" method="post" id="login-form" class="login-form">
        <div class="input-group">
            <input type="text" name="username" id="txt_username" placeholder="Username" autocomplete="off">
        </div>
        <div class="input-group">
            <input type="password" placeholder="Password" name="password" id="txt_password">
        </div>
        <div class="input-group">
            <input type="submit" id="btn_submit" name="login" value="Login">
        </div>
    </form>
</div>
<?php include("templates/footer.php"); ?>