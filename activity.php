<?php
require "_load.php";
global $user;
if (isset($_GET["product_id"])) {
    $product_id = $_GET["product_id"];
} else {
    $product_id = $_POST["products"];
}
$products = get_product($product_id);
$activities = get_activities();
if (isset($_GET["sub"])) {
    foreach ($activities as $activity) {
        $normal_h[$activity["id"]] = $_GET["normal_h"][$activity["id"]];
        $normal_m[$activity["id"]] = $_GET["normal_m"][$activity["id"]];
        $extra_h[$activity["id"]] = $_GET["extra_h"][$activity["id"]];
        $extra_m[$activity["id"]] = $_GET["extra_m"][$activity["id"]];
        report($user["id"],$products["project_id"],$products["id"],$activity["id"],$normal_h[$activity["id"]],$normal_m[$activity["id"]],$extra_h[$activity["id"]],$extra_m[$activity["id"]]);
    }


}
?>
<form action="" method="get">
    <input value="<?= $product_id ?>" type="hidden" name="product_id">
    <?php foreach ($activities as $activity) { ?>
        <label> <?= $activity["name"] ?></label> <br>

        <select name="normal_h[<?= $activity["id"] ?>]">
            <?php for ($i = 0; $i < 9; $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?>h</option>
            <?php } ?>
        </select>

        <select name="normal_m[<?= $activity["id"] ?>]">
            <?php for ($i = 0; $i < 55; $i += 5) { ?>
                <option value="<?= $i ?>"><?= $i ?>m</option>
            <?php } ?>
        </select>

        <select name="extra_h[<?= $activity["id"] ?>]">
            <?php for ($i = 0; $i < 9; $i++) { ?>
                <option value="<?= $i ?>"><?= $i ?>h</option>
            <?php } ?>
        </select>

        <select name="extra_m[<?= $activity["id"] ?>]">
            <?php for ($i = 0; $i < 55; $i += 5) { ?>
                <option value="<?= $i ?>"><?= $i ?>m</option>
            <?php } ?>
        </select>
        <br>
    <?php } ?>

    <input type="submit" value="send" name="sub"> <br>


</form>