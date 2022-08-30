<?php require 'layout/header.php'; ?>
<div class="py-5 text-center">

    <h2>Add Item </h2>

    <form method="post" >
        <label for="prodName">Name</label>
        <input type="text" name="prodName" id="prodName" required>
        <label for="prodDesc">Description</label>
        <input id="prodDesc" type="prodDesc" name="prodDesc" required>
        <label for="prodPrice">Price</label>
        <input type="text" name="prodPrice" id="prodPrice"  required> <br>

        <input type="submit" name="submit" value="Submit">
    </form>

</div>

<?php require 'layout/footer.php'; ?>
