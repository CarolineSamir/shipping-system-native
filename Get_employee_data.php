<?php
include 'classes/customer.php';
include 'classes/Employee.php';
include 'classes/packages.php';
include 'database/dp_call.php';
include 'header.php';


if (isset($_POST['employee_name'])) {
    $employee = $_POST['employee_name'];
    $position = $_POST['the_position'];
    $salary_type = $_POST['salaryType'];
    $newEmployee = new Employee();
    $insert_Employee = $newEmployee->insertData($employee, $position, $salary_type);
}
$employees = new Employee();

?>



<body>
<div class="container" style="padding: 20px">
    <form method="post" action=Get_employee_data.php>
        <div class="row ">
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Employee Name" name="employee_name">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Position" name="the_position">
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" placeholder="Salary type" name="salaryType">
            </div>
        </div>
        <br>
        <input type="submit" name="submit">
    </form>
    <br>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Employee</th>
            <th scope="col">Position</th>
            <th scope="col">salary type</th>
            <th scope="col">salary</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            foreach ($employees->getAllEmployees() as $employee) {
            ?>
            <th><?= $employee['id'] ?></th>
            <th><?= $employee['name'] ?></th>
            <th><?= $employee['position'] ?></th>
            <th><?= $employee['salary_type'] ?></th>
            <th><?= $employee['salary'] ?> EGP</th>

        </tr>
        <?php } ?>
        </tbody>



    </table>
</div>



</body>
</html>
