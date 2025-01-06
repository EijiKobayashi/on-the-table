/**
 * HEADER
 */
import debounce from './debounce';

(() => {
  const headerScrollFunction = () => {
    // 追従ヘッダー取得
    const $header = document.querySelector('.js-header');

    // 初期設定
    const options = {
      fixClass: 'is-fixed', // 追従class
      hideClass: 'is-hide', // 追従中 非表示class
      showClass: 'is-show', // 追従中 表示class
      showDelay: 100 // 表示するまでのディレイ時間（指定秒数（ミリ秒）以上、下スクロールしなければ表示）
    };

    // ヘッダーが存在するかチェック
    if (!$header) {
      return false;
    }

    // スクロール開始位置
    options.startPosition = 0;
    // 上スクロール判別フラグ
    options.upFlag = false;
    // 表示タイマー用設定
    options.setTimeoutFlag = false;
    options.setTimeoutId = 0;

    // ヘッダーfix関数呼び出し
    window.addEventListener('resize', () => {
      headerFix(options);
    });

    window.addEventListener('scroll', () => {
      headerFix(options);
    });

    // 追従設定
    const headerFix = (options) => {
      // 追従前のヘッダー位置
      const headerBasePosition = 0;

      // ヘッダーの高さを超えたら追従処理を開始
      const headerFixPosition = $header.clientHeight;

      // スクロール量（ウィンドウの上端）取得
      const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      // class設定
      const { fixClass } = options;
      const { showClass } = options;
      const { hideClass } = options;

      // 上下スクロール判別
      // 下スクロール（新規取得したスクロール量がoptions.startPositionを超えている）
      if (scrollTop > options.startPosition) {
        // 上スクロール判別フラグを無効化
        options.upFlag = false;

        // 表示タイマーリセット
        clearTimeout(options.setTimeoutId);
        options.setTimeoutFlag = false;

        // スクロール量がヘッダーを追従させる位置を超えているか
        if (scrollTop > headerFixPosition) {
          // 追従class追加
          $header.classList.add(fixClass);
        }

        // ページの高さ取得
        const pageHeight = document.documentElement.scrollHeight;
        // 下スクロール位置取得
        const scrollBottom = window.innerHeight + scrollTop;
        // ページの最下部だった場合はヘッダーを表示
        if (pageHeight <= scrollBottom) {
          headerShow(hideClass, showClass);

          // ページの途中だった場合
        } else {
          // 表示されている場合ヘッダーを非表示
          if ($header.classList.contains(showClass)) {
            headerHide(hideClass, showClass);
          }
        }

        // 上スクロール（新規取得したスクロール量がoptions.startPosition以下）
      } else {
        // 上スクロール判別フラグを有効化
        options.upFlag = true;

        // ヘッダーが追従前の位置に来ている場合は追従を終了する
        if (scrollTop <= headerBasePosition) {
          // 全ての追従用classを削除
          $header.classList.remove(fixClass, showClass, hideClass);

          // ヘッダーが追従前の位置を超えている場合
        } else {
          // 表示タイマーが設定されていなければタイマーを設定
          if (!options.setTimeoutFlag) {
            // 表示タイマーセット
            options.setTimeoutFlag = true;
            // 指定秒数以上、下スクロールしていない場合のみヘッダーを表示
            options.setTimeoutId = setTimeout(() => {
              if (options.upFlag && $header.classList.contains(fixClass)) {
                headerShow(hideClass, showClass);
              }
            }, options.showDelay);
          }
        }
      }

      // スクロール開始位置を更新
      options.startPosition = scrollTop;
    };

    // 追従ヘッダー表示関数
    const headerShow = (hideClass, showClass) => {
      $header.classList.remove(hideClass);
      $header.classList.add(showClass);
    };

    // 追従ヘッダー非表示関数
    const headerHide = (hideClass, showClass) => {
      $header.classList.remove(showClass);
      $header.classList.add(hideClass);
    };
  };

  // 実行
  headerScrollFunction();

  /*let timeout = 0;
  window.addEventListener('resize', () => {
    if (timeout > 0) {
      clearTimeout(timeout);
    }

    timeout = setTimeout(() => {
      headerScrollFunction();
    }, 200);
  });*/

  const debouncedHeaderScrollFunction = debounce(headerScrollFunction, 200);
  window.addEventListener('resize', debouncedHeaderScrollFunction);
})();
