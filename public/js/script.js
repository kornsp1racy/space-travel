// Switch Button Landingpage
const btn = document.querySelector(".switch-btn");
const video = document.querySelector(".video-container");

btn.addEventListener("click", function () {
    if (!btn.classList.contains("slide")){
        btn.classList.add("slide");
        video.pause();
    } else {
        btn.classList.remove("slide");
        video.play();
    }
});

// preloader
const preloader = document.querySelector(".preloader");

window.addEventListener("load", function () {
    preloader.classList.add("hide-preloader");
})

// Back to top Button
// Get the button
let mybutton = document.getElementById("btn-back-to-top");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (
    document.body.scrollTop > 50 ||
    document.documentElement.scrollTop > 50
  ) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// Glow Effect Mouse/Pointer
// document.addEventListener("mousemove", function(event) {
//   var x = event.clientX;
//   var y = event.clientY + window.scrollY; // add scroll position to y value
//   var pointer = document.getElementById("pointer");
//   var glowing = document.getElementById("glowing");
//   pointer.style.left = x + "px";
//   pointer.style.top = y + "px";
//   glowing.style.left = x - 20 + "px";
//   glowing.style.top = y - 20 + "px";
// });

// document.addEventListener("scroll", function(event) {
//   var y = event.target.scrollingElement.scrollTop + event.clientY; // add scroll position to y value
//   var pointer = document.getElementById("pointer");
//   var glowing = document.getElementById("glowing");
//   pointer.style.top = y + "px";
//   glowing.style.top = y - 20 + "px";
// });

// document.addEventListener("mouseover", function(event) {
//   var glowing = document.getElementById("glowing") ? document.getElementById("glowing") : null;
//   if(glowing != null){
//     glowing.style.opacity = 1;
//   }
// });

// document.addEventListener("mouseout", function(event) {
//   var glowing = document.getElementById("glowing");
//   glowing.style.opacity = 0;
// });
// document.addEventListener("mouseover", function(event) {
//   var glowing = document.getElementById("glowing"); // change ID to "glowing"
//   if(glowing != null){
//     glowing.style.opacity = 1;

//   }
// });

// document.addEventListener("mouseout", function(event) {
//   var glowing = document.getElementById("glowing"); // change ID to "glowing"
//   if(glowing != null){
//     glowing.style.opacity = 0;
//   }
// });

// document.addEventListener('mouseout', () => {
//   glowPointer.style.opacity = 0;
// });