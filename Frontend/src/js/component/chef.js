/**
 * PROFILE
 */
(() => {
  const updateProfileMarginWidth = () => {
    const chef = document.querySelector('#chef');
    const profile = chef.querySelector('.p-home-chef__profile');

    if (profile) {
      //const profileWidth = profile.getBoundingClientRect().width;
      const main = profile.closest('.l-main__inner');
      const mainWidth = main.getBoundingClientRect().width;
      const chefWidth = chef.getBoundingClientRect().width;
      const chefStyle = window.getComputedStyle(chef);
      const chefPaddingLeft = parseFloat(chefStyle.paddingLeft);
      const chefPaddingRight = parseFloat(chefStyle.paddingRight);
      const chefInnerWidth = chefWidth - chefPaddingLeft - chefPaddingRight;
      //console.info(mainWidth, chefWidth, chefInnerWidth);
      let margin = (mainWidth - chefInnerWidth) / 2;
      margin = Math.min(margin, 200); // Max値 200px
      //console.info(margin);
      profile.style.setProperty('--marginRight', `-${margin}px`);
    }
  };

  // 初期設定
  updateProfileMarginWidth();

  // ウィンドウリサイズ時に再計算
  window.addEventListener('resize', updateProfileMarginWidth);
})();
