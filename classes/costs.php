<?php


class costs{
    public $total_cost;
    public $costs_sum;
    public $getCosts_sum;
    public $price;
    public $db;
    public $update;
    public $insert;

    public function __construct(){
        global $db;
        $this->db = $db;
    }
    public function costsSum(){
        $this->costs_sum = $this->db->query("SELECT * FROM costs");
        //return $this->costs_sum;
        $this->getCosts_sum = [];
        while ($this->price = mysqli_fetch_array($this->costs_sum)) {
            $this->getCosts_sum[]= $this->price['price'];

        };
        $this->total_cost = array_sum($this->getCosts_sum);
        return $this->total_cost;

        }

        public function insertSalary(){
        $salaryy = new Employee;
        $salary= $salaryy->salarySum()->fetch_row();
        $this->update = $this->db->query("update costs set price = '$salary[0]' where costs_type = 'salary'");
        return $this->update;
        }

        public function getSum(){
        $this->costs_sum = $this->db->query("select sum(price) from costs")->fetch_row();
        return $this->costs_sum[0];
        }
    public function insertCostsData($costs_type ,$costs_price)
    {
        $this->insert = $this->db->query("INSERT INTO costs(costs_type, price)  
                                               values ($costs_type ,$costs_price)");
        return $this->insert;
    }
    public function getAllCosts()
    {
        return $this->db->query("SELECT * FROM costs");
    }
}


//public function costs_price($id){
//
//        $this->id = $this->db->query("SELECT price FROM costs WHERE id = $id");
//
//    }
//    public function getCosts(){
//
//        return mysqli_fetch_array($this->id);
//    }