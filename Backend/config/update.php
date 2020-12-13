
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../css/adminlogin.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
    
</head>
<body>
<?php 
include_once 'Database.php';
include_once '../model/Employee.php';



 //Instantiate DB and connect 
 $database = new Database();
 $db = $database->connect();
 $employee=new Employee($db);

 $id = $_REQUEST["id"];
$table=$_REQUEST['table'];
 echo $id;
 echo $table;

$newText=$_POST["newText"];


switch ($table){
  case "employee":
    
if (isset($_POST['submit'])){

  
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $date=$_POST['date_e'];
    $dept=$_POST['dept'];
    $email=$_POST['email'];
   

  
    $sql ="UPDATE employee
    SET first_name = '$fname', last_name = '$lname', date_employed='$date', department='$dept', email='$email'
    WHERE employee_id='$id'";
        if ($db->exec($sql)){
  
        
           header('location:../../adminemployee.php');
            
        }else{
            echo 'You were unable to edit the information given. It is likely that the id you entered was wrong';
            
        };
  
  

}
break;
case "orders":

  
if (isset($_POST['submit'])){

  
  $productname = $_REQUEST['productname'];
  $customername=$_POST['customername'];
  $qty=$_POST['qty'];

  echo "Hoe";
  
 


 /*  $sql ="UPDATE orders
  SET inventory_= '$fname', last_name = '$lname', date_employed='$date', department='$dept', email='$email'
  WHERE employee_id='$id'";
      if ($db->exec($sql)){

      
         header('location:../../adminemployee.php');
          
      }else{
          echo 'You were unable to edit the information given. It is likely that the id you entered was wrong';
          
      };
 */


}

/* 
}elseif($table==="warehouse"){
// Insert into the table after adding the employee
if (isset($_POST['submit'])){
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $streetname=$_POST['street_name'];
    $streetnumber=$_POST['street_number'];
    $town=$_POST['town'];
    $region=$_POST['region'];
    $maxcapacity=$_POST['max_cap'];
  
    $employeeid=null;
    $third=$employee->getEmployeeid($fname, $lname, $email);
    while ( $row3 = $third->fetch(PDO::FETCH_ASSOC)){
      $employeeid= $row3['employee_id'] ;
  
    
    }
    if($employeeid===null){
      echo '<script>
      alert("The employee entered does not exist");
      </script>';
    }else{
      
      $sql="INSERT INTO warehouse(employee_id, street_name , street_number, town, region, capacity) VALUES('$employeeid', '$streetname','$streetnumber', '$town', '$region', '$maxcapacity')";
      if ($db->query($sql)===true){
          echo "Hi";
          
      }else{
          echo '<script>
          swal({
              title: "Error",
              text: "You were unable to enter the data into the database",
              icon: "error",
            }); 
     }
          
          </script>';
          
      };
  
  
    };

}; */
}

?>
</body>
</html>