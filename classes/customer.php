<?php


class customer
{
    public $costumer;
    public $db;
    public $nameArray;
    public $name;
    public $insert;
    public $getId;
    public $get_Id;
    public function __construct()
    {

        global $db;
        $this->db = $db;

    }

    public function getAllCustomer()
    {
        return $this->db->query("SELECT * FROM customer");
    }


    public function getCustomerName($id)
    {
        $costumer = $this->db->query("SELECT name FROM customer WHERE id = $id");
        // get my sql data by putting Select (column) from (table)
        // were the the (particular column) = to the value of the variable i put
        return mysqli_fetch_array($costumer);
    }

    public function getName(){
        $this->costumer = $this->db->query("SELECT * FROM customer");
        $this->nameArray = [];
        while( $this->name= mysqli_fetch_array($this->costumer)){
            $this->nameArray[$this->name['id']] = $this->name['name'];
            }
            return $this->nameArray;
    }
    public function insertName($name){
        $this->insert= $this->db->query("INSERT INTO customer(name) VALUE ('$name')");
        return $this->insert;
    }
//    public function getId($name){
//
//        $this->ids = $this->db->query("SELECT id FROM customer WHERE name = '$name'");
//        while($this->getId = mysqli_fetch_array($this->ids)){
//            $this->get_Id = $this->getId['id'];
//        }
//        return $this->get_Id;
//    }

}