<?php get_header(); ?>


<main class="about-page">


  <?php
  $hero_image = get_field('about_hero_image');
  ?>

  <section
    class="about-hero"
    <?php if ($hero_image) : ?>
    style="background-image:url('<?php echo esc_url($hero_image); ?>');"
    <?php endif; ?>>

    <div class="wrapper">

      <h1>
        <?php echo esc_html(get_field('about_hero_title')); ?>
      </h1>

    </div>

  </section>



  <section class="about-story">

    <div class="wrapper">

      <?php
      $story_image = get_field('story_image');
      ?>

      <?php if ($story_image) : ?>

        <img
          src="<?php echo esc_url($story_image); ?>"
          alt="<?php echo esc_attr(get_field('story_title')); ?>">

      <?php endif; ?>


      <h2>
        <?php echo esc_html(get_field('story_title')); ?>
      </h2>


      <div class="story-text">
        <?php the_field('story_text'); ?>
      </div>

    </div>

  </section>



  <section class="about-philosophy">

    <div class="wrapper">

      <?php
      $philosophy_image = get_field('philosophy_image');
      ?>

      <?php if ($philosophy_image) : ?>

        <img
          src="<?php echo esc_url($philosophy_image); ?>"
          alt="<?php echo esc_attr(get_field('philosophy_title')); ?>">

      <?php endif; ?>


      <h2>
        <?php echo esc_html(get_field('philosophy_title')); ?>
      </h2>


      <div class="philosophy-text">
        <?php the_field('philosophy_text'); ?>
      </div>

    </div>

  </section>



</main>


<?php get_footer(); ?>