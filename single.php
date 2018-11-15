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
    $bio = get_post_meta($post->ID, '_igv_work_bio', true);
    $sold = get_post_meta($post->ID, '_igv_work_sold', true);
    $options = get_site_option('_igv_custom_options');
?>

      <article <?php post_class('grid-row margin-bottom-basic'); ?> id="post-<?php the_ID(); ?>">
        <div class="grid-item item-s-12 item-m-7">
          <?php the_post_thumbnail('reward-single'); ?>
        </div>

        <div id="single-details" class="grid-item item-s-12 item-m-5 font-size-mid grid-row">
          <div class="grid-item item-s-11 no-gutter">
            <div class="margin-bottom-tiny">
              <h1 class="font-size-large"><?php echo !empty($artist) ? $artist : ''; ?></h1>
              <?php if (!empty($bio)) { ?>
              <div>
                <span><?php echo $bio; ?></span>
              </div>
              <?php } ?>
            </div>
            <div class="margin-bottom-micro">
              <span><?php echo !empty($price_mxn) ? '$' . $price_mxn . ' MXN' : ''; ?></span> /
              <span><?php echo !empty($price_usd) ? '$' . $price_usd . ' USD' : ''; ?></span>
            </div>
            <? if (!empty($title)) { ?>
            <div>
              <h2 class="work-title font-italic"><?php echo $title; ?></h2><?php echo !empty($year) ? ', <span>' . $year . '</span>' : ''; ?>
            </div>
            <? } ?>
            <div>
              <?php the_content(); ?>
            </div>
            <div class="margin-top-basic">
              <a href="<?php echo !empty($options['kickstarter_url']) ? $options['kickstarter_url'] : 'https://kickstarter.com/profile/ondamx'; ?>" id="support" class="font-barlow font-size-mid">SUPPORT HERE</a>
            </div>
          </div>
          <div class="grid-item item-s-1 no-gutter">
            <?php
              if(!empty($sold)) {
                get_template_part('partials/sold-dot');
              }
            ?>
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
