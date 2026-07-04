<?php get_header(); ?>

<main class="single-product">

  <div class="wrapper">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

        <div class="product-single">

          <!-- 画像 -->
          <div class="product-image">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('large'); ?>
            <?php endif; ?>
          </div>

          <!-- 情報 -->
          <div class="product-content">

            <h1 class="product-title"><?php the_title(); ?></h1>

            <!-- ACF価格 -->
            <?php $price = get_field('price'); ?>
            <p class="product-price">
              <?php echo $price ? '$' . $price : ''; ?>
            </p>

            <!-- 本文（説明） -->
            <div class="product-description">
              <?php the_content(); ?>
            </div>

            <!-- ボタン（仮） -->
            <a href="#" class="btn">Add to Cart</a>

          </div>

        </div>

    <?php endwhile;
    endif; ?>

  </div>

</main>

<?php get_footer(); ?>