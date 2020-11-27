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
    <link rel="stylesheet" href="css/adminpartner.css" >
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
            <a href="admininventory.php">Inventory</a>
            <a href="adminemployee.php">Employees</a>
            <a href="adminpartners.php">Partners</a>
            <a href="admincontact.php">Contact and Messages </a>
    </div>

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        
    <div id="orders">
      <h3>Partners</h3>
      <hr>


      <div class="row">
        <div class="col-lg-12">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Number of Partner Organisations</h5>
               
               
                <p class="card-text">Equipment Donated:</p>
                
               
          
            </div>
            </div>
        </div>


      <?php

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {    
              $num=1
          ?>		 

      <div class="row">
        <div class="col-lg-6">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo $row["organisation_name"]; ?></h5>
               
                <p class="card-text"> <?//php echo $row["partner_logo"]; ?></p>
                <p class="card-text">Equipment Donated:</p>
                <p class="card-text"><?php echo $row["equipment_donated"]?> </p>
                <button type="button" id="mybtn1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Edit
                      </button>
                <a href="#" class="btn btn-secondary" onclick="alert('Do you want to delete this?')">Delete</a>
          
            </div>
            </div>
        </div>

         
        <?php	
          } }
        ?>
    

    
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
                                <th>Organisation Name:</th>
                                <th><input type="text" required placeholder="Enter org name here" name="orgname"></th>

                            </tr>
                            <br>
                            <tr>
                                <th>Equipment Donated:</th>
                                <th><input type="text" required placeholder="Enter equipment here" name="orgname"></th>
                            </tr>
                            <tr>
                                <th> Company Logo</th>
                                <th><input  type="file" name="fileToUpload" id="fileToUpload" required> </th>
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
    <script scr="js/jquery-3.5.1.js"></script>
    <script src="js/admincontactus.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"> </script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html> 