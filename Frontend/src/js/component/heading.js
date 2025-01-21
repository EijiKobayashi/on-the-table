/**
 * HEADING
 */
(() => {
  const updateHeadingUnderlineWidth = () => {
    const sections = document.querySelectorAll('.c-section');
    const headings = document.querySelectorAll('.c-heading');

    if (sections.length && headings.length) {
      sections.forEach((section, index) => {
        const heading = headings[index]; // 対応する heading を取得

        if (heading) {
          // ウィンドウ全体の幅を取得
          const windowWidth = window.innerWidth;

          // セクションの最大幅
          const maxSectionWidth = 800;

          // セクションの実際の幅 (最大800pxまで制限)
          const sectionWidth = Math.min(maxSectionWidth, windowWidth * 0.8);

          // 10% の余白幅を計算 (ウィンドウ幅の 10%)
          let marginWidth = (windowWidth - sectionWidth) / 2;

          // 最大値を 100px に制限
          marginWidth = Math.min(marginWidth, 100);

          // カスタムプロパティに設定
          heading.style.setProperty('--heading-underline-width', `${marginWidth}px`);
        }
      });
    }
  };

  // 初期設定
  updateHeadingUnderlineWidth();

  // ウィンドウリサイズ時に再計算
  window.addEventListener('resize', updateHeadingUnderlineWidth);
})();
