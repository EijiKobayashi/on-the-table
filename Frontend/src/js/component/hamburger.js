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
    if (document.body.classList.contains('is-open-menu')) {
      close($menu, scrollPosition);
      state = false;
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

  const $nav = document.querySelector('.p-navigation');
  if ($nav) {
    /*document.addEventListener('DOMContentLoaded', () => {
      $nav.style.display = 'block';
    });*/
    $nav.addEventListener('click', (e) => {
      if (document.body.classList.contains('is-open-menu')) {
        if (!e.target.closest('.p-navigation__inner')) {
          // console.log('外側');
          close($menu, scrollPosition);
          state = false;
        } else {
          // console.log('内側');
        }
      }
    });

    const $links = $nav.querySelectorAll('.--navigation-item a');
    $links.forEach(($link) => {
      $link.addEventListener('click', (e) => {
        if (document.body.classList.contains('is-open-menu')) {
          close($menu, scrollPosition);
          state = false;
        }

        // ハッシュリンク処理
        const hash = $link.getAttribute('href');
        if (hash.startsWith('#')) {
          const targetElement = document.querySelector(hash);
          if (targetElement) {
            e.preventDefault(); // デフォルトのジャンプを無効化
            targetElement.scrollIntoView({
              behavior: 'smooth',
              block: 'start' // スクロール位置を先頭に設定
            });
          }
        }
      });
    });
  }

  const open = (element, position) => {
    element.classList.add('is-active');
    document.body.classList.add('is-open-menu');
    document.body.classList.remove('is-close-menu');
    //document.body.style.top = `${-position}px`;
    document.body.style = `--top-position: ${-position}px`;
  };

  const close = (element, position) => {
    element.classList.remove('is-active');
    document.body.classList.remove('is-open-menu');
    document.body.classList.add('is-close-menu');
    window.scrollTo(0, position);
    //document.body.style.top = 0;
    document.body.style = `--top-position: 0`;
  };
})();
