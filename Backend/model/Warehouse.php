<?php
include_once 'Employee.php';

class Warehouse 
{
    private $conn;
    private $table = 'warehouse';


    public $id;
    public $employee_id;
    public $street_name ;
    public $street_number;
    public $town;
    public $region;
    public $capacity;

    


    public function __construct($db)
    {
        $this->conn = $db;
    }
  /*   public function create()
    {
        // $query = 'INSERT into ' .
        //     $this->table .
        //     'SET FName = :fname, LName = :lname, Gender = :gen,
        //     Nationality = :nat,Email = :email, PassportNumber = :passport,
        //     PhoneNumber = :phone, Address = :addr,city = :city,region = :reg
        //     ';
        $query = 'INSERT into ' .
            $this->table .
            '( employee_id, street_name, street_number,town, region, capacity  ) VALUES (:employee_id, :street_name,:street_number,:town, :region, :capacity)
            ';
        $stmt = $this->conn->prepare($query);

        
        $this->employee_id = htmlspecialchars(strip_tags($this->employee_id));
        $this->street_name = htmlspecialchars(strip_tags($this->street_name));
        $this->street_number = htmlspecialchars(strip_tags($this->street_number));
        $this->town = htmlspecialchars(strip_tags($this->town));
        $this->region = htmlspecialchars(strip_tags($this->capacity));
        $this->capacity  = htmlspecialchars(strip_tags($this->capacity));



        $stmt->bindParam(':employee_id', $this->employee_id);
        $stmt->bindParam(':street_name', $this->street_name);
        $stmt->bindParam(':street_number', $this->street_number);
        $stmt->bindParam(':town', $this->town);
        $stmt->bindParam(':region', $this->region);
        $stmt->bindParam(':capacity', $this->capacity);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);

        return false;
    } */
    public function getId()
    {
        return $this->id;
        
    }
    
    public function getWarehouse(){
        $query = 'SELECT * FROM '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    
    public function getWarehouseLocation($id){
        $query="SELECT street_name from warehouse where warehouse_id= '$id'";
        $stmt = $this->conn->prepare($query);
       
        $stmt->execute();
        return $stmt;
    }

    public function getWarehouseId($streetname){
        $query="SELECT warehouse_id from warehouse where street_name='$streetname' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

  /*   public function getWarehousebyId($id){
        $query="SELECT  from warehouse where warehouse_id= '$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
 */
}
