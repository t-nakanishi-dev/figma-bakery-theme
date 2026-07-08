<?php get_header(); ?>

<main class="error-404">

    <div class="wrapper">

        <h1>404</h1>

        <h2>Oops! Page Not Found</h2>

        <p>
            The page you're looking for doesn't exist<br>
            or may have been moved.
        </p>

        <a
            href="<?php echo esc_url(home_url('/')); ?>"
            class="btn">
            Back to Home
        </a>

    </div>

</main>

<?php get_footer(); ?>