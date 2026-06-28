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

  const body = document.body;
  const a11yTrigger = document.getElementById('a11y-trigger');
  const a11yPanel = document.getElementById('a11y-panel');
  const a11yClose = document.getElementById('a11y-close');

  const themeBtn = document.getElementById('toggle-theme');
  const fontSizeBtn = document.getElementById('toggle-font-size');
  const dyslexiaBtn = document.getElementById('toggle-dyslexia');

  function openA11yPanel() {
    a11yPanel.classList.add('is-open');
    a11yPanel.setAttribute('aria-hidden', 'false');
    a11yTrigger.setAttribute('aria-expanded', 'true');
    a11yClose.focus(); 
  }

  function closeA11yPanel() {
    a11yPanel.classList.remove('is-open');
    a11yPanel.setAttribute('aria-hidden', 'true');
    a11yTrigger.setAttribute('aria-expanded', 'false');
    a11yTrigger.focus();
  }

  if (a11yTrigger && a11yPanel && a11yClose) {
    a11yTrigger.addEventListener('click', openA11yPanel);
    a11yClose.addEventListener('click', closeA11yPanel);

    window.addEventListener('keydown', function (e) {
      if (e.key === 'Escape' && a11yPanel.classList.contains('is-open')) {
        closeA11yPanel();
      }
    });
  }

  function updateToggleState(btn, state) {
    if (btn) {
      btn.setAttribute('aria-pressed', state ? 'true' : 'false');
      btn.textContent = state ? 'Off' : 'On';
    }
  }

  if (localStorage.getItem('a11y-theme') === 'light') {
    body.classList.add('light-theme');
    updateToggleState(themeBtn, true);
  }
  if (localStorage.getItem('a11y-font-size') === 'large') {
    body.classList.add('text-large');
    updateToggleState(fontSizeBtn, true);
  }
  if (localStorage.getItem('a11y-dyslexia') === 'enabled') {
    body.classList.add('dyslexia-font');
    updateToggleState(dyslexiaBtn, true);
  }

  if (themeBtn) {
    themeBtn.addEventListener('click', function () {
      const isLight = body.classList.toggle('light-theme');
      localStorage.setItem('a11y-theme', isLight ? 'light' : 'dark');
      updateToggleState(themeBtn, isLight);
    });
  }

  if (fontSizeBtn) {
    fontSizeBtn.addEventListener('click', function () {
      const isLarge = body.classList.toggle('text-large');
      localStorage.setItem('a11y-font-size', isLarge ? 'large' : 'normal');
      updateToggleState(fontSizeBtn, isLarge);
    });
  }

  if (dyslexiaBtn) {
    dyslexiaBtn.addEventListener('click', function () {
      const isDyslexia = body.classList.toggle('dyslexia-font');
      localStorage.setItem('a11y-dyslexia', isDyslexia ? 'enabled' : 'disabled');
      updateToggleState(dyslexiaBtn, isDyslexia);
    });
  }
});