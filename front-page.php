<?php /* Template Name: Etusivun */ ?>
<?php get_header(); ?>
<?php get_template_part('three_links'); ?>
<div class="row">
  <div class="col-xs-12 wide-element">
    <div class="map-img-wrapper">
      <div class="map-img-overlay"></div>
        <div class="map-on-img-txt">
          <h1>Palaa ajassa taaksepäin</h1>
          <h3>Koe mennyt Viipuri uudestaan <br /> kuvien ja tarinoiden kautta.</h3>
          <a href="<?php echo get_home_url() ?>/kartta"><div class="custom-button"><p>Tutustu <i class="fa fa-angle-double-right fa-1x"></i> </p></div></a>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row topic">
      <a href="<?php echo get_home_url() ?>/kuva-arkisto" alt="Kuva-arkisto"><h3>Kuva-arkisto</h3></a>
    </div>
    <div class="row">
      <div class="kuva-arkisto">
<?php 
$query_images_args = array( 'post_type' => 'attachment', 'post_mime_type' => 'image', 'post_status' => 'inherit', 'posts_per_page' => 20, 'orderby'=>'rand');
$query_images = new WP_Query( $query_images_args );
foreach ( $query_images->posts as $image ) {
    $posttags = get_the_tags($image->ID);
    if ($posttags) {
      echo '<div class="slider-img">';
      echo '<a href="'.wp_get_attachment_url( $image->ID ).'" target="_blank" alt="">';
      echo '<img src="'.wp_get_attachment_url( $image->ID ).'" alt="" >';
      echo '</div>';
    }
} ?>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid dark-bg">
  <div class="container">
    <div class="row topic-dark">
      <a href="<?php echo get_home_url() ?>/kirjallisuus" alt="Viipuriin liittyvää kirjallisuutta"><h3>Kirjallisuus</h3></a>
    </div>
    <div class="row">
      <div class="kirjallisuus">
<?php 
query_posts('category_name=Kirjallisuus' );
if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>">
	<div class="slider-img">
	<?php if ( has_post_thumbnail() ) : the_post_thumbnail();
	else : ?><img src="<?php bloginfo('template_directory'); ?>/images/tyhjakirja.jpg" />
	<?php endif ?>
	<h3><?php the_title(); ?></h3>
	</div>
    </a>
  <?php
endwhile; 
endif;
?>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function(){
	
      $('.kuva-arkisto').slick({
        infinite: true,
        slidesToShow: 4,
	slidesToScroll: 3,
        arrows: true,
	speed: 1000,
	responsive: [
    	  {
      	    breakpoint: 750,
      	    settings: {
        	slidesToShow: 1,
        	slidesToScroll: 1,
		speed: 500
	    }
	  }]
      });
       $('.kirjallisuus').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 4,
        arrows: true,
	speed: 1000,
	responsive: [
    	  {
      	    breakpoint: 750,
      	    settings: {
        	slidesToShow: 2,
        	slidesToScroll: 1,
		speed: 500
	    }
	  }]
      });
    });
  </script>
<?php get_footer(); ?>