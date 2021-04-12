/**
 * JS file for toggling classes on the navbar
 *
 */

const trigger = document.querySelector('.site-nav__trigger')
const menu = document.querySelector('.site-nav__container')
const nav = document.querySelector('.site-nav__menu')

const Navigation = () => {
  toggleMenu()
  closeMenu()
}

// change the hamburger icon to close icon on mobile
const toggleMenu = () => {
  trigger.addEventListener('click', function () {
    if (menu.classList.contains('is-active')) {
      this.setAttribute('aria-expanded', 'false')
      this.classList.remove('is-active')
      menu.classList.remove('is-active')
    } else {
      menu.classList.add('is-active')
      this.setAttribute('aria-expanded', 'true')
      this.classList.add('is-active')
    }
  })
}

const closeMenu = () => {
  document.addEventListener('click', function (e) {
    const buttonClicked =
      e.target === trigger || e.target.parentElement === trigger

    if (!nav.contains(e.target) && !buttonClicked) {
      trigger.setAttribute('aria-expanded', 'false')
      trigger.classList.remove('is-active')
      menu.classList.remove('is-active')
    }
  })
}

export { Navigation }
