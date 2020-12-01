
//Carousel
$('#myCarousel').carousel({
  interval: 1000
})

$('.carousel .carousel-item').each(function() {
  var minPerSlide = 4;
  var next = $(this).next();
  if (!next.length) {
      next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i = 0; i < minPerSlide; i++) {
      next = next.next();
      if (!next.length) {
          next = $(this).siblings(':first');
      }

      next.children(':first-child').clone().appendTo($(this));
  }
});


//webmode=localStorage.getItem("webmode");
console.log(webmode);

document.addEventListener('DOMContentLoaded', () => {
  console.log("Hi!")

 var themeStylesheet = document.getElementById('theme');
 console.log(themeStylesheet)
  if (webmode==="lightmode"){
    themeStylesheet.href='css/viewlight.css';
  }else{
    themeStylesheet.href='css/viewdark.css';
  }
})