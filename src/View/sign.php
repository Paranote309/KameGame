<?php
//require_once ('src/loginDetails.php');
?>
<?php require '../layout/header2.php'; ?> <h2>Sign up </h2>

<?php if (isset($_POST['submit']) && $statement) { ?>
    <?php echo escape($_POST['username']); ?> successfully added.
<?php } ?>


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
    <input type="submit" name="submit" value="Submit">
</form>



<a href="index.php">Back to home</a>

<?php require '../layout/footer.php'; ?>