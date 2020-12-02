<form method="POST" action="try.php" id="form">
                        <label>Name</label><br>
                    
                        <input type="text" required placeholder="First Name" name="fname" class="naming firstname">
                        <input type="text" required placeholder="Last Name" name="lname" class="naming">
                        <label>Email</label>
                        <input type="text" required placeholder="Email" name="email" id="email">
                        <br>
                        <p id="emailHelp" style="color:red;"></p>
                        <label>Message</label><br><br>
                        <textarea type="text" style="width:20em;" required placeholder="Message" name="messages" class="message"></textarea>
                        <input type="submit" required placeholder="Submit" name="submitrequest" id="submit">
                    </form>




<?php
   

 

   if(isset($submit)){

      $firstname=$_POST["fname"];
      $lastname=$_POST["lname"];
      $email=$_POST["email"];
      $messages=$_POST["messages"];
      $submit=$_POST["submitrequest"];
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "freezelink";
      echo "<script><alert>Hiiiii</alert></script>";
  
     //Create connection
     $conn = new mysqli($servername, $username, $password,$dbname);
      
  
     //Check connection
     if ($conn->connect_error){
         die("Connection failed:".$conn->connect_error);
     }else{
      "<script><alert>Hiiiii</alert></script>";
     }
 
  
      
      $sql="INSERT INTO contactus(first_name, last_name, email, messages) VALUES('$firstname', '$lastname','$email', '$messages')";
    if (empty($firstname) || empty($lastname) ){
      echo '<script>alert("Please fill the form")</script>';
      preventDefault();
    }else{
      
        if ($conn->query($sql)===true){
          echo '<script>
          alert("Message received! Thank you for using Freezelink Limited! Pleasure to serve you")
          </script>';
          
      }else{
          echo "Error".$sql."<br>".$conn->error;
      }
    
    }
  };

    
?>

