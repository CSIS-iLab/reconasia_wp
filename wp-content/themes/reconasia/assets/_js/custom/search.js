const Search = () => {
  const trigger = document.querySelector('#search-trigger')
  const searchEl = document.querySelector('#searchform')
  const close = document.querySelector('#search-close')
  const searchField = document.querySelector('#navSearchInput')

  trigger.addEventListener('click', function () {
    searchEl.classList.add('is-active')
    this.setAttribute('aria-expanded', 'true')
    this.classList.add('is-active')
    window.setTimeout(function () {
      searchField.focus()
    }, 0)
  })

  close.addEventListener('click', function () {
    searchEl.classList.remove('is-active')
    trigger.setAttribute('aria-expanded', false)
    trigger.classList.remove('is-active')
  })
}

export default Search
