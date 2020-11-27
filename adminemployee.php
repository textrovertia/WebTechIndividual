










































<?php
/*

$email=$_POST["email"];

$password=$_POST["mypassword"];
$hash = password_hash($password, PASSWORD_DEFAULT);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freezelink";

//Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


//Check connection
if ($conn->connect_error){
    die("Connection failed:".$conn->connect_error);
}


$sql="INSERT INTO manager(email, account_password) VALUES('$email', '$hash')";
if ($conn->query($sql)===true){
    echo "You have successfully signed up<br>";
 
    
}else{
    echo "Error".$sql."<br>".$conn->error;
}
*/
?>

