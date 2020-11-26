
function myFunction() {
    var element = document.body;
    element.classList.toggle("dark-mode");
    
    var x = document.getElementById("mysecret");
    console.log(x)
    if (x.innerHTML === "Dark Mode") {
      x.innerHTML = "Light Mode";
    } else {
      x.innerHTML = "Dark Mode";
    }

}


webmode=localStorage.getItem("webmode");
console.log(webmode);

document.addEventListener('DOMContentLoaded', () => {
  console.log("Hi!")

 var themeStylesheet = document.getElementById('theme');
 console.log(themeStylesheet)
  if (webmode==="lightmode"){
    themeStylesheet.href='css/homelight.css';
  }else{
    themeStylesheet.href='css/homedark.css';
  }
})