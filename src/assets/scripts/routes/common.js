import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import { sideNav } from "../part/sideNav";
import { dropdown } from "../part/dropdown";
import search from "../part/search";
import accordion from "../part/accordion"

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

    //  ACCORDION
		const accordionDiv = document.getElementById('js-badger-accordion')
		if (typeof(accordionDiv) != 'undefined' && accordionDiv != null)
		 {
			 accordion();
		 }


    
		// Lazy load image with lozad.js https://github.com/ApoorvSaxena/lozad.js
		const observer = lozad() // lazy loads elements with default selector as '.lozad'
    observer.observe()
	},

	finalize() {
		// JavaScript to be fired on all pages, after page specific JS is fired
	},
};
