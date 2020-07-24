// ACCORDION
var accordions = document.getElementsByClassName("accordion");

for (var i = 0; i < accordions.length; i++) {
  accordions[i].onclick = function() {
    this.classList.toggle('is-open');

    var content = this.nextElementSibling;
    if (content.style.maxHeight) {
      // accordion is currently open, so close it
      content.style.maxHeight = null;
    } else {
      // accordion is currently closed, so open it
      content.style.maxHeight = content.scrollHeight + "px";
    }
  }
}

//HIDE HEADER
$(function(){
  var lastScrollTop = 0, delta = 15;
  $(window).scroll(function(event){
     var st = $(this).scrollTop();
     
     if(Math.abs(lastScrollTop - st) <= delta)
        return;
if ((st > lastScrollTop) && (lastScrollTop>0)) {
     // downscroll code
    $("header").css("top","-80px");

 } else {
    // upscroll code
    $("header").css("top","0px");
 }
     lastScrollTop = st;
  });
});