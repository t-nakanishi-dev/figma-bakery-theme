<?php get_header(); ?>

<main>
  <?php
  $mv_image = get_field('mv_image');
  ?>

  <section class="mv"
    <?php if ($mv_image): ?>
    style="background-image:url('<?php echo esc_url($mv_image); ?>');"
    <?php endif; ?>>
    <div class="wrapper">
      <p class="mv-sub"><?php the_field('mv_subtitle'); ?></p>
      <h1>
        <?php echo nl2br(esc_html(get_field('mv_title'))); ?>
      </h1>

      <div class="mv-buttons">
        <?php
        $shop = get_field('mv_shop_button');
        // データがちゃんと入っているかチェック
        if ($shop && is_array($shop)) :
        ?>
          <a
            href="<?php echo esc_url($shop['url']); ?>"
            target="<?php echo esc_attr($shop['target']); ?>"
            rel="noopener noreferrer"
            class="btn mv-btn">

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

            get_template_part('template-parts/product-card');

          endwhile;
          wp_reset_postdata();
        endif;
        ?>

      </div>
    </div>
  </section>
  <?php
  $second_image = get_field('second_image');
  ?>

  <section class="second-visual"
    <?php if ($second_image): ?>
    style="background-image:url('<?php echo esc_url($second_image); ?>');"
    <?php endif; ?>>
    <div class="wrapper">
      <h2 class="second-title">
        <?php echo nl2br(esc_html(get_field('second_title'))); ?>
      </h2>

      <p class="second-text">
        <?php echo nl2br(esc_html(get_field('second_text'))); ?>
      </p>
      <?php
      $second_button = get_field('second_button');

      if ($second_button && is_array($second_button)) :
      ?>

        <a
          href="<?php echo esc_url($second_button['url']); ?>"
          target="<?php echo esc_attr($second_button['target']); ?>"
          class="btn second-btn">

          <?php echo esc_html($second_button['title']); ?>

        </a>

      <?php endif; ?>
    </div>
  </section>
  <section class="section2" id="explore-more">
    <div class="wrapper">
      <h2 class="section-title">Explore More</h2>
      <?php
      $terms = get_terms([
        'taxonomy'   => 'product_category',
        'hide_empty' => false,
      ]);

      if (!is_wp_error($terms)) :

        $current_category = isset($_GET['category'])
          ? sanitize_text_field($_GET['category'])
          : '';
      ?>



        <ul class="category-tab">

          <li>
            <a
              class="<?php echo empty($current_category) ? 'active' : ''; ?>"
              href="<?php echo esc_url(remove_query_arg('category')) . '#explore-more'; ?>">
              All
            </a>
          </li>

          <?php foreach ($terms as $term) : ?>

            <li>
              <a
                class="<?php echo ($current_category === $term->slug) ? 'active' : ''; ?>"
                href="<?php echo esc_url(add_query_arg('category', $term->slug)) . '#explore-more'; ?>">

                <?php echo esc_html($term->name); ?>

              </a>
            </li>

          <?php endforeach; ?>

        </ul>

      <?php endif; ?>

      <div class="gallery product-grid">
        <?php
        $args = array(
          'post_type' => 'product',
          'posts_per_page' => -1
        );

        if ($current_category) {

          $args['tax_query'] = array(
            array(
              'taxonomy' => 'product_category',
              'field'    => 'slug',
              'terms'    => $current_category,
            )
          );
        }

        $explore_products = new WP_Query($args);

        if ($explore_products->have_posts()) :
          while ($explore_products->have_posts()) :
            $explore_products->the_post();

            get_template_part('template-parts/product-card');

          endwhile;

          wp_reset_postdata();

        endif;
        ?>

      </div>
    </div>
  </section>
  <?php
  $third_image = get_field('third_image');
  ?>

  <section class="third-visual"
    <?php if ($third_image): ?>
    style="background-image:url('<?php echo esc_url($third_image); ?>');"
    <?php endif; ?>>
    <div class="wrapper">
      <h2 class="third-title">
        <?php echo esc_html(get_field('third_title')); ?>
      </h2>
      <p class="third-text">
        <?php echo nl2br(esc_html(get_field('third_text'))); ?>
      </p>
      <?php
      $third_button = get_field('third_button');

      if ($third_button && is_array($third_button)) :
      ?>

        <a
          href="<?php echo esc_url($third_button['url']); ?>"
          target="<?php echo esc_attr($third_button['target']); ?>"
          class="btn third-btn">

          <?php echo esc_html($third_button['title']); ?>

        </a>

      <?php endif; ?>
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

          while ($featured_products->have_posts()) :
            $featured_products->the_post();

            get_template_part('template-parts/product-card');

          endwhile;

          wp_reset_postdata();

        else :
        ?>
          <p>
            商品準備中です。
          </p>
        <?php
        endif;
        ?>
      </div>

    </div>
  </section>
</main>

<?php get_footer(); ?>