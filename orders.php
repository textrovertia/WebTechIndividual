
<?php session_start();
$order=$_REQUEST["order"];


include_once './Backend/config/Database.php';
include_once './Backend/model/Inventory.php';
include_once './Backend/model/Customer.php';
include_once './Backend/model/Orders.php';

 //Instantiate DB and connect 
 $database = new Database();
 $db = $database->connect();


 $inventory = new Inventory($db);
 $customer =new Customer($db);


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
      <input type="text" name="email" placeholder="Username" required="required" readonly value=<?php echo $_SESSION['email']?> />
      <input type="text" name="order" placeholder="Order" required="required"  readonly value=<?php echo $order;?> />
      <input type="text" name="qty" placeholder="Quantity ordered" required="required"/>
        <button type="submit" class="btn btn-primary btn-large" name="ordersubmit">Place Order</button>
    </form>
</div>


   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    </body>
</html>



<?php
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
    $qty = $_POST['qty'];

    $second=$customer->getCustomerId($email);
    while ( $row2 = $second->fetch(PDO::FETCH_ASSOC)){
        $customer_id=$row2['customer_id'];
    }
  
    $third=$inventory->getInventoryId($order);
    while ( $row3 = $third->fetch(PDO::FETCH_ASSOC)){
        $inventory_id=$row3['inventory_id'];
    }
   
    
	$sql= "INSERT INTO orders( inventory_id, customer_id, qty_ordered) VALUES('$inventory_id', '$customer_id', '$qty') ";
    if ($conn->query($sql)===true){
        echo '<script>
        swal({
            title: "Good job!",
            text: "You placed your order! An employee will be in touch with you shortly! Thank you for patronizing Freezelink Limited",
            icon: "success",
          });
        
        </script>';
        echo ' <a href="customerlogout.php" class="btn btn-primary btn-large" style="float:right;" name="logout">Logout</a>';
      
        
    }else{
        echo '<script>
        swal({
            title: "Error!",
            text: "We could not enter your order!",
            icon: "error",
          });
        
        </script>';
      
        echo "Error".$sql."<br>".$conn->error;
    }
   };
?>
