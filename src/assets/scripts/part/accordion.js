import BadgerAccordion from "badger-accordion"

export default function accordion(){
    
    // Creating a new instance of the accordion
    const accordionDomNode = document.querySelector('.js-badger-accordion');
    const accordion = new BadgerAccordion(accordionDomNode);
}