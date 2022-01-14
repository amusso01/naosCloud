

export function alternativeLayout(){
  const layoutBtn = document.querySelectorAll('.sort')

  layoutBtn.forEach(el=>{
    el.addEventListener('click', e=>{
      let target = e.target
      changeLayout(target)
    })
  })


}

function changeLayout(target) {
  const gridContainer = document.getElementById('assetGrid')
  const list = document.getElementById('list')
  const column = document.getElementById('column')
  if(target=== list){
      column.classList.remove('active')
      list.classList.add('active')
      gridContainer.classList.add('is-list')
  }else{
    column.classList.add('active')
    list.classList.remove('active')
    gridContainer.classList.remove('is-list')
  }
}