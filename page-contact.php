<?php get_header(); ?>

<main class="contact-page">

  <?php
  $hero = get_field('contact_hero_image');
  ?>

  <section
    class="contact-hero"
    <?php if ($hero) : ?>
    style="background-image:url('<?php echo esc_url($hero); ?>');"
    <?php endif; ?>>

    <div class="wrapper">

      <h1>
        <?php echo esc_html(get_field('contact_hero_title')); ?>
      </h1>

    </div>

  </section>

  <section class="contact-content">

    <div class="wrapper">

      <h2>
        <?php echo esc_html(get_field('contact_section_title')); ?>
      </h2>

      <div class="contact-description">
        <?php the_field('contact_description'); ?>
      </div>

      <div class="contact-info">

        <p>
          <strong>Address</strong><br>
          <?php echo nl2br(esc_html(get_field('contact_address'))); ?>
        </p>

        <p>
          <strong>Phone</strong><br>

          <a href="tel:<?php echo esc_attr(get_field('contact_phone')); ?>">
            <?php echo esc_html(get_field('contact_phone')); ?>
          </a>
        </p>

        <p>
          <strong>Email</strong><br>

          <a href="mailto:<?php echo antispambot(get_field('contact_email')); ?>">
            <?php echo antispambot(get_field('contact_email')); ?>
          </a>
        </p>

        <p>
          <strong>Opening Hours</strong><br>
          <?php echo nl2br(esc_html(get_field('contact_opening_hours'))); ?>
        </p>

      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>