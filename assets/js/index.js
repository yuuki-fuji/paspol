// slickスライダーの初期化
jQuery(document).ready(function ($) {
  $('.main-visual--slide').slick({
    autoplay: true, // 自動再生
    autoplaySpeed: 2000, // 2秒ごとに切り替え
    dots: false, // ナビゲーションのドットを表示
    arrows: true, // 次へ・前へ矢印を表示
    infinite: true, // 無限ループ
    speed: 500, // アニメーション速度
    fade: true, // フェードイン・アウトを無効に
    cssEase: 'linear', // アニメーションの種類
  });

  // ハンバーガーメニューの開閉
  $('.js-openbtn').click(function () {
    // ボタンがクリックされたら
    console.log('クリックされました');
    $('.js-navigation').toggleClass('is-open'); // ボタン自身に activeクラスを付与し
  });
});
