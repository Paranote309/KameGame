<?php require 'layout/header.php'; ?>
<div class="py-5 text-center">

        <h2>Sign up </h2>

        <form method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required>
        <label for="password">Password</label>
        <input id="password" type="password" name="password" minlength="8" maxlength="16" size="16"required>
        <label for="email">Email address</label>
        <input type="text" name="email" id="email" placeholder="john@doe.com" required>
        <label for="age">Age</label>
        <input type="text" name="age" placeholder="18 "id="age">
        <label for="location">Location</label>
        <input type="text" name="location" placeholder="Dublin" id="location">
        <label for="is_seller">Are you a Seller?</label>
        <input type="checkbox"  name="is_seller" value="1"> <br>
        <input type="submit" name="submit" value="Submit">
        </form>


</div>

<?php require 'layout/footer.php'; ?>