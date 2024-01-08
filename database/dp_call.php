<?php
include 'database_conn.php';
$db = new db('localhost', 'Root', 'caro1234', 'shiping');

class dbUse
{
    public $db;
    public function getbd()
    {
        $this->db = new db('localhost', 'Root', 'caro1234', 'shiping');
        return $this->db;
    }
}


//$new= $dbs->query("INSERT INTO customer (name) VALUE ('Shady')");
