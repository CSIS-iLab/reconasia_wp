const Search = () => {
  const trigger = document.querySelector('#search-trigger')
  const searchEl = document.querySelector('#searchform')
  const close = document.querySelector('#search-close')

  trigger.addEventListener('click', function () {
    if (searchEl.classList.contains('is-active')) {
      this.setAttribute('aria-expanded', 'false')
      this.classList.remove('is-active')
      searchEl.classList.remove('is-active')
    } else {
      searchEl.classList.add('is-active')
      this.setAttribute('aria-expanded', 'true')
      this.classList.add('is-active')
    }
  })

  close.addEventListener('click', function () {
    searchEl.classList.remove('is-active')
    trigger.setAttribute('aria-expanded', false)
    trigger.classList.remove('is-active')
  })
}

export default Search
