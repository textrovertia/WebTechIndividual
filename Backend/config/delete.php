
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
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freezelink";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_REQUEST["id"];
$table=$_REQUEST["table"];

//If the table is employee

if ($table==="employee"){
  echo "hi";
  $sql = "DELETE FROM employee WHERE employee_id='$id'";
  
    if (mysqli_query($conn, $sql)) {
      header('location:../../adminemployee.php');
    } else {
      echo " This employee is in charge of a warehouse. Thus, you cannot remove them from your database";
      // echo "Error deleting record: " . mysqli_error($conn);
      }


?>
<button>
  <a href="../../adminemployee.php">Back to Table</a>
</button>

<?php
};

//If the table is a warehouse 
if($table==="warehouse"){
  $sql="DELETE FROM warehouse WHERE warehouse_id='$id'";
  if (mysqli_query($conn, $sql)) {
    header('location:../../adminwarehouse.php');
  } else {
    echo " This warehouse still has inventory in it. Thus, you cannot remove them from your database";
    echo "Error deleting record: " . mysqli_error($conn);
    }
?>
<button>
  <a href="../../adminwarehouse.php">Back to Table</a>
</button>

<?php
};
// sql to delete a record from the contactus
if($table==="contactus"){
  $sql="DELETE FROM contactus where messageid='$id'";
  if (mysqli_query($conn, $sql)) {
    header('location:../../admincontact.php');
  } else {
    echo " There was an error in deleting is record from your database. Please try again";
    echo "Error deleting record: " . mysqli_error($conn);
    }
}


?>


<?php
$conn->close();
?>
<br>
