
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
    <link rel="stylesheet" href="css/customersignup.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>

        input{
            margin-bottom:15px;
        }

        button{
            margin-left: 125px;
        }
    </style>
</head>
<body>

 <div class="login">
  <h1>Customer Login</h1>
    <form method="post">
       <div>
       <input type="text" name="fname" placeholder="First name" required="required" style=" width: 49%;" />
      <input type="text" name="lname" placeholder="Last name" required="required" style=" width: 49%;" />
       </div> 
      
      <input type="text" name="streetname" placeholder="Street name " required="required"  />
      <input type="text" name="town" placeholder="Town " required="required" style=" width: 49%;"/>
      <input type="text" name="region" placeholder="Region " required="required" style=" width: 49%;"/>
      <input type="text" name="email" id='email' class="email" placeholder="Email"  required="required" />
        <input type="password" name="password1" class="password pd-password-validation" id="password" placeholder="Password" required="required" />
        <small id="message" class="pd-password-message form-text message text-muted">Hiiiii</small>
        
        <input type="password"  placeholder="Confirm password" required="required" />    
        <button type="submit" class="btn btn-primary btn-large" name="userLogin">Sign Up</button>
    </form>



    
</div>




    <script src="js/password.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="js/admincontactus.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95e3cf507f.js"></script>
    <script>



       
    </script>
    </body>
</html>


<?php

// include_once './Backend/config/Database.php';
// include_once './Backend/model/customer.php';



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freezelink";


$conn = new mysqli($servername, $username , $password,$dbname);

if ($conn->connect_error){
	die("connection fail: " . $conn->connect_error);
}


if(isset($_POST['userLogin']))
{
	$error ="";
	$fname = $_POST['fname'];
    $lname= $_POST['lname'];
    $streetname= $_POST['streetname'];
    $town= $_POST['town'];
    $region= $_POST['region'];
    $email= $_POST['email'];
    $password= $_POST['password1'];
    $hash=password_hash($password, PASSWORD_DEFAULT);
    
    $sql="INSERT INTO customer(first_name, last_name, street_name, town, region, email, account_password) VALUES('$fname', '$lname','$streetname', '$town', '$region','$email','$hash')";
    if ($conn->query($sql)===true){
        echo "You have successfully signed up<br>
        <a href='customerlogin.php'><button>Back To Login</button></a>";
        
    }else{
        echo "Error".$sql."<br>".$conn->error;
    }

	

   };
?>
