/**
 * Page Top
 */
(() => {
  const $pagetop = document.querySelector('.js-pagetop');
  const currentScroll = 30;
  // スクロールのイベントハンドラを登録
  if ($pagetop) {
    window.addEventListener('scroll', () => {
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
      if (scrollTop > currentScroll) {
        $pagetop.classList.add('is-active');
      } else {
        $pagetop.classList.remove('is-active');
      }
    });
  }
})();
