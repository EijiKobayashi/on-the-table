/**
 * Smooth Scroll
 */
const smoothScroll = () => {
  // スクロールリンク取得
  const targets = document.querySelectorAll('a[href^="#"]');
  if (targets.length === 0) {
    return;
  }

  const easing = (t, b, c, d) => c * (0.5 - Math.cos((t / d) * Math.PI) / 2) + b;

  // スクロール速度
  const animeSpeed = 800;
  const scrollBusyClass = 'is-scroll-busy';
  const { body } = document;
  const bodyClassList = body.classList;

  // クリックイベント設定
  targets.forEach((target) => {
    target.addEventListener('click', (event) => {
      // data-smooth 属性が false の場合はスムーススクロールを無効化
      if (target.getAttribute('data-smoothscroll') === 'false') {
        return;
      }

      event.preventDefault();

      // スクロールイベント重複防止
      if (bodyClassList.contains(scrollBusyClass)) {
        return;
      }
      bodyClassList.add(scrollBusyClass);

      // hrefから遷移先を取得
      const href = target.getAttribute('href');
      const scrollStopTarget = document.querySelector(href == '#' || href == '' ? 'html' : href);

      // 遷移先が存在しない場合は処理しない
      if (!scrollStopTarget) {
        return;
      }

      // 移動先取得
      const scrollStopTop = scrollStopTarget.getBoundingClientRect().top - 20;

      // 現在のスクロール量
      const scrollTop = window.pageYOffset;

      // アニメーション開始時間
      let start;

      // スクロールアニメーション関数
      const startAnime = () => {
        requestAnimationFrame(mainAnime);
      };

      const mainAnime = (timestamp) => {
        // イベント発生後の経過時間
        // start未定義時のみtimestampを代入することで一度だけstartに数値を格納する
        if (start === undefined) {
          start = timestamp;
        }

        // 経過時間を監視
        const elapsedTime = timestamp - start;

        // アニメーション終了処理
        if (elapsedTime > animeSpeed) {
          // 実行中class削除
          bodyClassList.remove(scrollBusyClass);

          // 処理を終了
          return;
        }

        // スクロール処理
        window.scrollTo(
          0,
          // 「アニメーションの経過時間」,「始点」,「変化量」,「変化にかける時間」
          easing(elapsedTime, scrollTop, scrollStopTop, animeSpeed)
        );
        startAnime();
      };

      // アニメーション初回呼び出し
      startAnime();
    });
  });
};

export default smoothScroll();
