/* topnavigatie verbergen bij scrollen */
var scrollTreshhold = 500;
var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("topnavbar").style.top = "0";
  } else {
    if (window.pageYOffset > scrollTreshhold) {
      document.getElementById("topnavbar").style.top = "-60px";
    }
  }
  prevScrollpos = currentScrollPos;
} 
