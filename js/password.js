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
document.getElementById("emailHelp").color='red';
});
