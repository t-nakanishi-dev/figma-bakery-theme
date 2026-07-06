<?php get_header(); ?>

<main class="archive-product">

  <div class="wrapper">

    <h1 class="section-title">Products</h1>

    <div class="products">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php $price = get_field('price'); ?>

          <div class="product-card">

            <!-- 画像 -->
            <a href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
              <?php endif; ?>
            </a>

            <!-- 情報 -->
            <div class="product-info">

              <div class="product-info-top">
                <p class="price">
                  <?php echo $price ? '$' . $price : ''; ?>
                </p>
                <button class="icon">i</button>
              </div>

              <div class="product-info-bottom">
                <p class="product-name">
                  <?php the_title(); ?>
                </p>

                <a href="<?php the_permalink(); ?>" class="btn btn-add">
                  View
                </a>
              </div>

            </div>

          </div>

      <?php endwhile;
      endif; ?>

    </div>

  </div>

</main>

<?php get_footer(); ?>