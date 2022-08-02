<?php
require "_load.php";
auth_reqire();
global $user;
var_dump($user);
$projects = get_projects();
if (isset($_GET["sub_project"])) {
    $products = get_products($_GET["projects"]);
}
?>

<div>  علی محمدی </div>

<button type="button" onclick="location.href='exit.php';">
    خروج
</button>

<form action="" method="get">
    <select name="projects">
        <?php foreach ($projects as $project) { ?>
            <option value="<?= $project["id"] ?>"><?= $project["name"] ?> </option>
        <?php } ?>
    </select>
    <input type="submit" name="sub_project" value="send">
</form>
<?php if (isset($products) && count($products) > 0) {
    ?>

    <form action="activity.php" method="post">
        <select name="products">
            <?php foreach ($products as $product) { ?>
                <option value="<?= $product["id"] ?>"><?= $product["name"] ?> </option>
            <?php } ?>
        </select>
<!--        <input type="hidden" name="product" value="<?/*=$product*/?>">
-->        <input type="submit" name="sub_product" value="send">
    </form>
<?php } ?>

