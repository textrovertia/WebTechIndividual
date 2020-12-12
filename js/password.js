password=document.getElementsByClassName("password")
console.log(password);
email=document.getElementsByClassName("email")
var strongPassword= new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
var passwordresult=strongPassword.test(password); 
console.log(passwordresult);
