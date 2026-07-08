<!doctype html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bakery</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600&family=Sansita+Swashed:wght@400;700&display=swap"
    rel="stylesheet" />
  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <div class="wrapper">
      <h1 class="header-logo">
        <a href="#">
          <img
            src="<?php echo get_template_directory_uri(); ?>/images/bakery-logo.png"
            width="114"
            height="117"
            alt="Bake House"
            decoding="async" />
        </a>
      </h1>
      <button class="hamburger" aria-label="メニューを開く">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <nav>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
          <li><a href="#">Menu</a></li>
          <li><a href="<?php echo esc_url(home_url('/about/')); ?>">
              About
            </a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></li>
        </ul>
      </nav>
    </div>
  </header>