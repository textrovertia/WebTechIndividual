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
    public function create()
    {
        // $query = 'INSERT into ' .
        //     $this->table .
        //     'SET FName = :fname, LName = :lname, Gender = :gen,
        //     Nationality = :nat,Email = :email, PassportNumber = :passport,
        //     PhoneNumber = :phone, Address = :addr,city = :city,region = :reg
        //     ';
        $query = 'INSERT into ' .
            $this->table .
            '( first_name, last_name, email,messages ) VALUES (:first, :last,:email,:messages)
            ';
        $stmt = $this->conn->prepare($query);

        $this->id=htmlspecialchars(strip_tags($this->id));
        $this->first = htmlspecialchars(strip_tags($this->fName));
        $this->last = htmlspecialchars(strip_tags($this->lName));
        $this->email = htmlspecialchars(strip_tags($this->email));
        $this->messages = htmlspecialchars(strip_tags($this->messages));



        $stmt->bindParam(':first', $this->fName);
        $stmt->bindParam(':last', $this->lName);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':message', $this->messages);

        if ($stmt->execute()) {
            $this->id = $this->conn->lastInsertId();
            return true;
        }
        printf("Error: %s.\n", $stmt->error);

        return false;
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
    public function validateEmail(){
        $query = 'SELECT COUNT(*) as exist FROM '.$this->table.' where email=:e';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':e', $this->email);
        $stmt->execute();
        return $stmt;
    }


}
