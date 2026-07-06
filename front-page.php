<?php get_header(); ?>

<main>
  <section class="mv">
    <div class="wrapper">
      <p class="mv-sub"><?php the_field('mv_subtitle'); ?></p>
      <h1><?php the_field('mv_title'); ?></h1>

      <div class="mv-buttons">
        <?php
        $shop = get_field('mv_shop_button');
        // データがちゃんと入っているかチェック
        if ($shop && is_array($shop)) :
        ?>
          <a href="<?php echo esc_url($shop['url']); ?>" target="<?php echo esc_attr($shop['target']); ?>" class="btn mv-btn">
            <?php echo esc_html($shop['title']); ?>
          </a>
        <?php endif; ?>

        <?php
        $learn = get_field('mv_learn_more_button');
        if ($learn && is_array($learn)) :
        ?>
          <a href="<?php echo esc_url($learn['url']); ?>" target="<?php echo esc_attr($learn['target']); ?>">
            <?php echo esc_html($learn['title']); ?>
          </a>
        <?php endif; ?>
      </div>
    </div>
  </section>
  <section class="section1">
    <div class="wrapper">

      <h2 class="section-title">Top Products</h2>

      <div class="products product-grid">

        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 6,
          'meta_query' => array(
            array(
              'key' => 'show_in_top_products',
              'value' => '1',
              'compare' => '='
            )
          )
        );

        $top_products = new WP_Query($args);

        if ($top_products->have_posts()) :
          while ($top_products->have_posts()) : $top_products->the_post();

            $price = get_field('price'); // ACFで作る想定
        ?>

            <?php get_template_part('template-parts/product-card'); ?>

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

      <div class="gallery product-grid">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1
        );

        $explore_products = new WP_Query($args);

        if ($explore_products->have_posts()) :
          while ($explore_products->have_posts()) :
            $explore_products->the_post();

            $price = get_field('price');
        ?>

            <?php get_template_part('template-parts/product-card'); ?>

        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>

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


      <div class="featured product-grid">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => 3,
          'meta_query' => array(
            array(
              'key' => 'featured',
              'value' => '1',
              'compare' => '='
            )
          )
        );

        $featured_products = new WP_Query($args);

        if ($featured_products->have_posts()) :
          while ($featured_products->have_posts()) : $featured_products->the_post();

            $price = get_field('price');
        ?>

            <?php get_template_part('template-parts/product-card'); ?>

        <?php
          endwhile;
          wp_reset_postdata();
        endif;
        ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>