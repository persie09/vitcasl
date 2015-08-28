'use strict';

/* ==== Mobile Menu ==== */

(function( window ){
  var body = document.body,
    mask = document.createElement("div"),
    toggleSlideLeft = document.querySelector( ".toggle-slide-left" ),
    activeNav,
    btn = document.querySelector('.btn-casl-menu button'),
    links = document.querySelectorAll('.responsive-menu a'),
    open=false;
  mask.className = "mask";
  /* slide menu left */
  toggleSlideLeft.addEventListener( "click", function(){
    
    if(!open){
      btn.classList.add('close');
      toggleSlideLeft.classList.add("shift-left");
      body.classList.add("sml-open");
      document.body.appendChild(mask);

      activeNav = "sml-open";
      open = true;
    }
    else{
      btn.classList.remove('close');
      body.classList.remove(activeNav);
      toggleSlideLeft.classList.remove("shift-left");
      activeNav = "";
      document.body.removeChild(mask);
      open = false;
    }

  });

  for(var i=0; i<links.length; i++){
      links[i].addEventListener("click", function(){
      btn.classList.remove('close');
      open = false;
      body.classList.remove(activeNav);
      toggleSlideLeft.classList.remove("shift-left");
      activeNav = "";
      document.body.removeChild(mask);
    });
  }

  /* hide active menu if mask is clicked */
  mask.addEventListener( "click", function(){
    btn.classList.remove('close');
    open = false;
    body.classList.remove(activeNav);
    toggleSlideLeft.classList.remove("shift-left");
    activeNav = "";
    document.body.removeChild(mask);
  } );

})( window );

$(document).ready(function () {
    $("nav").on("click", "a", function (event) {
        $("nav a.active").removeClass("active");
        $(this).addClass("active");
    });
});    