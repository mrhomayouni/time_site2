<?php
require "_load.php";
$product_id = $_POST["products"];
$products=get_product($product_id);
var_dump($products);
echo $product_id;
$activities = get_activities();
if (isset($_GET["sub"])) {
}

?>

<form action="" method="get">

    <?php foreach ($activities as $activity) { ?>
        <?= $activity["name"] ?> <br>
        <input type="text" name="extra[<?= $activity["id"] ?>]">  <input type="text" name="normal[<?= $activity["id"] ?>]"> <br>

    <?php } ?>
    <input type="submit" value="send" name="sub">

</form>