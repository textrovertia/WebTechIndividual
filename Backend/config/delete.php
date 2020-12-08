<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freezelink";
echo "Hiiiiii";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id = $_REQUEST["id"];
$table=$_REQUEST["table"];

echo $id;

// sql to delete a record
$sql = "DELETE FROM employee WHERE employee_id='$id'";


if (mysqli_query($conn, $sql)) {
    header('location:../../adminemployee.php');
  } else {
    echo "Error deleting record: " . mysqli_error($conn);
  }

$conn->close();
?>
<br>
<button>
  <a href="delete.php">Back to Table</a>
</button>