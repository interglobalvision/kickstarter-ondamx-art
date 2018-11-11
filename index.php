<?php
get_header();
?>

<main id="main-content">
  <section id="rewards">
    <div class="container">
      <div class="masonry-wrapper">

<?php
if (have_posts()) {
  while (have_posts()) {
    the_post();

    $title = get_post_meta($post->ID, '_igv_work_title', true);
    $price_mxn = get_post_meta($post->ID, '_igv_work_price_mxn', true);
    $price_usd = get_post_meta($post->ID, '_igv_work_price_usd', true);
    $year = get_post_meta($post->ID, '_igv_work_year', true);
?>

        <article <?php post_class('masonry-item item-s-6 item-m-4 item-xl-3'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>">
            <div>
              <?php the_post_thumbnail(); ?>
            </div>
            <div>
              <span><?php echo !empty($price_mxn) ? '$' . $price_mxn . ' MXN' : ''; ?></span>
              <span><?php echo !empty($price_usd) ? '$' . $price_usd . ' USD' : ''; ?></span>
            </div>
            <h2 class="u-inline font-italic"><?php echo !empty($title) ? $title : ''; ?></h2>, <span><?php echo !empty($year) ? $year : ''; ?></span>

          </a>

        </article>

<?php
  }
}
?>

      </div>
    </div>
  </section>

</main>

<?php
get_footer();
?>
