<?php
/* Template Name: our Blog */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 

$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

$all=array(
  'post_type'      => 'post',
  'post_status'    => 'publish',
  'posts_per_page' => 12,
  'paged' => $paged
);
$all_posts = get_posts( $all );
$query_all = new WP_Query( $all );
?>


<section class="header-page" style="background-image: url('<?= $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');"></section>

<section class="posts">

<section class="tabs-about-us">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true"><?php _e('all', 'teslatradeltd'); ?></a>
    </li>
  <?php 
    $categories = get_categories( array('orderby' => 'name', 'order' => 'ASC') );
    foreach( $categories as $category ):
    ?>
      <li class="nav-item" role="presentation">
        <a class="nav-link" id="<?= $category->term_id; ?>-tab" data-toggle="tab" href="#term-<?= $category->term_id; ?>" role="tab" aria-controls="term-<?= $category->term_id; ?>" aria-selected="true"><?= $category->name; ?></a>
      </li>
    <?php
    endforeach;
  ?>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
      <div class="container">
        <div class="row">
          <?php 
          if ( $all_posts ):
            foreach ( $all_posts as $post ):
              $img_url = get_the_post_thumbnail_url($post->ID,'full');
              $author_id = $post->post_author;
              ?>
              <div class="col-md-4 col-12">
                <div class="box-post">
                  <img src="<?= $img_url; ?>" alt="<?= get_the_title($post->ID); ?>">
                  <div class="infromtion">
                    <time datetime="<?php echo get_the_date('c', $post->ID); ?>" itemprop="datePublished"><?php echo get_the_date('M d, Y', $post->ID); ?></time>
                    <span><?php _e('by', 'teslatradeltd'); ?> <?php the_author_meta( 'user_nicename' , $author_id ); ?> </span>
                  </div>
                  <h2><a href="<?= get_the_permalink($post->ID); ?>"><?= get_the_title($post->ID); ?></a></h2>
                </div>
              </div>
              <?php
            endforeach;
          endif;
          ?>
        </div>
      </div>
    </div>
    
    <?php
      foreach( $categories as $category ):
        $args=array(
          'post_type'      => 'post',
          'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field'    => 'term_id',
                'terms'    => $category->term_id,
            ),
          ),
          'posts_per_page' => 12,
          'paged' => $paged
        );
        $posts = get_posts( $args );
      ?>
      <div class="tab-pane fade" id="term-<?= $category->term_id; ?>" role="tabpanel" aria-labelledby="<?= $category->term_id; ?>-tab">
        <div class="container">
          <div class="row">
            <?php 
            if ( $posts ):
              foreach ( $posts as $post ):
                $img_url = get_the_post_thumbnail_url($post->ID,'full');
                $author_id = $post->post_author;
                ?>
                <div class="col-md-4 col-12">
                  <div class="box-post">
                    <img src="<?= $img_url; ?>" alt="<?= get_the_title($post->ID); ?>">
                    <div class="infromtion">
                      <time datetime="<?php echo get_the_date('c', $post->ID); ?>" itemprop="datePublished"><?php echo get_the_date('M d, Y', $post->ID); ?></time>
                      <span><?php _e('by', 'teslatradeltd'); ?> <?php the_author_meta( 'user_nicename' , $author_id ); ?> </span>
                    </div>
                    <h2><a href="<?= get_the_permalink($post->ID); ?>"><?= get_the_title($post->ID); ?></a></h2>
                  </div>
                </div>
                <?php
              endforeach;
            endif;
            ?>
          </div>
        </div>

      </div>
      <?php
      endforeach;
    ?>    
  </div>
  <div class="container">
    <?php echo custom_base_pagination(array(), $query_all); ?>
  </div>
</section>

<?php
get_footer();
?>
