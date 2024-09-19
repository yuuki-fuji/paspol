<?php
/**
 * Enqueue scripts and styles.
 */
function theme_enqueue_assets()
{
    // jQueryを読み込む
  wp_enqueue_script('jquery');

  // デフォルトのjQueryを解除
  // wp_deregister_script('jquery');

  // // ダウンロードしたjQueryを登録
  // wp_register_script(
  //     'download-jquery', // 新しいハンドル名
  //     get_template_directory_uri() . '/assets/js/jquery-3.7.1.min.js', // jQueryのパス
  //     array(), // 依存関係（必要に応じて追加）
  //     '3.7.1', // バージョン
  //     true // フッターで読み込む
  // );

  // // ダウンロードしたjQueryをキューに追加
  // wp_enqueue_script('download-jquery');

  // slickのスタイルシートを読み込む
  wp_enqueue_style(
    'slick-css', // ハンドル名
    get_template_directory_uri() . '/assets/js/slick-1.8.1/slick/slick.css', // slick.cssのパス
    array(), // 依存関係なし
    '1.8.1' // バージョン
  );

  wp_enqueue_style(
      'slick-theme-css', // ハンドル名
      get_template_directory_uri() . '/assets/js/slick-1.8.1/slick/slick-theme.css', // slick-theme.cssのパス
      array('slick-css'), // slick.cssに依存
      '1.8.1' // バージョン
  );

  // slickのJavaScriptファイルを読み込む
  wp_enqueue_script(
      'slick-js', // ハンドル名
      get_template_directory_uri() . '/assets/js/slick-1.8.1/slick/slick.min.js', // slick.min.jsのパス
      array('jquery'), // jQueryに依存
      '1.8.1', // バージョン
      true // フッターで読み込む
  );

  // JavaScriptファイルを読み込む
  wp_enqueue_script(
    'custom-index-js', // ハンドル名
    get_template_directory_uri() . '/assets/js/index.js', // index.jsのパス
    array('slick-js'), // slickに依存
    '1.0.0', // バージョン
    true // フッターで読み込む
  );

  // リセットCSSを読み込む
  wp_enqueue_style('destyle', get_template_directory_uri() . '/assets/css/destyle.min.css');
  // メインのスタイルシートを読み込む（識別子、URL、依存関係、バージョン）
  wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array('destyle'), '1.0.0');

}
add_action('wp_enqueue_scripts', 'theme_enqueue_assets');

/**
 * テーマのセットアップを行う関数。
 * - アイキャッチ画像（サムネイル画像）のサポートを有効にする
 * - タイトルタグを動的に出力する
 * - カスタム投稿タイプ 'product' を登録
 */
function theme_setup() {
  // アイキャッチ画像のサポートを有効にする
  add_theme_support('post-thumbnails');

  // タイトルタグを動的に出力する
  add_theme_support('title-tag');

  // カスタム投稿タイプ 'product' を登録
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

// テーマのセットアップが完了した後に 'theme_setup' 関数を実行
add_action('after_setup_theme', 'theme_setup');

/**
 * カスタムタクソノミー 'product-category' を追加する関数。
 */
function create_product_taxonomies() {
  // カスタムタクソノミー（カテゴリー）'product-category' を登録
  register_taxonomy(
    'product-category', // タクソノミーのスラッグ
    'product', // 関連付けるカスタム投稿タイプ
    array(
      'labels' => array(
        'name' => __('Product Categories'), // 複数形のラベル
        'singular_name' => __('Product Category') // 単数形のラベル
      ),
      'hierarchical' => true, // 階層型（カテゴリーのように親子関係が持てる）
      'show_ui' => true, // 管理画面に表示する
      'show_admin_column' => true, // 管理画面の投稿一覧に表示
      'query_var' => true,
      'rewrite' => array('slug' => 'product-category') // スラッグを指定
    )
  );
}
add_action('init', 'create_product_taxonomies');

/**
 * カスタム投稿 'products' でカテゴリーが未設定の場合に、デフォルトで '未分類' を設定する関数
 */
function set_default_product_category( $post_id ) {
    // 投稿タイプが 'products' ではない場合は何もしない
    if ( 'product' !== get_post_type( $post_id ) ) {
        return;
    }

    // 自動保存などでフックが呼ばれる場合があるため、通常の保存処理以外は無視
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) {
        return;
    }

    // タクソノミー 'product-category' に何も設定されていない場合
    $terms = wp_get_post_terms( $post_id, 'product-category' );
    if ( empty( $terms ) ) {
        // '未分類' の term_id を設定
        $uncategorized_term_id = 5;

        // デフォルトで '未分類' タームを設定
        wp_set_post_terms( $post_id, array( $uncategorized_term_id ), 'product-category' );
    }
}
add_action( 'save_post', 'set_default_product_category' );
