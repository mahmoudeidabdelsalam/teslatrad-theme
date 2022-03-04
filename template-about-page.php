<?php
/* Template Name: about us */ 
/*
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#about-page
 *
*/

get_header(); 
?>

<section class="header-page" style="background-image: url('<?= $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>');"></section>

<section class="tabs-about-us">

  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php _e('Who we are', 'teslatradeltd'); ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><?php _e('Vision & Mission', 'teslatradeltd'); ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?php _e('Accreditations', 'teslatradeltd'); ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="company-tab" data-toggle="tab" href="#company" role="tab" aria-controls="company" aria-selected="false"><?php _e('Company Profile', 'teslatradeltd'); ?></a>
    </li>
    <li class="nav-item" role="presentation">
      <a class="nav-link" id="team-tab" data-toggle="tab" href="#team" role="tab" aria-controls="team" aria-selected="false"><?php _e('Our Team', 'teslatradeltd'); ?></a>
    </li>
  </ul>

  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <section class="top-about">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-12">
              <img src="<?= the_field('image_about_us'); ?>" alt="<?= the_field('headline'); ?>">
            </div>
            <div class="col-md-6 col-12">
              <h2><?= the_field('headline'); ?></h2>
              <p><?= the_field('sub_headline'); ?></p>
              <span><?= the_field('signature'); ?></span>
            </div>
          </div>
        </div>
      </section>
    </div>

    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <section class="mission-vision">
        <div class="container">
          <div class="row justify-content-center align-items-center">

            <div class="col-md-6 col-12">
              <div class="in-box">
                <h3><?= the_field('mission_headline');?></h3>
                <p><?= the_field('mission_text');?></p>
              </div>
            </div>

            <div class="col-md-6 col-12">
              <img src="<?= the_field('mission_image');?>" alt="<?= the_field('mission_headline');?>">
            </div>

            <div class="col-md-6 col-12">
              <img src="<?= the_field('mission_image');?>" alt="<?= the_field('mission_headline');?>">
            </div>

            <div class="col-md-6 col-12">
              <div class="in-box">
                <h3><?= the_field('mission_headline');?></h3>
                <p><?= the_field('mission_text');?></p>
              </div>
            </div>
          </div>
        </div>      
      </section>
    </div>

    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
      <section class="values-us">    
        <div class="container">
          <div class="row">
            <div class="owl-carousel owl-theme col-12">
              <?php
              if( have_rows('values') ):
                while( have_rows('values') ) : the_row();
              ?>
                <div class="item">
                  <a href="<?= get_sub_field('values_headline'); ?>"><img src="<?= get_sub_field('values_img'); ?>" alt="logo Accreditations"></a>
                </div>
              <?php
                endwhile;
              endif;
              ?>  
            </div>    
          </div>
        </div>
      </section>
        
    </div>
    <div class="tab-pane fade" id="company" role="tabpanel" aria-labelledby="company-tab">
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-md-7 col-12">
            <h2><?= get_field('company_headline'); ?> <span><?= get_field('company_headline'); ?></span></h2>
            <p><?= get_field('company_sub_headline'); ?></p>
          </div>
          <div class="col-md-5 col-12">
            <div class="embed-container">
              <?= the_field('company_video_about_us'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="team" role="tabpanel" aria-labelledby="team-tab">
      <section class="team-us">
        <div class="container">
          <div class="row">
            <?php
            if( have_rows('our_team') ):
              while( have_rows('our_team') ) : the_row();
            ?>
              <div class="col-md-4 col-12 mb-5">
                <div class="box">
                  <img class="avatar" src="<?= get_sub_field('team_image'); ?>" alt="<?= get_sub_field('team_name'); ?>">
                  <div class="col">
                    <h3 class="team-name"><?= get_sub_field('team_name'); ?></h3>
                    <p class="team-text"><?= get_sub_field('team_text'); ?></p>
                  </div>
                  <span class="call-action">
                    <a href="tel:<?= get_sub_field('phone_team'); ?>"><i class="fas fa-phone-alt"></i></a>
                    <a href="mailto:<?= get_sub_field('email_team'); ?>"><i class="fas fa-envelope-open-text"></i></a>
                    <a href="<?= get_sub_field('map_team'); ?>" target="_blank"><i class="fas fa-map-marked-alt"></i></a>
                    <a href="https://api.whatsapp.com/send/?phone=<?= get_sub_field('whatsapp_team'); ?>"><i class="fab fa-whatsapp"></i></a>
                  </span>
                </div>
              </div>
            <?php
              endwhile;
            endif;
            ?>      
          </div>
        </div>
      </section>
    </div>
  </div>
</section>


<?php
get_footer();
?>
