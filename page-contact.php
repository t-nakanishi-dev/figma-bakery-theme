<?php get_header(); ?>

<main class="contact-page">

  <?php
  // Hero
  $hero       = get_field('contact_hero_image');
  $hero_title = get_field('contact_hero_title');

  // Content
  $section_title = get_field('contact_title');
  $description   = get_field('contact_text');
  $map           = get_field('contact_map');

  // Contact Info
  $address = get_field('address');
  $phone   = get_field('phone');
  $email   = antispambot(get_field('email'));
  $hours   = get_field('opening_hours');
  ?>

  <section
    class="contact-hero"
    <?php if ($hero) : ?>
    style="background-image:url('<?php echo esc_url($hero); ?>');"
    <?php endif; ?>>

    <div class="wrapper">
      <h1><?php echo esc_html($hero_title); ?></h1>
    </div>

  </section>

  <section class="contact-content">

    <div class="wrapper">

      <h2><?php echo esc_html($section_title); ?></h2>

      <div class="contact-description">
        <?php echo wp_kses_post($description); ?>
      </div>

      <?php if (!empty($map)) : ?>

        <div class="contact-map">

          <iframe
            src="<?php echo esc_url($map); ?>"
            loading="lazy"
            allowfullscreen
            referrerpolicy="no-referrer-when-downgrade">
          </iframe>

        </div>

      <?php endif; ?>

      <div class="contact-form">

        <?php echo do_shortcode('[contact-form-7 id="01b8add" title="Contact"]'); ?>

      </div>

      <div class="contact-info">

        <p>
          <strong>Address</strong><br>
          <?php echo nl2br(esc_html($address)); ?>
        </p>

        <p>
          <strong>Phone</strong><br>

          <a href="tel:<?php echo esc_attr($phone); ?>">
            <?php echo esc_html($phone); ?>
          </a>
        </p>

        <p>
          <strong>Email</strong><br>

          <a href="mailto:<?php echo esc_attr($email); ?>">
            <?php echo esc_html($email); ?>
          </a>
        </p>

        <p>
          <strong>Opening Hours</strong><br>
          <?php echo nl2br(esc_html($hours)); ?>
        </p>

      </div>

    </div>

  </section>

</main>

<?php get_footer(); ?>