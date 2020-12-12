<?php

include_once './Backend/config/Database.php';
include_once './Backend/model/Inventory.php';
include_once './Backend/model/Warehouse.php';

 //Instantiate DB and connect 
 $database = new Database();
 $db = $database->connect();


 $info = new Inventory($db);
 $result = $info->getInventory();

 $warehouse = new Warehouse($db);
 
 session_start();
 if(!isset($_SESSION['userId'])){ header('location:adminlogin.php');}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/admininventory.css" >
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
  
            <a class="nav-link" href="adminlogout.php">Logout</a>
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
      <h3>Inventory</h3>
      <hr>

      <!-- Card showing the total inventory -->
      <div class="row partnerscard">
        <div class="col-sm-4  mycard">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Medicine</h4>
        
              <h1 class="card-text"><?php ?></h1>
            
            </div>
          </div>
        </div>
        
        <!-- The data table  -->
        <div class="table-responsive">
      <table class="table table-striped table-bordered">
  
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Class</th>
            <th scope="col">Warehouse Location</th>
            <th scope="col">Quantity In Stock</th>
            <th scope="col">Price per piece</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody id="contacting">
        <?php
        
while ( $row = $result->fetch(PDO::FETCH_ASSOC)){
         
  $second=$warehouse->getWarehouseLocation($row["warehouse_id"]);
  while ( $row2 = $second->fetch(PDO::FETCH_ASSOC)){
     $warehouseLocation= $row2['street_name'] ;
  };
      
          ?>		

            <tr id="contacting2">
                <td><?php echo $row["inventory_id"];  ?></td>
                <td><?php echo $row["inventory_name"]; ?></td>
                <td><?php echo $row["inventory_category"]; ?></td>
                <td><?php echo $warehouseLocation; ?></td>
                <td><?php echo $row["qty_in_stock"]; ?></td>
                <td><?php echo $row["price"]; ?></td>
           
                <td>
                <a id="mybtn1" data-toggle="modal" class="text-primary" data-target="#exampleModalCenter2">
                <i class="fa fa-fw fa-edit"></i>
                      </a>
          
                <a href="Backend/config/delete.php?table=employee&id=<?php echo $row['employee_id'];?>" class="text-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i></a> | 
            </td>
           
            </tr>
            
	  
        <?php	
      
          } 
        ?>
	
         
        </tbody>
            
      </table>
    </div>

    <button type="button" id="mybtn1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                       Add more inventory
                      </button>
</div>

      
    
<!--Form to add more inventory data-->
    
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
                    
                      <form method="POST"  action="Backend/config/add.php?table=inventory" enctype="multipart/form-data" >
                        <p>Please enter the information below</p>
                        
                        <table>
                            <tr>
                                <td>Product Name:</td>
                                <td><input  type="text" required placeholder="Enter product name here" class="form-control" name="product"></td>
                               

                            </tr>
                            <br>
                            <tr>
                                <td>Product Type:</td>
                                <td><input  type="text"  required placeholder="Enter product type here"  class="form-control" name="producttype"></td>
                               
                            </tr>
                            <br>
                            <tr>
                                <td>Warehouse Street Name:</td>
                                <td><input  type="text"  required placeholder="Enter warehouse street here"  class="form-control" name="streetname"></td>
                            </tr>
                            <tr>
                                <td>Quantity in Stock:</td>
                                <td><input  type="text"  required placeholder="Enter quantity in stock here"  class="form-control" name="qtyinstock"></td>
                            </tr>
                            <tr>
                                <td>Price per piece:</td>
                                <td><input  type="number"  required placeholder="Enter price per piece here"  class="form-control" name="priceperpiece"></td>
                               
                            </tr>


                            

                        </table>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <input type="submit" value="Update" name="submit" class="btn btn-primary">
                          </div>
                      </form>
                      <p id="result"></p>
                    </div>
                    
                  </div>
                </div>
              </div>
    </div>
</div>




      


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

var regexp = /^\d+\.\d{0,2}$/;

<?php

// Insert into the table after adding the employee
if (isset($_POST['submit'])){

  
  $product = $_POST['product'];
  $producttype=$_POST['producttype'];
  $streetname=$_POST['streetname'];
  $qtyinstock=$_POST['qtyinstock'];
  $priceperpiece=$_POST['priceperpiece'];
  
  $warehouseid=null;
  $third=$warehouse->getWarehouseid($streetname);
  while ( $row3 = $third->fetch(PDO::FETCH_ASSOC)){
    $warehouse= $row3['warehouse'] ;

  
  }
  if($warehouse===null){
    echo '<script>
    alert("The warehouse location entered does not exist");
    </script>';
  }else{
    
    $sql="INSERT INTO inventory(inventory_name, inventory_category, warehouse_id, qty_in_stock, price) VALUES('$product', '$producttype','$warehouseid', '$qtyinstock', '$priceperpiece')";
    if ($db->query($sql)===true){
        
        echo '<script>
        swal({
            title: "Success!",
            text: "You successfully added an employee to the database",
            icon: "success",
          }); 
        
        </script>';
        
    }else{
        echo '<script>
        swal({
            title: "Error",
            text: "You were unable to enter the data into the database",
            icon: "error",
          }); 
   }
        
        </script>';
        
    };


  }
  

}

