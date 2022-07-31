<?php
require "_load.php";
auth_reqire();
$projects = get_projects();
if (isset($_POST["sub_project"])) {
    $products = get_products($_POST["projects"]);
}





?>


<form action="" method="post">
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
-->        <input type="submit" name="sub_project" value="send">
    </form>
<?php } ?>

