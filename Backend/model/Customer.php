<?php
class Customer
{
    private $conn;
    private $table = 'customer';


    public $id;
    public $first;
    public $last;
    public $email;
    public $messages;
    


    public function __construct($db)
    {
        $this->conn = $db;
    }
    public function getId()
    {
        return $this->id;
        
    }
    
    public function getCustomer(){
        $query = 'SELECT * FROM '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function validateEmail(){
        $query = 'SELECT COUNT(*) as exist FROM '.$this->table.' where email=:e';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':e', $this->email);
        $stmt->execute();
        return $stmt;
    }


}
