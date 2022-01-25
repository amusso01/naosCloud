export default function search() {
  const orderBy = document.getElementById('orderby')
  const order = document.getElementById('order')
  const filterIcon = document.getElementById('filterIcon')
  const sortForm = document.getElementById('sortForm')

  if( orderBy && order){

    const setOrder = ()=>{

      const orderByVal =orderBy.options[orderBy.selectedIndex].value
      
      if(orderByVal === 'title'){
        order.value = 'ASC'
      }else{
        order.value = 'DESC'
      }
    
    }

    orderBy.addEventListener('change', setOrder)

    setOrder()

    // MOBILE FILTER OPEN CLOSE
    filterIcon.addEventListener('click', ()=>{
      sortForm.classList.toggle('mobile-active')
    })

  }

}