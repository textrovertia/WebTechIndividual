<?php
class Contact
{
    private $conn;
    private $table = 'contactus';


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
    
    public function getContact(){
        $query = 'SELECT * FROM '.$this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    
   


}
