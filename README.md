# Pas-Pol

## Reference site

https://pas-pol.jp/

## Tools

### Gulp, BrowserSync

```
# Gulp CLIが未インストールの場合
npm install --global gulp-cli

# nodeが見つからないとき、sudo で npm コマンドを実行する際に、環境変数を設定
sudo env "PATH=$PATH" /home/yuuki/.nvm/versions/node/v20.16.0/bin/npm install --save-dev gulp

# setup
npm install gulp browser-sync gulp-sass --save-dev

# 確認
npx gulp --version
  >CLI version: 3.0.0
  >Local version: 5.0.0

# Gulpを実行
npx gulp

```

### Prettier

```
# プロジェクトにPrettierをインストール
npm install --save-dev prettier @prettier/plugin-php

# インストールの確認
npx prettier --version
```

プロジェクトのルートディレクトリに .prettierrc ファイルを作成

## Theme

- style.css と index.php が必須
- WordPress テーマの画像サイズは、幅 1200px／高さ 900px または幅 880px／高さ 660px
- サムネイルは、screenshot.png で保存する

## テーマ構成

- 今回は header,footer を template-parts に入れたので、get_template_part()を使用
- テーマのルートディレクトリに置くなら、get_header(); などで OK

```
.
├── README.md
├── assets
│ ├── css
│ ├── images
│ ├── js
│ └── scss
├── front-page.php
├── index.php
├── screenshot.png
├── style.css
└── template-parts
├── footer.php
└── header.php
```

## WP 管理画面

- 日本語、日本時間に変更
- ユーザーの設定で、ツールバーを非表示に設定

## WordPress プラグイン

- HTTP Auth：　 Basic 認証
- Advanced Custom Fields：　カスタムフィールド
- Contact Form 7：　問合わせフォーム
- Copy & Delete Posts：　投稿やページの複製
- EWWW Image Optimizer：　画像最適化
