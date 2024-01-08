<?php
include 'database/dp_call.php';
include 'classes/customer.php';
include 'classes/packages.php';
include 'header.php';

$package = new packages();

$sender = new Customer();
$receiver = new Customer();
$users = new Customer();


if (isset($_POST['Receiver'])) {
    $_receiver = $_POST['Receiver'];
    $price = $_POST['Price'];
    $newPackage = new customer();
    $_sender = $_POST['Sender'];
    $percentage = new packages();
    $taxes = $percentage->taxes($price, 0.14);
    $insert_package = new packages();
    $insert_package->insertData($_sender, $_receiver, $price, $taxes);
}

?>

<div class="container">
    <form method="POST" action="packges.php" class="">

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Sender name</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="Sender">
                        <?php foreach ($sender->getAllCustomer() as $customer) { ?>
                            <option value="<?= $customer['id'] ?>"> <?= $customer['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Receiver name</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="Receiver">
                        <?php foreach ($receiver->getAllCustomer() as $customer) { ?>
                            <option value="<?= $customer ['id'] ?>"> <?= $customer ['name'] ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-md-6">

                <div class="form-group">
                    <label for="exampleInputPassword1">price</label>
                    <input type="number" class="form-control" id="exampleInputPassword1" name="Price"
                           placeholder="price">
                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary" style="margin:20px 0">Submit</button>
            </div>
        </div>

    </form>

    <hr>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Sender Name</th>
            <th scope="col">Receiver Name</th>
            <th scope="col">Price</th>
            <th scope="col">Tax</th>
            <th scope="col">NET Profit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $price = 0;
        $taxes = 0;
        $net = 0;

        ?>
        <?php foreach ($package->getAllPackages() as $package) { ?>
            <?php
            $price += $package['price'];
            $taxes += $package['taxes'];
            $net += $package['price'] - $package['taxes'];
            ?>
            <tr>
                <th><?= $package['id'] ?></th>
                <th><?= $users->getCustomerName($package['sender_id'])['name'] ?></th>
                <th><?= $users->getCustomerName($package['reciver_id'])['name'] ?></th>
                <th><?= $package['price'] ?> EGP</th>
                <th><?= $package['taxes'] ?> EGP</th>
                <th>
                    <?= $package['price'] - $package['taxes'] ?> EGP
                </th>
            </tr>

        <?php } ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th><?= $price ?> EGP</th>
            <th><?= $taxes ?> EGP</th>
            <th>
                <?= $net ?> EGP
            </th>
        </tr>
        </tbody>
    </table>
</div>




</body>
</html>

