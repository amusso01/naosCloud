import Glide from '@glidejs/glide'

export default function fdCarousel(){

  const sliders = document.querySelectorAll('.glide-carousel')
  const conf = {
    type: 'slider',
    perView: 3,
    focusAt: 0,
    gap: 20,
    bound: true
  }
  
  sliders.forEach(item => {
    new Glide(item, conf).mount()
  })

    
}