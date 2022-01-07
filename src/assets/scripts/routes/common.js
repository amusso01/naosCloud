import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import { sideNav } from "../part/sideNav";
import { dropdown } from "../part/dropdown";
import search from "../part/search";

export default {
	init() {
		// JavaScript to be fired on all pages

    const hiddenElemnt = document.querySelectorAll('.no-show')
    hiddenElemnt.forEach(element => {element.classList.remove('no-show')});

		// kick off the polyfill!
		smoothscroll.polyfill()

		// Hamburger event listener
		hamburger()

    // SIDE NAVIGATION
    sideNav()
    // DROPDOWN MENU
    dropdown()

    // SEARCH BAR ASC DESC
    search()


    
		// Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
		const observer = lozad() // lazy loads elements with default selector as '.lozad'
    observer.observe()
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
