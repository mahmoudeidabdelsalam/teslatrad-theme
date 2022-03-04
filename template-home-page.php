<?php
/* Template Name: Home Page */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#hom-page
 *
*/

get_header(); 
?>

<section class="slider-us">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      $counter = 0;
      if( have_rows('slider_home') ):
        while( have_rows('slider_home') ) : the_row();
        $counter++;
      ?>
        <div class="carousel-item <?= ($counter == 1)? 'active':''; ?>">
          <img src="<?= get_sub_field('image_slider'); ?>" class="d-block w-100" alt="slide">
          <div class="carousel-caption d-none d-md-block">
            <?= get_sub_field('content_slider'); ?>
            <a class="readmore" href="<?= get_sub_field('page_slider'); ?>">see more ...</a>
          </div>
        </div>
      <?php
        endwhile;
      endif;
      ?>
    </div>
    <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </button>
  </div>
</section>

<section class="about-us">
  <div class="container">


      <div class="row row-with-vspace site-branding">
        <div class="row justify-content-center align-items-center">
          <?php
            if( have_rows('steps_about_us') ):
              while( have_rows('steps_about_us') ) : the_row();
            ?>
            <div class="col-md-2 col-sm-4 col-12 p-0">
              <div class="box-custom mr-2 ml-2" style="background:<?= get_sub_field('color_step'); ?>">
                <img src="<?= get_sub_field('icon_step'); ?>" alt="<?= get_sub_field('headline_step'); ?>">
                <h3><?= get_sub_field('headline_step'); ?></h2>
                <p><?= get_sub_field('text_step'); ?></p>
              </div>
            </div>
            <?php
              endwhile;
            endif;
            ?>
        </div>
      </div>

    <div class="row justify-content-center align-items-center">
      <div class="col-md-7 col-12">
        <h2><?= get_field('headline_about_us'); ?></h2>
        <p><?= get_field('content_about_us'); ?></p>
      </div>
      <div class="col-md-5 col-12">
        <div class="embed-container">
          <?= the_field('video_about_us'); ?>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
$terms = get_terms( array(
  'taxonomy' => 'products-tag',
  'hide_empty' => false,
  'parent' => 0
) );
?>
<section class="services-us">
  <div class="container">
    <div class="row">
      <p class="services-text"><?= the_field('products_text'); ?></p>
      <h2 class="services-head"><?= the_field('products_headline'); ?></h2>
    </div>
    <div class="row pt-5">
      <div class="col-12">
        <div class="nav  nav-tabs" id="tab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">
              <?php _e('all', 'teslatrad'); ?>
            </a>
          </li>
          <?php 
            foreach ($terms  as $term): 
            ?>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="dLabel<?= $term->term_id; ?>" data-toggle="dropdown" aria-expanded="false">
                <?= $term->name; ?>
              </a>
              <div class="dropdown-menu" aria-labelledby="dLabel<?= $term->term_id; ?>">
                <?php 
                foreach( get_terms( 'products-tag', array( 'hide_empty' => false, 'parent' => $term->term_id ) ) as $child_term ): ?>
                  <a class="dropdown-item"  data-toggle="tab" href="#tab-<?= $child_term->term_id; ?>" role="tab" aria-controls="<?= $child_term->term_id; ?>-tab" aria-selected="false">
                    <?= $child_term->name; ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </li>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="col-12">
        <div class="tab-content" id="tabContent">
          <div class="tab-pane show active fade" id="all" role="tabpanel" aria-labelledby="all-tab">
            <div class="row">
              <?php 
                $all = array(
                  'post_type' => 'products',
                );
                $query_all = new WP_Query( $all );
              ?>
              <?php 
                if ( $query_all->have_posts() ):
                  while ( $query_all->have_posts() ):
                    $query_all->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
              ?>
                <div class="col-md-4 col-12">
                  <div class="card">
                    <img src="<?= $featured_img_url; ?>" class="card-img-top" alt="<?= the_title(); ?>">
                    <div class="card-body">
                      <p class="term-text"><?= $term->name; ?></p>
                      <h5 class="card-title"><?= the_title(); ?></h5>
                      <p class="card-text"><?=  wp_trim_words( get_the_content(), 5 ); ?></p>
                    </div>
                  </div>
                </div>
              <?php 
                  endwhile; 
                endif; 
              wp_reset_postdata(); 
              ?>
            </div>
           </div>

        <?php 
          $counter=0;
            foreach ($terms  as $term): 
            $counter++;
              foreach( get_terms( 'products-tag', array( 'hide_empty' => false, 'parent' => $term->term_id ) ) as $child_term ): ?>
            <div class="tab-pane fade" id="tab-<?= $child_term->term_id; ?>" role="tabpanel" aria-labelledby="<?= $child_term->term_id; ?>-tab">
              <div class="row">
                <?php 
                $args = array(
                  'post_type' => 'products',
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'products-tag',
                      'field' => 'term_id',
                      'terms' => $child_term->term_id
                    )
                  )
                );
                $query = new WP_Query( $args );
                ?>
                <?php 
                if ( $query->have_posts() ):
                  while ( $query->have_posts() ):
                    $query->the_post();
                    $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                ?>
                  <div class="col-md-4 col-12">
                    <div class="card">
                      <img src="<?= $featured_img_url; ?>" class="card-img-top" alt="<?= the_title(); ?>">
                      <div class="card-body">
                        <p class="term-text"><?= $term->name; ?></p>
                        <h5 class="card-title"><?= the_title(); ?></h5>
                        <p class="card-text"><?=  wp_trim_words( get_the_content(), 5 ); ?></p>
                      </div>
                    </div>
                  </div>
                <?php 
                    endwhile; 
                  endif; 
                wp_reset_postdata(); 
                ?>
              </div>
            </div>
            <?php endforeach; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="contact-us" style="background-image: url('<?= the_field('img_contact_us'); ?>');">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12 m-auto">
        <div class="contact-text text-center text-white mb-0"><?= the_field('content_contact_us'); ?></div>
        <h2 class="contact-head"><?= the_field('headline_contact_us'); ?></h2>      
        <div class="map">
          <?= the_field('map_embed_home'); ?>
        </div>
      </div>
      <div class="col-md-6 col-12 m-auto">
        <?=  do_shortcode( '[gravityform id="'.get_field('form_id').'" title="false" description="false" ajax="true"]' ); ?>
      </div>
    </div>
  </div>
</section>

<?php
get_footer();
?>
