<div class="product-archive">
    <h1>Products</h1>

    <?php
    // グローバル変数を使って現在のページ番号を取得
    global $paged;
    if (empty($paged)) $paged = 1;

    // カスタムクエリを作成
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 2, // 1ページに表示する投稿数
        'paged' => $paged
    );
    $product_query = new WP_Query($args);
    ?>

    <?php if ($product_query->have_posts()) : ?>
        <div class="product-list">
            <?php while ($product_query->have_posts()) : $product_query->the_post(); ?>
                <div class="product-item">
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="product-thumbnail">
                            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
                        </div>
                    <?php endif; ?>

                    <div class="product-excerpt">
                        <?php the_excerpt(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            // ページネーションリンクを表示
            echo paginate_links(array(
                'total' => $product_query->max_num_pages,
                'current' => $paged,
                'prev_text' => __('« Previous', 'textdomain'),
                'next_text' => __('Next »', 'textdomain'),
            ));
            ?>
        </div>

        <?php
        // クエリ後のグローバルな投稿データをリセット
        wp_reset_postdata();
        ?>

    <?php else : ?>
        <p>No products found.</p>
    <?php endif; ?>
</div>
