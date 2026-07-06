<a href="<?php the_permalink(); ?>" class="product-card">

  <?php if (has_post_thumbnail()) : ?>
    <?php the_post_thumbnail(); ?>
  <?php endif; ?>

  <div class="product-card__body">

    <p class="product-card__name">
      <?php the_title(); ?>
    </p>

    <?php
    $price = get_field('price');
    if ($price) :
    ?>
      <p class="product-card__price">
        $<?php echo esc_html($price); ?>
      </p>
    <?php endif; ?>

    <div class="btn product-card__button">
      Shop Now
    </div>

  </div>

</a>