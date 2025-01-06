/**
 * Hamburger
 */
import debounce from './debounce';

(() => {
  const $menu = document.querySelector('.js-menu-toggle');
  let state = false;
  let scrollPosition;
  if ($menu) {
    $menu.addEventListener(
      'click',
      (e) => {
        const $this = e.currentTarget;
        if (state == false) {
          scrollPosition = document.documentElement.scrollTop;
          open($this, scrollPosition);
          state = true;
        } else {
          close($this, scrollPosition);
          state = false;
        }
      },
      false
    );
  }

  const currentWidth = window.screen.width;
  const handleResize = debounce(() => {
    if (currentWidth == window.screen.width) {
      return;
    }
    if (document.body.classList.contains('is-open-sp-menu')) {
      close($menu, scrollPosition);
      state = false;
    }
    if (headerCTAButton.classList.contains('is-open')) {
      headerCTAButton.classList.remove('is-open');
    }
    if (headerCTAElement.classList.contains('is-open')) {
      headerCTAElement.classList.remove('is-open');
    }
  });
  window.addEventListener('resize', handleResize);

  window.addEventListener(
    'keydown',
    (event) => {
      if (state) {
        if (event.key == 'Escape') {
          close($menu, scrollPosition);
          state = false;
        }
      }
    },
    true
  );

  const $spnav = document.querySelector('.p-navigation-sp');
  if ($spnav) {
    document.addEventListener('DOMContentLoaded', () => {
      $spnav.style.display = 'block';
    });
    $spnav.addEventListener('click', (e) => {
      if (document.body.classList.contains('is-open-sp-menu')) {
        if (!e.target.closest('.p-navigation-sp__inner')) {
          // console.log('外側');
          close($menu, scrollPosition);
          state = false;
        } else {
          // console.log('内側');
        }
      }
    });
  }

  const open = (element, position) => {
    element.classList.add('is-active');
    document.body.classList.add('is-open-sp-menu');
    document.body.classList.remove('is-close-sp-menu');
    //document.body.style.top = `${-position}px`;
    document.body.style = `--top-position: ${-position}px`;
  };

  const close = (element, position) => {
    element.classList.remove('is-active');
    document.body.classList.remove('is-open-sp-menu');
    document.body.classList.add('is-close-sp-menu');
    window.scrollTo(0, position);
    //document.body.style.top = 0;
    document.body.style = `--top-position: 0`;
  };

  // Header CTA (Toggle)
  const headerCTAButton = document.querySelector('.js-header-cta-button');
  const headerCTAElement = document.querySelector('.js-header-cta-element');
  if (headerCTAButton && headerCTAElement) {
    headerCTAButton.addEventListener('click', (e) => {
      e.preventDefault();
      headerCTAButton.classList.toggle('is-open');
      headerCTAElement.classList.toggle('is-open');
    });
  }

  // SP Submenu (Toggle)
  const navigationChildren = document.querySelectorAll('.p-navigation-sp__nav .--navigation-item:has(.--navigation-children) > a');
  if (!navigationChildren.length) return;
  navigationChildren.forEach((item) => {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      item.parentNode.classList.toggle('is-open');
    });
  });
})();
