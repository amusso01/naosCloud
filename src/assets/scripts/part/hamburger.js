export default function hamburger() {
	const burger = document.getElementById("hamburgerBtn")
	const mainMenu = document.getElementById("mainNav")
	const sideMenu = document.getElementById("mainNavSub")

	burger.addEventListener("click", function (e) {
		mainMenu.classList.toggle("active_mobile")
		sideMenu.classList.toggle("active_mobile")
		burger.classList.toggle("is-active")


	});
}
