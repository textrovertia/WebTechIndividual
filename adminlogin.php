
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
  <h1>Employee Login</h1>
    <form method="post">
      <input type="text" name="user" placeholder="Username" required="required" />
     
        <input type="password" name="password1" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-large" name="userLogin">Login</button>
    </form>
</div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="js/admincontactus.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95e3cf507f.js"></script>
    </body>
</html>


<?php

// include_once './Backend/config/Database.php';
// include_once './Backend/model/admin.php';



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "freezelink";


$conn = new mysqli($servername, $username , $password,$dbname);

if ($conn->connect_error){
	die("connection fail: " . $conn->connect_error);
}
$user = 'admin';
	$pass = "password";
   
$sql= "SELECT email, account_password, id FROM manager WHERE email='$user'";


if(isset($_POST['userLogin']))
{
	$error ="";
	$user = $_POST['user'];
	$pass = $_POST['password1'];
   

	$sql= "SELECT email, account_password, id FROM manager WHERE email='$user'";


	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$hash=$row["account_password"];
	$auth = password_verify($_POST['password1'], $hash);
	if ($auth==TRUE){
        session_start();
        $result = mysqli_query($conn, $sql);
	   $data = $result->fetch_assoc();
       $_SESSION['userId'] = $data['id'];
        echo $_SESSION['userId'];

	 header('location:admincontact.php');
	}elseif($auth==FALSE){
        
        echo '<script type="javascript">
        console.log("ewjfd")
        alert("You entered the wrong password. Please try again")
        
        </script>';
	};
  /*  $result = $conn->query("select * from manager where email = '$user' AND account_password = '$pass'");
   if($result->num_rows > 0)
   {
	   session_start();
	   $data = $result->fetch_assoc();
	   $_SESSION['userId'] = $data['id'];
	   header('location:admin.php');
   }

   else{
	echo '<script language="javascript">
	alert("You have entered the wrong credentials. Please try again")
	</script>';

	echo "Hi";
	header('location:admincontact.php'); */
   
   };
?>
