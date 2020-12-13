<?php
class Orders
{
    private $conn;
    private $table = 'orders';


    public $id;
    public $first;
    public $last;
    public $date;
    public $department;
    public $email;


    public function __construct($db)
    {
        $this->conn = $db;
    }
    
    public function getId()
    {
        return $this->id;
        
    }
   
    public function getOrders(){
        $query = 'SELECT * FROM '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    


    public function countOrders(){
        $query = "SELECT count(*) FROM".$this->table; 
        $stmt = $this->conn->prepare($query); 
        $t=$stmt->execute(); 

        // $number_of_rows = $stmt->fetchColumn(); 
        return $t;
    }

}
