<?php
function theme_enqueue_assets() {
    // リセットCSSを読み込む
    wp_enqueue_style('destyle', get_template_directory_uri() . '/assets/css/destyle.min.css');
    // メインのスタイルシートを読み込む（識別子、URL、依存関係、バージョン）
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', array('destyle'), '1.0.0');

    // JavaScriptファイルを読み込む
}

add_action('wp_enqueue_scripts', 'theme_enqueue_assets');
