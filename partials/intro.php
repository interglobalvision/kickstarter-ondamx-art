<?php
$options = get_site_option('_igv_custom_options');

if (!empty($options['intro_text'])) {
?>
<section id="intro" class="text-align-center grid-row justify-center padding-top-basic margin-bottom-large js-fix-widows">
  <div class="grid-item item-s-12 item-m-10 item-l-8 font-size-large">
    <?php echo apply_filters('the_content', $options['intro_text']); ?>
  </div>
</section>
<?php
}
?>
