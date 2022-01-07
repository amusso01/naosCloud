import { gsap } from "gsap";

export function dropdown(){
  const liItem = document.querySelectorAll('.menu-item-has-children')

   

  liItem.forEach(el => {

    el.addEventListener('click', (e)=>{
      
      el.classList.toggle('open')

      const subMenu = el.querySelector('.sub-menu');
      // GSAP TIMELINE
      const show =  openSub(subMenu)
      const hide = closeSub(subMenu)

      if(subMenu.classList.contains('active')){

        hide.play()
        subMenu.classList.remove('active')
      }else{
        show.play()
        subMenu.classList.add('active')
      }
      
    })
  })

  persistOpen(liItem);

}


function persistOpen(item){
  item.forEach(element => {
    let liSubmenu = element.querySelectorAll('.sub-menu .menu-item');

    liSubmenu.forEach(el => {
      if(el.classList.contains('current-menu-item')){
        const parentUl = el.parentElement
        openSub(parentUl).play()
        element.classList.add('open')
      }
    })
  });
}


function openSub(elements){
  let tl = gsap.timeline({paused:true})
  tl.to(elements, {
    display: 'block',
    opacity: 1,
    pointerEvents: 'all',
    minHeight: '100%',
    duration: 0.3
  })

  return tl;
}

function closeSub(elements){
  let tl = gsap.timeline({paused:true})
  tl.to(elements, {
    display: 'none',
    opacity: 0,
    pointerEvents: 'none',
    minHeight: '0%',
    duration: 0.3
  })

  return tl;
}