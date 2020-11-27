<?php
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "freezelink";



    //Create connection
    $conn = new mysqli($servername, $username, $password,$dbname);
    

    //Check connection
    if ($conn->connect_error){
        die("Connection failed:".$conn->connect_error);
    }else{
      echo "Connection successful";
    };
    $sql = "SELECT * FROM contactus";
    $result = $conn->query($sql);
  

?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/admincontact.css" >
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-dark fixed-top bg-custom flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Freezelink Limited </a>
      
        <input type="text" id="searchbar" class="form-control form-control-primary w-100" placeholder="Search..." >
        <i class="fa fa-search" aria-hidden="true"></i>
        <span><img src="images/whatwedo.png" alt="User Image" class="userimage"></span>
        <ul class="navbar-nav px-3">
        
        <li class="nav-item text-nowrap">
  
            <a class="nav-link" href="#">Logout</a>
        </li>
        </ul>
    </nav>

    <div class="sidenav">
            <a href="#orders">Customer</a>
            <a href="#cars">Warehouse</a>
            <a href="#clients">Inventory</a>
            <a href="#contact">Employees</a>
            <a href="adminpartner.php">Partners</a>
            <a href="contactinfo.php">Contact and Messages </a>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        
    <div id="orders">
      <h3>Contact Us</h3>
      <hr>
    
    <div class="table-responsive">
      <table class="table table-dark">
  
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Messages</th>
          </tr>
        </thead>
        <tbody id="contacting">
        <?php

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {    
              $num=1
          ?>		

            <tr id="contacting2">
                <td><?php echo $row["messageid"];  ?></td>
                <td><?php echo $row["first_name"]; ?></td>
                <td><?php echo $row["last_name"]; ?></td>
                <td><?php echo $row["email"]; ?></td>
                <td><?php echo $row["messages"]; ?></td>
      	
            </tr>
	  
        <?php	
          } }
        ?>
	
         
        </tbody>
            
      </table>
    </div>
</div>



    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script scr="js/jquery-3.5.1.js"></script>
    <script src="js/admincontactus.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 