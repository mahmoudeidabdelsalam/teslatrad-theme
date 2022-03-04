<?php
/** 
 * The theme footer.
 * 
 * @package bootstrap-basic4
 */


$terms = get_terms( array(
  'taxonomy' => 'products-tag',
  'hide_empty' => false,
  'parent' => 0
) );
?>

    <footer id="site-footer" class="site-footer page-footer px-0">
     <div class="container">
        <div class="row justify-content-center">
         <div class="col-md-3 col-12">
            <a href="<?php echo esc_url(home_url('/')); ?>"
              title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
              <img class="img-fluid" src="<?=get_theme_file_uri().'/assets/img/logo-footer.png' ?>"
                alt="<?=get_bloginfo('name', 'display') ?>" title="<?=get_bloginfo('name') ?>" />
              <span class="sr-only"> <?=get_bloginfo('name') ?> </span>
            </a>

            <p><?= get_field('contact_us_text', 'option'); ?></p>
         </div>
         <div class="col-md-3 col-12">
           <h3 class="text-widget"><?= _e('Business Sectors', 'teslatradeltd'); ?></h3>
           <ul>
           <?php 
            foreach ($terms  as $term): 
              $term_link = get_term_link( $term );
            ?>
            <li class="footer-item">
              <a class="footer-link" href="<?= $term_link; ?>">
                <?= $term->name; ?>
              </a>
            </li>
          <?php endforeach; ?>
           </ul>
         </div>
         <div class="col-md-3 col-12">
          <h3 class="text-widget"><?= _e('CONTACT INFO.', 'teslatradeltd'); ?></h3>
            <ul>
              <?php
              if( have_rows('contact_us', 'option') ):
                while( have_rows('contact_us', 'option') ) : the_row();
              ?>
                <li class="footer-item">
                  <img class="footer-link" src="<?= get_sub_field('icon_contact'); ?>" alt="<?= get_sub_field('text_contact'); ?>">
                  <span><?= get_sub_field('text_contact'); ?></span>
                </li>
              <?php
                endwhile;
              endif;
              ?>
            </ul>
            <ul class="list-inline">
              <?php
              if( have_rows('social_media', 'option') ):
                while( have_rows('social_media', 'option') ) : the_row();
              ?>
                <li class="list-inline-item">
                  <a href="<?= get_sub_field('link_social_media'); ?>"><img src="<?= get_sub_field('icon_social_media'); ?>" alt="<?= get_sub_field('text_contact'); ?>"></a>
                </li>
              <?php
                endwhile;
              endif;
              ?>
            </ul>
         </div>
         <div class="col-md-3 col-12">
          <h3 class="text-widget"><?= _e('NEWSLETTER', 'teslatradeltd'); ?></h3>
          <p><?= _e('Stay up to update with our latest news and products.', 'teslatradeltd'); ?></p>
          <?=  do_shortcode( '[gravityform id="'.get_field('newsletter_id', 'option').'" title="false" description="false" ajax="true"]' ); ?>
         </div>
        </div>
      </div>

      <div class="copy-right px-5">
        <div class="row align-items-center">
          <div class="col-md-6 col-12">
            <p><?= get_field('copy_right', 'option'); ?></p>
          </div>
          <div class="col-md-6 col-12 text-right">
            <a class="text-white" href="https://digitechsltd.com/"><?= _e('Powered by DigiTechs Solutions Ltd.', 'teslatradeltd'); ?></a>
          </div>
        </div>
      </div>      
    </footer>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php _e('What are you looking for ... ?', 'teslatradeltd'); ?></h5>
            <p><?php _e('simply enter your keyword and we will help you find what you need', 'teslatradeltd'); ?></p>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form method="get" action="<?php echo esc_url(home_url('/')); ?>">
                <div class="input-group">
                    <input class="form-control" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Enter Your Keyword ...', 'teslatradeltd'); ?>" title="<?php esc_attr_e('Enter Your Keyword ...', 'teslatradeltd'); ?>">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit"><?php _e('SUBMIT', 'teslatradeltd'); ?></button>
                    </span>
                </div>
            </form><!--to override this search form, it is in <?php echo __FILE__; ?> -->
            
          </div>
        </div>
      </div>
    </div>

    <?php wp_footer(); ?> 
  </body>
</html>
