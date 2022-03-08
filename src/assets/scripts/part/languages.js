export function languages(){
  const rootUrl = "https://naos-cloud.com"
  const  [ locale ] = document.documentElement.lang.split('-')

  // USE THOSE SET ONCE ON FINAL URL. NO IP
  // console.log(window.location.host);
  // console.log(window.location.protocol);
  // const rootUrl = `${window.location.protocol}//${window.location.host}`
  // console.log(rootUrl);
  
  const translations = fetchTranslationsFor(rootUrl, locale)
}

async function fetchTranslationsFor(url, lang){
  await fetch(`${url}/lang/${lang}.json`)
  .then(res => res.json())
  .then((out) => {
    translatePage(out)
  }).catch(err => console.error(err))
}

// Translate single element paired with the proper key
function translateElement(element , translations) {
  const key = element.getAttribute("data-i18n-key")
  const translation = translations[key]
  element.innerText = translation
}

// select all data-i18n-key elemnts and run translateElemnt() on each
function translatePage(translations) {
  document
    .querySelectorAll("[data-i18n-key]")
    .forEach(el => translateElement(el, translations));
}