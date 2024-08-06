# Pas-Pol 

## Reference site
https://pas-pol.jp/

## Theme
* style.cssとindex.phpが必須
* WordPressテーマの画像サイズは、幅1200px／高さ900pxまたは幅880px／高さ660px
* サムネイルは、screenshot.pngで保存する

## テーマ構成
* 今回はheader,footerをtemplate-partsに入れたので、get_template_part()を使用
* テーマのルートディレクトリに置くなら、get_header(); などでOK

.
├── README.md
├── assets
│   ├── css
│   ├── images
│   ├── js
│   └── scss
├── front-page.php
├── index.php
├── screenshot.png
├── style.css
└── template-parts
    ├── footer.php
    └── header.php

## WP管理画面
* 日本語、日本時間に変更
* ユーザーの設定で、ツールバーを非表示に設定
