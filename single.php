<?php
get_header();
?>

<main id="main-content" class="margin-top-mid">
  <div class="container">
<?php
if (have_posts()) {
?>
    <section id="reward">
<?php
  while (have_posts()) {
    the_post();

    $artist = get_post_meta($post->ID, '_igv_work_artist', true);
    $title = get_post_meta($post->ID, '_igv_work_title', true);
    $price_mxn = get_post_meta($post->ID, '_igv_work_price_mxn', true);
    $price_usd = get_post_meta($post->ID, '_igv_work_price_usd', true);
    $year = get_post_meta($post->ID, '_igv_work_year', true);
?>

      <article <?php post_class('grid-row margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">
        <div class="grid-item item-s-12 item-m-6 item-l-7">
          <?php the_post_thumbnail('reward-single'); ?>
        </div>

        <div id="single-details" class="grid-item item-s-12 item-m-6 item-l-5 font-size-mid">
          <h1 class="font-size-large margin-bottom-micro"><?php echo !empty($artist) ? $artist : ''; ?></h1>
          <div class="margin-bottom-micro">
            <span><?php echo !empty($price_mxn) ? '$' . $price_mxn . ' MXN' : ''; ?></span> /
            <span><?php echo !empty($price_usd) ? '$' . $price_usd . ' USD' : ''; ?></span>
          </div>
          <div>
            <h2 class="u-inline-block font-italic"><?php echo !empty($title) ? $title : ''; ?></h2>, <span><?php echo !empty($year) ? $year : ''; ?></span>
          </div>
          <div>
            <?php the_content(); ?>
          </div>
          <div class="margin-top-basic">
            <a href="<?php echo !empty($options['kickstarter_url']) ? $options['kickstarter_url'] " : 'https://kickstarter.com/profile/ondamx'; ?>" id="support" class="font-barlow font-size-mid">SUPPORT HERE</a>
          </div>
        </div>

      </article>

<?php
  }
?>
    </section>
<?php
}

get_template_part('partials/intro');
?>

  </div>

<?php
$options = get_site_option('_igv_custom_options');

if (!empty($options['video_embed'])) {
?>
<section id="video">
  <div class="u-video-embed-container">
    <?php echo $options['video_embed']; ?>
  </div>
</section>
<?php
}
?>

</main>

<?php
get_footer();
?>
