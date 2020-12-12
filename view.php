<?php
 session_start();
include_once './Backend/config/Database.php';
require_once './Backend/model/Inventory.php';

//Create a new class called View to contain the HTML card code
class View{
  public $src;
  public $cardtitle; 
  
  public function __construct__(){
    $this->src=$src;
    $this->cardtitle=$cardtitle;

  }


  public function createNew($src, $cardtitle, $cardmessage, $price, $qty){
    if(isset($_SESSION['customerId'])){ 
      $location="orders.php" ;
    }else{
      $location="customerlogin.php";
    }

   
    $card= <<<__DISPLAY
    <div class="col-sm-4" style="margin-bottom:20px;">
    <div class="card mycard" style="width: 18em; border-radius:15px;">
      <img class="card-img-top" src='$src' alt="Card image cap" style="border-radius:15px 15px 0px 0px;">
 
        <div class="card-body">
        <h3 class="card-title">$cardtitle</h3>  
                    
                     $cardmessage
                     <br>
                     <p>Price: $price</p>
                     <p>Qty in Stock: $qty </p>
                     
                    <span>Click here to make a purchase:</span>  <a href=$location?order=$cardtitle> <i class="fas fa-shopping-cart"></i></a>
                      
                  </div>
                  </div>
            </div>
    
    __DISPLAY;
    echo '<script language="javascript">
    var ele=document.getElementsByClassName("mycard");
    console.log(ele);
    webmode=localStorage.getItem("webmode");
    console.log(webmode);
    if (webmode==="lightmode"){
     ele.className="card";
     echo
     console.log("This is light code")
    }else{
      ele.className+="bg-dark";
      console.log("This is dark code")
    }

    </script>';
    
    return $card;
  }
}

//create a new instance of the View class
$info=new View;

//create a new instance of the Inventory class
//Instantiate DB and connect 
$database = new Database();
$db = $database->connect();

$inventory=new Inventory($db);
$medicine = $inventory->getItem('medicine');

  
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Freezelink Limited</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link id="theme" rel="stylesheet" href="css/viewlight.css">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/view.js"></script>
        <script src="https://kit.fontawesome.com/95e3cf507f.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body class="body">
  
      <header>
        <!--Menubar-->
        
          <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
              <a class="navbar-brand" href="#"><img src="images/freezelinklogo.png" class="logo"> </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNavAltMarkup" >
                <div class="navbar-nav" id="right-menu">
                  <a class="nav-item nav-link" style="color:white;" href="home.html" >Home <span class="sr-only">(current)</span></a>
                  <div class="nav-item dropdown"></li>
                    <a class="nav-link dropdown-toggle" style="color:white;"  href="view.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        View Our Products
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <a class="nav-item nav-link dropdown-item" href="view.php#medicine">Medicine</a> 
                      <a class="nav-item nav-link dropdown-item" href="view.php#fruits">Fruits</a> 
                      <a class="nav-item nav-link dropdown-item" href="view.php#vegetables">Vegetables</a>
                      <a class="nav-item nav-link dropdown-item" href="view.php#meat">Meat</a>
                      <a class="nav-item nav-link dropdown-item" href="view.php#dairy">Dairy</a>
                      <a class="nav-item nav-link dropdown-item" href="view.php#fish">Fish</a>
                          
                      
                    </div>
                  </div>
                   <a class="nav-item nav-link"  style="color:white;" href="contactus.php">Contact Us </a>
                  <a class="nav-item nav-link" style="color:white;" href="faq.html">FAQ</a>


                  
                </div>
              </div>
            </nav>
          
    </header>


    

    <main>
    <?php
   
     if(isset($_SESSION['customerId'])){ 
       $t=$_SESSION['firstname'] ;
       echo " <h2>Welcome to the Freezelink site, $t ! You have currently ordered</h2>";
     }



    ?>


    <div class="container">
    
        <h1>We have a wide range of products available to you </h1>
    </div>
    <!--Medicine-->
    <div class="container" id="medicine">
        <h2>Medicine</h2>
        
        <?php 
        while ( $row = $medicine->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/medicine.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); }
      
       ?>

        </div>

   
  
    </div>

    <!--Fruit-->
    <div class="container" id="fruits">
      <h2>Fruit</h2>
      <?php
        $fruit = $inventory->getItem('fruit');
        while ( $row = $fruit->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/apples.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); 
        
        }

      ?>
    
    
           
    
    </div>

    <!--Vegetables-->
    <div class="container" id="vegetables">
      <h2>Vegetables</h2>
      <?php
        $vegetables = $inventory->getItem('vegetables');
        while ( $row = $vegetables->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/vegetables.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); 
        }

      ?>
    
    
    </div>

    <!--Dairy-->
    <div class="container" id="dairy">
      <h2>Dairy</h2>
      <?php
        $dairy = $inventory->getItem('dairy');
        while ( $row = $dairy->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/dairy1.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); 
        }

      ?>
    
    
    
    </div>

    <!--Meat-->
    <div class="container" id="meat">
      <h2>Meat</h2>
      <?php
        $meat = $inventory->getItem('meat');
        while ( $row = $meat->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/meat.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); 
        }

      ?>
    
    
    </div>

   <div class="container" id="fish">
     <h2>Fish</h2>
     <?php
        $fish = $inventory->getItem('fish');
        while ( $row = $fish->fetch(PDO::FETCH_ASSOC)){
          echo $info->createNew("images/fish.jpg", $row['inventory_name'], "We sell paracetamol in bulk and transport it to the various locations around Ghana.", $row["price"], $row["qty_in_stock"]); 
        }

      ?>
     
    
   </div>





    </div>
      <div class="container text-center">
          <h1 class="font-weight-light mb-5">Bootstrap 4 Multi Item Carousel Example</h1>
          <div class="row mx-auto my-auto">
              <div id="myCarousel" class="carousel slide w-100" data-ride="carousel">
                  <div class="carousel-inner w-100" role="listbox">
                      <div class="carousel-item active">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid productimage" src="images/medicine.jpg" >
                              <p>Medicine</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid productimage" src="images/fish.jpg">
                              <p>Fish</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid productimage" src="images/fruits.jpg">
                              <p>Meat</p>
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid productimage" src="images/dairy2.jpg">
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid productimage" src="http://placehold.it/350x180?text=5">
                          </div>
                      </div>
                      <div class="carousel-item">
                          <div class="col-lg-4 col-md-6">
                              <img class="img-fluid" src="http://placehold.it/350x180?text=6">
                          </div>
                      </div>
                  </div>
                  <a class="carousel-control-prev  w-auto" href="#myCarousel" role="button" data-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next w-auto" href="#myCarousel" role="button" data-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="sr-only">Next</span>
                  </a>
              </div>
          </div>
      </div>


</main>


<!-- The footer of the document -->
        <footer class="panel-footer">
          <div class="container">
            <div class="row">
              <section id="hours" class="col-sm-4">
                <span>Hours:</span><br>
                Mon-Fri: 9:00am - 5:00pm<br>
                Sat & Sun: Closed<br>
                <hr class="visible-xs myfooter">
              </section>
              <section id="address" class="col-sm-4">
                <span>Address:</span><br>
                6 Grosvenor Street<br>
                Accra, Ghana
                <hr class="visible-xs myfooter">
              </section>
              <section id="contactus" class="col-sm-4">
                <p>Call at +233 50 873 2123</p>
                <div class="row">
                  <i class="fa fa-facebook-square middle col-sm-4" aria-hidden="true"></i>
                  <i class="fa fa-twitter-square middle col-sm-4" aria-hidden="true"></i>
                  <i class="fa fa-instagram middle col-sm-4" aria-hidden="true"></i>

                </div>
              </section>
            </div>
            <div class="text-center">&copy; Copyright Freezelink Limited Ghana 2020</div>
          </div>
        </footer>



        
        <script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>
    <!--scripts loaded here-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="carousel.js"></script>
    <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

        <script src="js/view.js"></script>


    </body>
</html>