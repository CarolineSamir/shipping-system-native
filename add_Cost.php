<?php
include 'classes/packages.php';
include 'classes/costs.php';
include 'database/dp_call.php';
include 'header.php';

if (isset($_POST['costs'])) {
    $costs = $_POST['costs'];
    $price = $_POST['price'];
    $insert = new costs();
    $insert->insertCostsData($costs, $price);
}
$showCosts = new costs();
?>

<div class="container">
    <form method="post" action=add_Cost.php>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Costs" name="costs">
            </div>
            <div class="col-md-4">
                <input type="number" class="form-control" placeholder="price" name="price">
            </div>
        </div>
        <br>
        <div style="margin-left: 45%;"><input type="submit" name="submit"></div>
    </form>
    <div>
        <table class="table">
            <thead class="table-dark ">
            <tr>
                <th scope="col">Costs Type</th>
                <th scope="col">Price</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <?php
                foreach ($showCosts->getAllCosts() as $cost) {
                ?>
                <th><?= $cost['costs_type'] ?></th>
                <th><?= $cost['price'] ?></th>

            </tr>
            <?php } ?>
            </tbody>

        </table>

    </div>
</div>


</body>
</html>