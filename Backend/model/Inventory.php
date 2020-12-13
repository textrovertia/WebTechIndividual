<?php
include_once 'Warehouse.php';

class Inventory 
{
    private $conn;
    private $table = 'inventory';


    public $id;
    public $inventory_name;
    public $inventory_category;
    public $warehouse_id;
    public $qty_in_stock;
    public $price;

    


    public function __construct($db)
    {
        $this->conn = $db;
    }
  
    public function getId()
    {
        return $this->id;
        
    }
    
    public function getInventory(){
        $query = 'SELECT * FROM inventory';
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getItem($category){
        $query = "SELECT inventory_name, qty_in_stock, price FROM inventory where inventory_category='$category'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getInventoryId($name){
        $query="SELECT inventory_id from inventory where inventory_name='$name'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getInventoryName($id){
        $query="SELECT inventory_name from inventory where inventory_id='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }




}
