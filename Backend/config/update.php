
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
    <link rel="stylesheet" href="css/adminlogin.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
</html>

<?php 
include_once 'Database.php';
include_once '../model/Employee.php';



 //Instantiate DB and connect 
 $database = new Database();
 $db = $database->connect();
 $employee=new Employee($db);

 $id = $_REQUEST["id"];
$table=$_REQUEST['table'];
echo $table;

if($table==="employee"){
    
if (isset($_POST['submit'])){

  
    $fname = $_POST['fname'];
    $lname=$_POST['lname'];
    $date=$_POST['date_e'];
    $dept=$_POST['dept'];
    $email=$_POST['email'];
  
          $sql="UPDATE employee SET first_name='$fname' last_name='$lname', department , email, date_employed) VALUES('$fname', '$lname','$dept', '$email', '$date')";
        if ($db->exec($sql)){
  
          echo "Yayyyyy";
          // header('location:../../adminemployee.php');
            
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
  
  }


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
          
          echo '<script>
          swal({
              title: "Success!",
              text: "You successfully added an employee to the database",
              icon: "success",
            }); 
          
          </script>';
          
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

};
}

