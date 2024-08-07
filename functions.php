<?php
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
