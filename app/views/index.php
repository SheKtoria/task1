<?php require('partials/header.php'); ?>

<div class="form">
    <form id="form" class="form justify-content-center">
        <div class="fields">
            <h1 class="picture">
                <img src="../../public/img/image.png" align="center" width="260" height="200">
            </h1>
            <div class="texts">
                <text class="sign"> SIGN UP<br></text>
                <text>Register your new account</text>
            </div>
            <input name="name" class="name " size="30" type="text"
                   placeholder="First Name">
            <input name="username" class="username" size="30" type="text"
                   placeholder="Username">
            <input name="email" class="email" size="30" type="email"
                   placeholder="E-mail"></p>
            <input name="password" class="password" size="30" type="password"
                   placeholder="Password">
            <input name="confirmPassword" class="confirm-password" size="30"
                   type="password"
                   placeholder="Confirm password"></p>
        </div>
        <div class="message"></div>
        <input name="registerButton" class="register-button" size="30"
               type="button" value="Register">
        <div class="texts">
            <text>Already have an account?<br></text>
        </div>
        <a href="/login" name="loginButton" class="loginButton" size="30" type="button">Login</a>
    </form>
</div>


<?php require('partials/footer.php'); ?>