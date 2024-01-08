<?php


class db{
    public $hostname;
    public $username;
    public $password;
    public $database;
    public $conn;


    public function __construct($hostname, $username, $password, $database){
        $this->hostname = $hostname;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

    }

    function checkconnection(){
        $this->conn = @mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
        if(!$this->conn){
            return "Connection failed: " . mysqli_connect_error();
        }
        return $this->conn;

    }
    function query($query){
        return mysqli_query($this->checkconnection(),$query);// get my sql data by putting Select (column) from (table)
        // were the the (particular column) = to the value of the variable i put
    }

}
