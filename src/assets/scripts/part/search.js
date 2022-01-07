export default function search() {
  const orderBy = document.getElementById('orderby')
  const order = document.getElementById('order')

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

  }

}