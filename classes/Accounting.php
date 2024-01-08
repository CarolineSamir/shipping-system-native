<?php


class Accounting
{
    public $income;
    public $get_income;
    public $get_outcome;
    public $profit;
    public $db;
    public $row1;
    public $income_value;


    public function __construct()
    {
        global $db;

        $this->db = $db;
    }

    public function getIncome(){
        $this->get_income = $this->db->query("SELECT income FROM company");
        while ($this->row1 = mysqli_fetch_array($this->income)) {
            $this->income = $this->row1['income'];
        }
        return $this->income;
    }
    public function insert_income(){
        $income = new packages();
        $income_value =$income->getPackagesCount()->fetch_row();
        $this->get_income = $this->db->query("  update COMPANY set income = $income_value[0]");
        return $this->get_income;

    }public function update_outcome(){
        $outcome = new costs();
        $outcome_value =$outcome->getSum();
        $this->get_outcome = $this->db->query("  update COMPANY set outcome = $outcome_value");
        return $this->get_outcome;
    }
    public function update_profit(){
        $this->get_income = $this->db->query("SELECT income FROM company")->fetch_row();
        $income = $this->get_income[0];
        $this->get_outcome = $this->db->query("SELECT outcome FROM company")->fetch_row();
        $outcome = $this->get_outcome[0];
        $profit = $income + $outcome;
        $this->profit = $this->db->query("update company set profit = $profit");
        return $this->profit;
    }



}