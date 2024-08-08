<?php
/**
 * Enqueue scripts and styles.
 */
function theme_enqueue_assets()
{
    // jQueryを読み込む
  // wp_enqueue_script('jquery');

  // デフォルトのjQueryを解除
  wp_deregister_script('jquery');

  // ダウンロードしたjQueryを登録
  wp_register_script(
      'download-jquery', // 新しいハンドル名
      get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', // jQueryのパス
      array(), // 依存関係（必要に応じて追加）
      '3.7.1', // バージョン
      true // フッターで読み込む
  );

  // ダウンロードしたjQueryをキューに追加
  wp_enqueue_script('download-jquery');

  // JavaScriptファイルを読み込む


  // リセットCSSを読み込む
  wp_enqueue_style('destyle', get_template_directory_uri() . '/assets/css/destyle.min.css');
  // メインのスタイルシートを読み込む（識別子、URL、依存関係、バージョン）
  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array('destyle'), '1.0.0');

}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

/**
 * カスタム投稿タイプ product を登録
 *
 */
function create_product_post_type() {
  register_post_type('product',
    array(
      // 投稿タイプのラベルを設定
      'labels' => array(
          'name' => __('Products'), // 投稿タイプの一般的な名前（複数形）
          'singular_name' => __('Product') // 投稿タイプの単数形の名前
      ),
      'public' => true, // 投稿タイプを公開状態にする
      'has_archive' => true, // 投稿タイプのアーカイブページを有効にする
      'rewrite' => array('slug' => 'products'), // カスタムURLスラッグを設定
      // この投稿タイプがサポートする機能を設定
      'supports' => array(
        'title', // 投稿のタイトル
        'editor', // 投稿のコンテンツエディタ
        'thumbnail', // 投稿のアイキャッチ画像
        'excerpt' // 投稿の抜粋フィールド
    )
    )
  );
}
add_action('init', 'create_product_post_type');

/**
 * テーマでアイキャッチ画像のサポートを有効にする。
 */
function theme_setup() {
  // アイキャッチ画像のサポートを有効にする
  add_theme_support('post-thumbnails');
}

// 'after_setup_theme'アクションにフックして関数を実行
add_action('after_setup_theme', 'theme_setup');
