<!DOCTYPE html>
<html>
    <head>
        <title>Welcome to Freezelink</title>
        <link rel="stylesheet" href="css/main.css">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Amiri&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;1,500&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="js/colormode.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>
    <body> 
       <main>

       <!--Form-->
         <span class="align-items-center">
            <div class="image">
                <img src="images/freezelinklogo.png" alt="logo" class="center">
                <div>
                    <p>Welcome to Freezelink Limited! Are you a faculty member or a customer?</p>
                    <form>
                      <button href="#exampleModalCenter" type="button" id="mybtn1" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Customer
                      </button>
                       <br>
                       <a href="adminlogin.php" type="button" id="mybtn1" class="btn btn-primary" >
                        Employee
                      </a>
                     

                    </form>
                </div>
            </div>
          </span>
         
           
            <!--Modal for Customer -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Viewing Mode</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                      <form id="myform">
                        <p>Which would you like to view our website in?</p>
                        <input type="radio" class="mymode" id="darkmode" name="mode" value="darkmode">
                        <label for=darkmode>Dark Mode</label><br>
                        <input type="radio" class="mymode" id="lightmode" name="mode" value="lightmode">
                        <label for="lightmode">Light Mode</label><br>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            <a type="submit" onclick="getdisplaymode()" href="home.html" type="button" id="togglemode" class="btn btn-primary">Go to Site</a>
                          </div>
                      </form>
                      <p id="result"></p>
                    </div>
                    
                  </div>
                </div>
              </div>



              <!--Modal for Employee Login-->


              <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Employee Login </h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    
                      <form id="myform" action="adminlogin.php" method="POST">
                      <p>Kindly provide your employee login details below</p>
                        <table>
                            <tr>
                                    <td> Email: </td>
                                    <td><input  type="text" required placeholder="Enter email name here" class="form-control" name="email"></td>
                            </tr>
                            <br>
                            <br>
                            <tr>
                                    <td> Password: </td>
                                    <td><input  type="password" required placeholder="Enter password here" class="form-control" name="password1"></td>
                            </tr>
                            
                        </table>
                       
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                            <input type="submit" value="Login" href="" name="login" class="btn btn-primary">
                          </div>
                      </form>
                      <p id="result"></p>
                    </div>
                    
                  </div>
                </div>
              </div>
       </main>
       
       
    </body>
</html>

