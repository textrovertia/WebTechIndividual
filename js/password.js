 password=document.getElementsByClassName("password")
console.log(password);
message=document.getElementsByTagName("small")
email=document.getElementsByClassName("password")
console.log(message)
var strongPassword= new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})");
var passwordresult=strongPassword.test(password); 
console.log(passwordresult);
if(!passwordresult){
    message.innerHTML("Your password is not strong enough");
}




