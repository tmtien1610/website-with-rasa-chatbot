var header = document.querySelector(".subnav");
var origOffsetY = header.offsetTop;
var nav = document.querySelector(".topnav");
function onScroll(e) {
  window.scrollY >= origOffsetY
    ? nav.classList.remove("d-none")
    : nav.classList.add("d-none");
}
document.addEventListener("scroll", onScroll);
