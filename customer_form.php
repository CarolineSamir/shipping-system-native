<?php
include 'database/dp_call.php';
include 'classes/customer.php';
include 'classes/packages.php';
include 'header.php';


if (isset($_POST['customer_name'])){
    $NewUser = new customer();
    $Name = $_POST['customer_name'];
    $NewUser->insertName($Name);
}
$NewCustomers = new customer();
$package_count = new packages()
?>


<div class="container">
    <form method="post" action=customer_form.php>
        <div class="row justify-content-center">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Customer Name" name="customer_name">
            </div>
        </div>
        <br>
        <div style= "margin-left: 45%;"><input  type="submit" name="submit"></div>
    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">packages</th>
            <th scope="col">payed</th>
            <th scope="col">Received</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($NewCustomers->getAllCustomer() as $Customer) {
            ?>
            <th><?= $Customer['id'] ?></th>
            <th><?= $Customer['name'] ?></th>
            <th><?= $package_count->getSenderReceiver($Customer['id'],null) ?></th>
            <th><?= $package_count->getPackagesCost($Customer['id']) ?></th>
            <th><?= $package_count->getSenderReceiver(null,$Customer['id']) ?></th>

        </tr>
        <?php } ?>
        </tbody>
    </table>
</div>



</body>
</html>
