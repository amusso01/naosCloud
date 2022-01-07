import { gsap } from "gsap";

export function sideNav(){
  const sideIcon = document.querySelector('.main-subNav__icon')
  const sideSubNav = document.querySelector('.main-subNav__nav')
  const sideFooter = document.querySelector('.main-subNav__footer')
  const sideDrawer = document.getElementById('mainNavSub')
  const content = document.getElementById('content')
  // GSAP TIMELINE
  const open =  show([sideSubNav, sideFooter])
  const close = hide([sideSubNav, sideFooter])

  sideIcon.addEventListener('click', ()=>{ 

    sideDrawer.classList.toggle('close')
    content.classList.toggle('wide')
    if(sideDrawer.classList.contains('close')){
      if(open.isActive()){
        open.progress(1)
      }
      close.time(0)
      close.play()
    }else{
      open.time(0)
      open.play()
    }
  })
}

// GSAP SHOW AND HIDE FUNCTION
function show(elements){
  let tl = gsap.timeline({paused: true})
  tl.to(elements, {
    display: 'block',
    opacity: 1,
    pointerEvents: 'all',
    duration: 1
  })
  return tl;
}
function hide(elements){
  const tl = gsap.timeline({paused: true})
  tl.to([elements], {
    display: 'none',
    opacity: 0,
    pointerEvents: 'none',
    duration: 0.1
  })
  return tl;
}