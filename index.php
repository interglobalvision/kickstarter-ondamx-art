<?php
get_header();
?>

<main id="main-content" class="margin-top-basic">
  <div class="container">
<?php
if (have_posts()) {
?>
    <section id="rewards" class="margin-top-mid">
      <div id="masonry-holder">
<?php
  while (have_posts()) {
    the_post();

    $artist = get_post_meta($post->ID, '_igv_work_artist', true);
    $title = get_post_meta($post->ID, '_igv_work_title', true);
    $price_mxn = get_post_meta($post->ID, '_igv_work_price_mxn', true);
    $price_usd = get_post_meta($post->ID, '_igv_work_price_usd', true);
    $year = get_post_meta($post->ID, '_igv_work_year', true);
?>

        <article <?php post_class('masonry-item'); ?> id="post-<?php the_ID(); ?>">

          <a href="<?php the_permalink() ?>">
            <div class="thumb-holder margin-bottom-tiny">
              <?php
                $post_thumbnail_id = get_post_thumbnail_id( $post->ID );

                echo !empty($post_thumbnail_id) ? wp_get_attachment_image($post_thumbnail_id, 'catalog-thumb', false, array('data-no-lazysizes'=>'true')) : '';
              ?>
            </div>
            <h2 class="font-size-mid"><?php echo !empty($artist) ? $artist : ''; ?></h2>
            <div>
              <span><?php echo !empty($price_mxn) ? '$' . $price_mxn . ' MXN' : ''; ?></span> /
              <span><?php echo !empty($price_usd) ? '$' . $price_usd . ' USD' : ''; ?></span>
            </div>
            <h3 class="u-inline-block font-italic"><?php echo !empty($title) ? $title : ''; ?></h3><?php echo !empty($year) ? ', <span>' . $year . '</span>' : ''; ?>

          </a>

        </article>

<?php
  }
?>
      </div>
    </section>
<?php
}

get_template_part('partials/intro');
?>

  </div>
</main>

<?php
get_footer();
?>
