<?php require('partials/header.php'); ?>

<form id="formLogin" class="formLogin justify-content-center">
    <div class="fields">
        <h1 class="picture">
            <img src="../../public/img/image.png" align="center" width="260" height="200">
        </h1>
        <div class="textsLogin">
            <text class="sign"> SIGN IN<br></text>
            <text>Log into your account</text>
        </div>
        <input name="usernameLogin" class="usernameLogin" size="30" type="text"
               placeholder="Username"></p>
        <input name="passwordLogin" class="passwordLogin" size="30"
               type="password"
               placeholder="Password"></p>
    </div>
    <div class="message"></div>
    <input name="loginButton" class="login-button" size="30" type="button"
           value="Login"></p>
</form>


<?php require('partials/footer.php'); ?>