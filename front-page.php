<?php get_header(); ?>

<main>
  <section class="mv">
    <div class="wrapper">
      <p class="mv-sub"><?php the_field('mv_subtitle'); ?></p>
      <h1><?php the_field('mv_title'); ?></h1>

      <div class="mv-buttons">

        <?php $shop = get_field('mv_shop_button'); ?>
        <?php $learn = get_field('mv_learn_more_button'); ?>

        <a href="<?php echo $shop['url']; ?>" target="<?php echo $shop['target']; ?>" class="btn mv-btn">
          <?php echo $shop['title']; ?>
        </a>

        <a href="<?php echo $learn['url']; ?>" target="<?php echo $learn['target']; ?>">
          <?php echo $learn['title']; ?>
        </a>

      </div>
    </div>
  </section>
  <section class="section1">
    <div class="wrapper">

      <h2 class="section-title">Top Products</h2>

      <div class="products">

        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 6,
          'meta_query' => array(
            array(
              'key' => 'show_in_top_products',
              'value' => 1,
              'compare' => '='
            )
          )
        );

        $products = new WP_Query($args);

        if ($products->have_posts()) :
          while ($products->have_posts()) : $products->the_post();

            $price = get_field('price'); // ACFで作る想定
        ?>

            <a href="<?php the_permalink(); ?>" class="product-card">

              <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail(); ?>
              <?php endif; ?>

              <div class="product-card__body">

                <p class="product-card__name"><?php the_title(); ?></p>

                <?php if ($price) : ?>
                  <p class="product-card__price">$<?php echo esc_html($price); ?></p>
                <?php endif; ?>

                <div class="btn product-card__button">Shop Now</div>

              </div>

            </a>

        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div>
    </div>
  </section>
  <section class="second-visual">
    <div class="wrapper">
      <h2 class="second-title">20% Off Your<br />First Order</h2>
      <p class="second-text">
        Suspendisse ac rhoncus nisl,<br />eu tempor urna. Curabitur vel<br />bibenjgg.
      </p>
      <a href="#" class="btn second-btn">Learn More</a>
    </div>
  </section>
  <section class="section2">
    <div class="wrapper">
      <h2 class="section-title">Explore More</h2>
      <ul class="category-tab">
        <li><a href="#" class="active">Cake</a></li>
        <li><a href="#">Muffins</a></li>
        <li><a href="#">Croissant</a></li>
        <li><a href="#">Bread</a></li>
        <li><a href="#">Tart</a></li>
        <li><a href="#">Favorite</a></li>
      </ul>
      <div class="gallery">
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-1.png" alt="Cake" decoding="async" />
        </a>
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-2.png" alt="Cake" decoding="async" />
        </a>
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-3.png" alt="Cake" decoding="async" />
        </a>
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-4.png" alt="Cake" decoding="async" />
        </a>
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-5.png" alt="Cake" decoding="async" />
        </a>
        <a href="#" class="gallery-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section2-6.png" alt="Cake" decoding="async" />
        </a>
      </div>
    </div>
  </section>
  <section class="third-visual">
    <div class="wrapper">
      <h2 class="third-title">About us</h2>
      <p class="third-text">
        Suspendisse ac rhoncus nisl,<br />eu tempor urna. Curabitur vel<br />bibendum
        lorem. Morbi<br />convallis.
      </p>
      <a href="#" class="btn third-btn">Read More</a>
    </div>
  </section>
  <section class="section3">
    <div class="wrapper">
      <h2 class="section-title">Featured Treats</h2>
      <div class="featured">
        <div class="featured-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section3-1.png" alt="商品名" decoding="async" />
          <div class="featured-info">
            <p class="featured-name">Puff Pastry</p>
            <p class="featured-price">$8</p>
          </div>
        </div>
        <div class="featured-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section3-2.png" alt="商品名" decoding="async" />
          <div class="featured-info">
            <p class="featured-name">Doughnuts</p>
            <p class="featured-price">$8</p>
          </div>
        </div>
        <div class="featured-item">
          <img src="<?php echo get_template_directory_uri(); ?>/images/section3-3.png" alt="商品名" decoding="async" />
          <div class="featured-info">
            <p class="featured-name">Brownies</p>
            <p class="featured-price">$8</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>