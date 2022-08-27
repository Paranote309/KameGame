<?php
if (isset($_POST['submit'])) {
    try {
        require_once 'DBconnect.php';
        $new_user = array(
            "username" => $_POST['username'],
            "password" => $_POST['password'],
            "email" => $_POST['email'],
            "age" => $_POST['age'],
            "location" => $_POST['location']
        );
        $sql = sprintf("INSERT INTO %s (%s) values (%s)", "users",
            implode(", ", array_keys($new_user)),
            ":" . implode(", :", array_keys($new_user)));
        $statement = $connection->prepare($sql);
        $statement->execute($new_user);


    } catch(PDOException $error) {
        echo $sql . "<br>" . $error->getMessage();
    }
}
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



<a href="home.php">Back to home</a>

<?php require '../layout/footer.php'; ?>