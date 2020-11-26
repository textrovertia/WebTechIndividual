dark=document.getElementById("darkmode");
light=document.getElementById('lightmode');
console.log("dark");

console.log("lightmode");

function displayRadioValue() { 
    document.getElementById("result").innerHTML = ""; 
    var ele = document.getElementsByTagName('input'); 
      
    for(i = 0; i < ele.length; i++) { 
          
        if(ele[i].type="radio") { 
          
            if(ele[i].checked) 
                document.getElementById("result").innerHTML 
                        += ele[i].name + " Value: " 
                        + ele[i].value + "<br>"; 
        } 
    } 
} 


function getdisplaymode(){
    var ele=document.getElementsByClassName("mymode");
    for(i = 0; i < ele.length; i++) { 
          
        if(ele[i].type="radio") { 
          
            if(ele[i].checked) {
                const webmode=ele[i].value;
                localStorage.setItem("webmode",webmode);
                console.log (webmode)
            }
               

        } 
    } 
}

