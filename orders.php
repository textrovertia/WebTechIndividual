
<?php session_start();
$order=$_REQUEST["order"];


include_once './Backend/config/Database.php';
include_once './Backend/model/Inventory.php';
include_once './Backend/model/Orders.php';

 //Instantiate DB and connect 
 $database = new Database();
 $db = $database->connect();


 $inventory = new Inventory($db);


?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       
    <link rel="stylesheet" href="css/orders.css" >
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
  <h3>Place your orders here</h3>
    <form method="post">
      <input type="text" name="user" placeholder="Username" required="required" readonly value=<?php echo $_SESSION['email']?> />
      <input type="text" name="order" placeholder="Order" required="required"  readonly value=<?php echo $order;?> />
      <input type="text" name="qty" placeholder="Quantity ordered" required="required"/>
    

<p>Don't have an account? <a href="customersignup.php">Sign Up here </a></p>
        <button type="submit" class="btn btn-primary btn-large" name="ordersubmit">Place Order</button>
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


if(isset($_POST['ordersubmit']))
{
	$error ="";
	$email = $_POST['email'];
    $order = $_POST['order'];
    $qty = $_POST['order'];
    
   

	$sql= "INSERT INTO orders( first_name, email, account_password, customer_id FROM customer WHERE email='$user'";


	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
   
    if ($row===null){
        echo "<script>alert('Wrong password or email')</script>";
    }else{
    $hash=$row["account_password"];
	$auth = password_verify($_POST['password1'], $hash);
	if ($auth==TRUE){
        session_start();
        $result = mysqli_query($conn, $sql);
	   $data = $result->fetch_assoc();
       $_SESSION['userId'] = $data['customer_id'];
       $_SESSION['firstname'] = $data['first_name'];
        echo $_SESSION['userId'];
        echo  $_SESSION['firstname'];
        echo "Hi";

	 header('location:view.php');
	}elseif($auth==FALSE){
        
        echo '<script type="javascript">
        console.log("ewjfd")
        alert("You entered the wrong password. Please try again")
        
        </script>';
	}};
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
