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
    $sql = "SELECT * FROM partners";
    $result = $conn->query($sql);
  

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/adminpartner.css" >
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
      .sidenav a {
        padding: 6px 8px 6px 16px;
        text-decoration: none;
        color: #222;
        display: block;
      }

      .sidenav a:hover{
        color:#43907f;;
      }

      .icon{
        margin-right:5px;
      }

    </style>
    <script>
      
    </script>

</head>
<body>


    <nav class="navbar navbar-dark fixed-top bg-custom flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Freezelink Limited </a>
      
        <input type="text" id="searchbar" class="form-control form-control-primary w-100" placeholder="Search..." >
        <span><img src="images/whatwedo.png" alt="User Image" class="userimage"></span>
        <ul class="navbar-nav px-3">
        
        <li class="nav-item text-nowrap">
  
            <a class="nav-link" href="logout.php">Logout</a>
        </li>
        </ul>
    </nav>


     <!-- Sidebar -->
     <div class="wrapper">
     <div class="bg-light border-right sidenav" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
      
            <a href="#orders" class="menu-item"><span class="icon" ><i class="fas fa-user"></i></span>Customer</a>
            <a href="adminwarehouse.php"><span class="icon" ><i class="fas fa-warehouse"></i></span>Warehouse</a>
            <a href="admininventory.php"><span class="icon" ><i class="fas fa-boxes"></i></span>Inventory</a>
            <a href="adminemployee.php"><span class="icon" ><i class="fas fa-user-friends"></i></span>Employees</a>
            <a href="adminpartner.php"><span class="icon"><i class="fas fa-handshake"></i></span>Partners</a>
            <a href="admincontact.php"><span class="icon"><i class="fas fa-address-book"></i></span>Messages </a>
      </div>
    </div>
    </div>



    <!--Body-->
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        
    <div id="orders">
      <h3>Partners</h3>
      <hr>
      <div class="row partnerscard">
        <div class="col-sm-4  mycard">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Number of Partner Organisations</h4>
        
              <h1 class="card-text"><?php ?></h1>
            
            </div>
          </div>
        </div>
        

      <?php

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {    
              $num=1
          ?>		 

      <!--Card to show Partner-->
        <div class="container">
              <div class="row">
              
            <div class="card mycard" style="width: 18rem;">
                  <img class="card-img-top" src="images/fish.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h5 class="card-title"><?php echo $row["organisation_name"]; ?></h5>
                    <p class="card-text">Equipment Donated:</p>
                    <p class="card-text"><?php echo $row["equipment_donated"]?></p>
                    <button type="button" id="mybtn1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Edit</button>
                    <button type="button" class="btn btn-danger" onclick="swal()">Delete</button>
              </div>
            </div>
              
              </div>
        </div>
        <?php	
          } }
        ?>
    
<!--Form to edit data-->
    
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Edit Partner Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                      <form id="partnerform" method="POST" action="upload.php" enctype="multipart/form-data" >
                        <p>Please enter the information below</p>
                        
                        <table>
                            <tr>
                                <td>Organisation Name:</td>
                                <td><input  type="text" required placeholder="Enter organisation name here" class="form-control" name="orgname"></td>
                               

                            </tr>
                            <br>
                            <tr>
                                <td>Equipment Donated:</td>
                                <td><input  type="text"  required placeholder="Enter equipment here"  class="form-control" name="equipment"></td>
                               
                            </tr>

                            <tr>
                                <td> Company Logo:</td>
                                <td><input  type="file" name="fileToUpload" id="fileToUpload" required> </td>
                            </tr>

                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <a type="submit" onclick="getdisplaymode()" href="home.html" type="button" id="togglemode" class="btn btn-primary">Update</a>
                          </div>
                      </form>
                      <p id="result"></p>
                    </div>
                    
                  </div>
                </div>
              </div>
    </div>
</div>



        <a href="#" class="btn btn-secondary">Add Car</a>

      


    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="js/admincontactus.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/95e3cf507f.js"></script>
    
</body>
</html> 