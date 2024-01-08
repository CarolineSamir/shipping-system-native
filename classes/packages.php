<?php


class packages
{

    public $price;
    public $db;
    public $row;
    public $income;
    public $Total_price;
    public $insert;
    public $Taxes;
    public $packages_count;
    public $sender;
    public $receiver;

    public function __construct()
    {
        global $db;
        $this->db = $db;


    }

    public function getPackagesCount($id = null)
    {
        if ($id == null) {
            return $this->db->query("SELECT sum(price) FROM packages");
        } else {
            return $this->db->query("SELECT count(*) FROM packages where delivery_man_id = $id");
        }
    }

    public function getSenderReceiver($sender_id= null, $receiver_id = null)
    {
        if ($receiver_id == null) {
            $this->sender = $this->db->query("SELECT count(*) FROM packages where sender_id = $sender_id")->fetch_row();
            return $this->sender[0];
        }
        if ($sender_id == null) {
            $this->receiver = $this->db->query("SELECT count(*) FROM packages where reciver_id = $receiver_id")->fetch_row();
            return $this->receiver[0];
        }

    }
    public function getPackagesCost($id){
        $this->sender= $this->db->query("SELECT sum(price) FROM packages where sender_id = $id")->fetch_row();
        return $this->sender[0];
    }

    public function getAllPackages()
    {
        return $this->db->query("SELECT * FROM packages");

    }


    public function package_price($id)
    {

        $this->price = $this->db->query("SELECT price FROM packages WHERE id = $id");
        // get my sql data by putting Select (column) from (table)
        // were the the (particular column) = to the value of the variable i put
    }

    public function totalPrice()
    {
        $this->Total_price = array();
        $this->price = $this->db->query("SELECT price FROM packages");
        while ($this->row = mysqli_fetch_array($this->price)) {
            $this->total_price[] = $this->row['price'];
        }
        $this->income = array_sum($this->total_price);
        return $this->income;
    }

    public function insertData($Sender, $Receiver, $package_price, $taxes)
    {
        $this->insert = $this->db->query("INSERT INTO packages(sender_id, reciver_id, price, taxes)  
                                               values ($Sender,$Receiver,$package_price,$taxes)");
        return $this->insert;
    }

    public function taxes($price, $percentage)
    {
        $this->Taxes = $price * $percentage;
        return $this->Taxes;
    }

    public function count_packages()
    {
        $this->packages_count = [];
        $this->price = $this->db->query("SELECT price FROM packages");
        while ($this->row = mysqli_fetch_array($this->price)) {
            $this->packages_count[] = $this->row['price'];
        }
        return count($this->packages_count);
    }

}

