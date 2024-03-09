window.onscroll = function() {
    var scrollTop = window.pageYOffset || (document.documentElement || document.body.parentNode || document.body).scrollTop;
    var scrollingDiv = document.getElementById("scrollingDiv");
    scrollingDiv.style.top = (45 + scrollTop) + "px";
  };
  