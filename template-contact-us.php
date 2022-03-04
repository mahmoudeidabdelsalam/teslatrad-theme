<?php
/* Template Name: Contact US */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 
?>

<section class="header-page" style="background-image: url('<?= $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');">
</section>

<section class="contsct-us-info mt-5 mb-5">
  <div class="container">
    <div class="row">
      <?php
      if( have_rows('contact_info') ):
        while( have_rows('contact_info') ) : the_row();
      ?>
        <div class="col-md-4 col-12 text-center">
          <img src="<?= get_sub_field('contact_image'); ?>" alt="<?= get_sub_field('contact_headline'); ?>">
          <h3><?= get_sub_field('contact_headline'); ?></h3>
          <p><?= get_sub_field('contact_text'); ?></p>
        </div>
      <?php
        endwhile;
      endif;
      ?>   
    </div>
  </div>
</section>

<section class="contsct-us-info">
  <div class="container">
    <div class="row">
        <div class="col-md-6 col-12">
          <h2><?= the_field('headline'); ?></h2>
          <?=  do_shortcode( '[gravityform id="'.get_field('id_form').'" title="false" description="false" ajax="true"]' ); ?>
        </div>
        <div class="col-md-6 col-12 pt-5">
          <div class="map-contact-us">
            <?= the_field('map_embed'); ?>
          </div>
        </div>
    </div>
  </div>
</section>


<section class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h2 class="headline mb-5"><img class="mr-3" src="<?=get_theme_file_uri().'/assets/img/world.svg' ?>" alt="<?php _e('International Offices', 'teslatradeltd'); ?>"><?php _e('International Offices', 'teslatradeltd'); ?></h2>
      </div>      
      <?php
      if( have_rows('contact_us_information') ):
        while( have_rows('contact_us_information') ) : the_row();
      ?>
        <div class="col-md-4 col-12 text-center mt-3 mb-5">
          <img src="<?= get_sub_field('contact_information_image'); ?>" alt="<?php _e('International Offices', 'teslatradeltd'); ?>">
          <div class="information-content"><?= get_sub_field('information_content'); ?></div>
        </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
  </div>
</section>

<?php
get_footer();
?>
