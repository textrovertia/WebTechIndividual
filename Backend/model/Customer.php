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
   
    public function getCustomerId($email){
        $query="SELECT customer_id from customer where email='$email'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getCustomerEmail($id){
        $query="SELECT email from customer where customer_id='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }


}
