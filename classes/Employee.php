<?php


class Employee
{
    public $dev_salary;
    public $salary_type;
    public $salary_type_array;
    public $type;
    public $db;
    public $insert;
    public $update;
    public $insert_salary;

    public function __construct()
    {
        global $db;

        $this->db = $db;
    }

    public function salaryType()
    {

        $this->salary_type = $this->db->query("SELECT salary_type FROM employee");
        $this->salary_type_array = [];
        while ($this->type = mysqli_fetch_array($this->salary_type)) {
            $this->salary_type_array[] = $this->type['salary_type'];
        }
        return $this->salary_type_array;
    }

    public function insertData($employee, $position, $salary_type)
    {
        $salaryType= $this->insertSalary($salary_type);
        $this->insert = $this->db->query("INSERT INTO employee(name, position, salary_type, salary) 
                  values ('$employee','$position','$salary_type',$salaryType)");
        return $this->insert;
    }

    public function getAllEmployees()
    {
        return $this->db->query("SELECT * FROM employee");

    }

    public function updateSalary()
    {

        $employees = $this->getAllEmployees();
        $packages = new packages;
        while ($employee = mysqli_fetch_array($employees)) {
            $employee_id = $employee['id'];
            $salary_type = $employee['salary_type'];
            if ($salary_type == 'dep_package') {
                $package = $packages->getPackagesCount($employee_id)->fetch_row();
                $dev_salary = $package[0] * 10;
                $this->update = $this->db->query("update employee set salary = $dev_salary where id = $employee_id");

            } elseif ($salary_type == 'percentage') {

                $package = $packages->getPackagesCount()->fetch_row();
                $salary = $package[0] * 50 / 100;

                $this->update = $this->db->query("update employee set salary = $salary where id = $employee_id");

            } else {

                $this->update = $this->db->query("update employee set salary = 3000 where id = $employee_id");

            }

        }
        return $this->update;
    }

    public function insertSalary($salary_type)
    {
        $packages = new packages;
        if ($salary_type == 'percentage') {
            $package = $packages->getPackagesCount()->fetch_row();
            $this->insert_salary = $package[0] * 50 / 100;
//            $this->insert_salary = $this->db->query("insert into employee(salary) value ($salary)");
        } elseif ($salary_type == 'dep_package') {
            $package = $packages->getPackagesCount();
            $this->insert_salary = $package[0] * 10;
//            $this->insert_salary = $this->db->query("insert into employee(salary) value ($dev_salary)");
        } else {
//            $this->insert_salary = $this->db->query("insert into employee(salary) value (3000)");
              $this->insert_salary = 3000;
        }
        return $this->insert_salary;
    }
    public function salarySum(){
        return $this->db->query("SELECT sum(salary) FROM employee");
    }
}

