

<div class="single-product">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>

        <?php if (has_post_thumbnail()) : ?>
            <div class="product-image">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="product-content">
            <?php the_content(); ?>
        </div>

        <div class="product-meta">
            <p><?php the_field('product_price'); ?></p>
            <p><?php the_field('product_description'); ?></p>
        </div>

    <?php endwhile; else : ?>
        <p>No product found.</p>
    <?php endif; ?>
</div>
