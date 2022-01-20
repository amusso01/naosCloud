let lastScrollPosition = 0,
    tick = false;  

const burger = document.getElementById("hamburgerBtn")
const mainMenu = document.getElementById("mainNav")
const sideMenu = document.getElementById("mainNavSub")

export default function hamburger() {
	burger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("active_mobile")
		sideMenu.classList.toggle("active_mobile")
		burger.classList.toggle("is-active")
	});
  
  window.addEventListener("scroll", function(e){
    lastScrollPosition = window.scrollY;
    if (!tick) {
      setTimeout(function () {
        closeMenu(lastScrollPosition);
        tick = false;
      }, 100)
    }
    tick = true;
  })

}


function closeMenu(position){
  if(position >= 20 && burger.classList.contains('is-active')) {
    mainMenu.classList.toggle("active_mobile")
		sideMenu.classList.toggle("active_mobile")
		burger.classList.toggle("is-active")
  }
}