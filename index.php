<?php
include 'database/dp_call.php';
include 'classes/customer.php';
include 'classes/Employee.php';
include 'classes/packages.php';
include 'classes/costs.php';
include 'database/database_creat.php';
include 'classes/Accounting.php';
//$add = new dbUse();
//$add->getbd()->query("create table company (
//    id  INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
//    income FLOAT UNSIGNED,
//    outcome FLOAT UNSIGNED,
//    profit FLOAT UNSIGNED
//)");

$salary = new costs();
$salary->insertSalary();
$income = new Accounting();
$income->insert_income();
$outcome = new Accounting();
$outcome->update_outcome();
$profit = new Accounting();
$profit->update_profit();
//$income = new packages();
//$insertIncome = new Accounting();
//$insertIncome->insert_income($income->totalPrice());
//
//$taxes = new packages();
//$insert = $taxes->updateTaxes(0.14);
//print_r($insert);


//$packages_count = new packages();


//$employee= new Employee();
//
//$employee->updateSalary();