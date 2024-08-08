

<div class="single-product">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?> <!-- 投稿があるとき -->
    <!-- タイトル -->
    <h1><?php the_title(); ?></h1>

    <!-- メインビジュアル -->
    <?php
    $main_visual = get_field('product_mv'); // フィールド名 'product_mv' から値を取得
    if ($main_visual) : ?>
        <div class="product-image">
            <img src="<?php echo esc_url($main_visual['url']); ?>" alt="<?php echo esc_attr($main_visual['alt']); ?>">
        </div>
    <?php endif; ?>

    <!-- テキストフィールドの内容を表示 -->
    <?php
    $product_text = get_field('product_text'); // フィールド名 'product_text' から値を取得
    if ($product_text) : ?>
        <div class="product-text">
            <p><?php echo esc_html($product_text); ?></p>
        </div>
    <?php endif; ?>

    <!-- 投稿ページで入力した内容 -->
    <div class="product-content">
        <?php the_content(); ?>
    </div>

  <!-- 投稿がないとき -->
  <?php endwhile; else : ?>
      <p>No product found.</p>
  <?php endif; ?>
</div>
