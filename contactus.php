<!DOCTYPE html>
<html>
    <head>
        <title>Contact Us</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/contact.css">
        <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/contact.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    

    
      </head>

    <body>  
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
        
                    
                  <a class="nav-item nav-link active"  style="color:white;" href="contactus.php">Contact Us </a>
                  <a class="nav-item nav-link" style="color:white;" href="faq.html">FAQ</a>


                  
                </div>
              </div>
            </nav>
          
    </header>
        <main>

             <div class="container"> 
                <div class="row">
                    <div class="aboutus col-md-6">
                        <h1 class="allow">Got A Problem?</h1>
                        <p>Freezelink is Ghana’s leading professional third party logistics company, dealing in cold chain transportation.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin pulvinar molestie venenatis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus vel ex eget felis interdum scelerisque. Sed est dolor, bibendum id ex eget, accumsan euismod ipsum. Maecenas condimentum dignissim fringilla. Sed in ante ut augue posuere congue a in erat. Nunc tempor dui in risus faucibus, sit amet rhoncus libero aliquet. Pellentesque sollicitudin est accumsan, congue dolor vel, bibendum tellus. Morbi arcu nisi, finibus in aliquet rhoncus, rutrum in nunc</p>
                        <h3 class="allow" style="text-align:center">Find Us At</h3>
                        <div class="map">
                        <iframe style="margin:auto; height: auto; width: fit-content; border: 3px solid #43907f; " id="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3970.7265527753393!2d-0.14122338576222937!3d5.607347495934881!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfdf85647736060d%3A0xee576f62d47b657d!2sFreezeLink!5e0!3m2!1sen!2sgh!4v1606490642337!5m2!1sen!2sgh" width="400" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                    <br class="visible-xs">
                    <div class="contactus col-md-6">
                    <form method="POST" action="contactus.php" id="form">
                        <label>Name</label><br>
                    
                        <input type="text" placeholder="First Name" name="fname" class="naming firstname">
                        <input type="text" required placeholder="Last Name" name="lname" class="naming">
                        <label>Email</label>
                        <input type="text" required placeholder="Email" name="email" id="email">
                        <br>
                        <p >Wazzup</p>
                        <p id="emailHelp" style="color:red;"></p>
                        <label>Message</label><br><br>
                        <textarea type="text" style="width:20em;" required placeholder="Message" name="messages" class="message"></textarea>
                        <input type="submit" required placeholder="Submit" name="submitrequest" id="submit">
                    </form>
                    </div>
            </div>
            </div>
        </main>
        <br>
        <br>
        
        
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

<script>
 


// Check email validity when field loses focus
email=document.getElementById("email");
console.log(email)
document.getElementById("email").addEventListener("focus", e => {
console.log("hi")
  // Match a string of the form xxx@yyy.zzz
const emailRegex = /.+@.+\..+/;

let validityMessage = "";
if (!emailRegex.test(e.target.value)) {
    validityMessage = "Invalid address";
  
    
    email.style.border= "5px";
    email.style.borderColor="blue";
    console.log("Yes")
}else{
  validityMessage = "Correct address";

  console.log("No")
}
document.getElementById("emailHelp").textContent = validityMessage;
document.getElementById("emailHelp").style.color='red';
});

</script>
</body>
</html>

<?php
   

 
 
   if(isset($_POST["submitrequest"])){

      $firstname=$_POST["fname"];
      $lastname=$_POST["lname"];
      $email=$_POST["email"];
      $messages=$_POST["messages"];
      
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "freezelink";
      
     //Create connection
     $conn = new mysqli($servername, $username, $password,$dbname);
      
  
     //Check connection
     if ($conn->connect_error){
         die("Connection failed:".$conn->connect_error);
     }
 
  
      
      $sql="INSERT INTO contactus(first_name, last_name, email, messages) VALUES('$firstname', '$lastname','$email', '$messages')";
    if (empty($firstname) || empty($lastname) ){

        echo '<script>
        swal({
          title: "Warning",
          text: "Fill all fields of this form",
          icon: "warning",
        }); 
        </script>';
      preventDefault();
    }else{
      
        if ($conn->query($sql)===true){
          echo '<script>
          swal({
            title: "Message sent",
            text: "You successfully sent this message.",
            icon: "success",
          }); 
          </script>';
          
      }else{
          echo "Error".$sql."<br>".$conn->error;
      }
    
    }
  };

    
?>
