export default function headerSearch() {
  const searchIcon = document.getElementById('searchMobile')
  const searchForm = document.getElementById('searchform')

  searchIcon.addEventListener('click', ()=>{
    searchForm.classList.toggle('show')
  })
}