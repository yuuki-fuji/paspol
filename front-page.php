<?php
  get_template_part('template-parts/header'); // header.php をインクルード
?>

<!-- メインビジュアル -->
<div class="main-visual--slide">
    <?php
      // 画像パスのリスト
      $images = array(
          get_template_directory_uri() . '/assets/images/main_visual_111-0x0.jpg',
          get_template_directory_uri() . '/assets/images/main_visual_13-0x0.jpg',
          get_template_directory_uri() . '/assets/images/main_visual_2-0x0.jpg',
          get_template_directory_uri() . '/assets/images/main_visual_6-0x0.jpg',
          get_template_directory_uri() . '/assets/images/main_visual_7-0x0.jpg'
      );

      // 画像をループして表示
      foreach ($images as $image) :
    ?>
        <div>
            <img src="<?php echo esc_url($image); ?>" alt="Main Visual">
        </div>
    <?php endforeach; ?>
</div>

<section class="l-section">
  <h2>PRODUCT</h2>
  <a href="<?php echo get_post_type_archive_link('product'); ?>">More Products</a>
  <?php
    // WP_Query を使ってカスタム投稿タイプ 'product' の最新6件の投稿を取得
    $product_query = new WP_Query(array(
        'post_type' => 'product', // 取得する投稿タイプを 'product' に指定
        'posts_per_page' => 6,    // 取得する投稿の数を 6 に指定
    ));
    // 投稿が存在するか確認
    if ($product_query->have_posts()) :
      // 投稿が存在する場合、ループを開始
      while ($product_query->have_posts()) : $product_query->the_post(); // 投稿が存在するか確認 : まだ投稿が残っているかチェック
          ?>
          <div class="product-post">
              <h3><?php the_title(); ?></h3> <!-- 投稿のタイトルを表示 -->

              <?php if (has_post_thumbnail()) : ?>
                  <div class="post-thumbnail">
                      <?php the_post_thumbnail('medium'); // サムネイル画像を 'medium' サイズで表示 ?>
                  </div>
              <?php endif; ?>

              <p><?php the_excerpt(); ?></p> <!-- 投稿の抜粋を表示 -->
              <a href="<?php the_permalink(); ?>">Read more</a> <!-- 投稿の詳細ページへのリンクを表示 -->
          </div>
          <?php
      endwhile;
      // クエリ後のグローバルな投稿データをリセット
      wp_reset_postdata();
    else :
      // 投稿が見つからない場合のメッセージを表示
      echo '<p>No products found.</p>';
    endif;
  ?>
</section>

<?php
  get_template_part('template-parts/footer'); // footer.php をインクルード
?>
