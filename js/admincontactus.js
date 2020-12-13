$(document).ready(function(){
    console.log("Hi")
    $('#searchbar').on("keyup", function(){
        var value=$(this).val().toLowerCase();
        console.log(value)
        console.log($("#contacting tr"))
        $("#contacting tr").filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(value)>-1)
        })
    })
})



