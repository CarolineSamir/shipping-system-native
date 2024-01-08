
<?php

include '../database/dp_call.php';
include '../classes/customer.php';

$senders = new customer();
$receivers = new customer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>form</title>

</head>
<body>
<form method="POST" action="../index.php">

    Sender Name

    <select name="Sender" >
        <?php foreach ($senders->getAllCustomer() as $sender ) { ?>
             <option value="<?=$sender['id']?>"> <?=$sender['name']?> </option>
        <?php } ?>

    </select><br>
    Receiver Name
    <select name="Receiver" >
        <?php foreach ($receivers->getAllCustomer() as $receiver  ) { ?>
            <option value="<?=$receiver['id']?>"> <?=$receiver['name']?> </option>
        <?php } ?>

    </select><br>

    <br>

    price <input type="number" name="Price"><br>
    <input type="submit" value="Submit">

</form>

</body>
