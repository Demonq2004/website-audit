// Tutaj tak samo importujemy js z innych plików, np. z folderu assets/js
// Przykład:
// import './assets/js/custom.js';

document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.querySelector('.menu-toggle')
  const siteNavigation = document.querySelector('.site-navigation')

  if (menuToggle && siteNavigation) {
    menuToggle.addEventListener('click', function () {
      const isOpen = menuToggle.classList.toggle('is-open')
      siteNavigation.classList.toggle('is-open')
      menuToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false')
    })
  }
})
