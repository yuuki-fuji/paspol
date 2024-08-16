<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pas-pol demo</title>
    <?php wp_head(); ?>
  </head>
  <body>
    <header class="header">
      <h1 class="header__logo">
        <a href="/" class="header__logo-link">PAS-POL -旅のモノづくりブランド-｜TABIPPO</a>
      </h1>
      <nav class="header__navigation navigation">
        <ul class="navigation__list">
          <li class="navigation__item"><a href="<?php echo home_url('/'); ?>" class="navigation__link">TOP</a></li>
          <li class="navigation__item"><a href="<?php echo get_post_type_archive_link('product'); ?>" class="navigation__link">PRODUCT</a></li>
          <li class="navigation__item"><a href="/" class="navigation__link">ABOUT</a></li>
          <li class="navigation__item"><a href="/" class="navigation__link">NEWS</a></li>
          <li class="navigation__item"><a href="/contact" class="navigation__link">CONTACT</a></li>
        </ul>
        <div class="navigation__toggle">MENU</div>
      </nav>
    </header>
