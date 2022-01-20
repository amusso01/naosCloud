import smoothscroll from "smoothscroll-polyfill";
import lozad from "lozad";
import hamburger from "./../part/hamburger";
import { sideNav } from "../part/sideNav";
import { dropdown } from "../part/dropdown";
import search from "../part/search";
import accordion from "../part/accordion"
import { alternativeLayout } from "../part/alternativeLayout"
import fdCarousel from "../part/fdCaraousel"
import headerSearch from "../part/haederSearch"

export default {
	init() {
		// JavaScript to be fired on all pages

    const hiddenElemnt = document.querySelectorAll('.no-show')
    hiddenElemnt.forEach(element => {element.classList.remove('no-show')});

		// kick off the polyfill!
		smoothscroll.polyfill()

		// Hamburger event listener
		hamburger()

		// Hamburger event listener
		headerSearch()

    // SIDE NAVIGATION
    const sideEl = document.getElementById('mainNavSub')
    if (typeof(sideEl) != 'undefined' && sideEl != null){
      sideNav()
    }

    // Layout change downloads
    const layout = document.getElementById('sortBar')
    if (typeof(layout) != 'undefined' && layout != null){
      alternativeLayout()
    }

    // CAROUSEL
    const caraouselSection = document.getElementById('caraouselSection')
    if (typeof(caraouselSection) != 'undefined' && caraouselSection != null){
      fdCarousel();
    }
    
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
