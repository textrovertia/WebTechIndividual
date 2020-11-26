<?php
    $firstname=$_POST["fname"];
    $lastname=$_POST["lname"];
    $email=$_POST["email"];
    $messages=$_POST["messages"];

    echo $messages;
    echo $email;
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
    
    
    $sql="INSERT INTO contactus(first_name, last_name, email, messages) VALUES('$firstname', '$lastname','$email', '$messages')";
    if ($conn->query($sql)===true){
        echo "New record created successfully<br>";
        
    }else{
        echo "Error".$sql."<br>".$conn->error;
    }
   
?>