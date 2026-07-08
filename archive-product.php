<?php get_header(); ?>

<main class="archive-product page-content">

  <div class="wrapper">

    <h1 class="section-title">Products</h1>

    <div class="products product-grid">

      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

          <?php get_template_part('template-parts/product-card'); ?>

        <?php endwhile; ?>
      <?php endif; ?>

    </div>

  </div>

</main>

<?php get_footer(); ?>