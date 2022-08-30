<?php require 'layout/header.php'; ?>



<div class="container">
    <form action="" method="post" name="Login_Form" class="form-signin">
        <h2 class="form-signin-heading">Please Login</h2>
        <label for="inputUsername" >Username</label>
        <input name="username" type="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
        <label for="inputPassword">Password</label>
        <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <input type='submit' name='submit' value='Login' /><br>

        <p><a class="btn btn-primary btn-lg " href="/?action=register"> Register &raquo;</a></p>

    </form>

    <?php require 'layout/footer.php'; ?>




