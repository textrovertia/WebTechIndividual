<?php
class Orders
{
    private $conn;
    private $table = 'employee';


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
    public function create()
    {
        // $query = 'INSERT into ' .
        //     $this->table .
        //     'SET first = :first, last = :last, Gender = :gen,
        //     Nationality = :nat,Email = :email, PassportNumber = :passport,
        //     PhoneNumber = :phone, Address = :addr,city = :city,region = :reg
        //     ';
        $query = 'INSERT into ' .
            $this->table .
            '(first_name, last_name, date_employeed, department, email) VALUES (:first, :last,:date,:department,:email)
            ';
        $stmt = $this->conn->prepare($query);

        $this->first = htmlspecialchars(strip_tags($this->first));
        $this->last = htmlspecialchars(strip_tags($this->last));
        $this->date = htmlspecialchars(strip_tags($this->date));
        $this->department = htmlspecialchars(strip_tags($this->department));
        $this->email = htmlspecialchars(strip_tags($this->email));
        


        $stmt->bindParam(':first', $this->first);
        $stmt->bindParam(':last', $this->last);
        $stmt->bindParam(':date', $this->date);
        $stmt->bindParam(':department', $this->department);
        $stmt->bindParam(':email', $this->email);
        

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
   
    public function getEmployee(){
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

    public function countEmployees(){
        $query = "SELECT count(*) FROM".$this->table; 
        $stmt = $this->conn->prepare($query); 
        $t=$stmt->execute(); 

        // $number_of_rows = $stmt->fetchColumn(); 
        return $t;
    }

    public function getEmployeeName($id){
        $query="SELECT first_name, last_name, email from employee where employee_id= '$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function getEmployeeid($firstname, $lastname, $email){
        $query="SELECT employee_id from employee where first_name= '$firstname' AND last_name='$lastname' AND email='$email'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function deleteEmployee(){
        $sql = "DELETE FROM employee WHERE employee_id='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    public function updateEmployee($id,$firstname, $lastname, $dateemployed, $department, $email ){
        $sql ="UPDATE employee
        SET first_name = '$firstname', last_name = '$lastname', date_employed='$dateemployed', department='$department', email='$email'
        WHERE employee_id='$id'";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
        
    }
   

}
