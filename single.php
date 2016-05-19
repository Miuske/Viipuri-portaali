<?php get_header(); ?>
<?php get_template_part('three_links'); ?>
	<div class="row">
<?php $categories = get_the_category(); 
if ( ! empty( $categories ) ) {
  if($categories[0]->name === 'Kirjallisuus'){ ?>
<div class="col-xs-12 col-md-3 kirjan-kansikuva">
  <?php echo get_the_post_thumbnail(); ?>
</div>
<div class="col-xs-12 col-md-9">
<?php } else { ?>
		<div class="col-xs-12">
<?php } } ?>
		  <div class="single-article">
<?php if ( have_posts() ) : 
	while( have_posts() ) : 
		the_post(); 
$do_not_duplicate = $post->ID;?>
		<h1><?php the_title(); ?></h1>
     		<p><?php the_content() ?></p>
		<!-- the_terms( $post->ID, 'post_tag' ); -->

	<?php 
	endwhile; 
?>
		
<?php $categories = get_the_category(); 
if ( ! empty( $categories ) ) {
  if($categories[0]->name === 'Kirjallisuus'){ ?>
</div></div><div class="col-xs-12"><a href="<?php echo get_home_url(); ?>/kirjallisuus"><h3><i class="fa fa-chevron-left"></i> Katso kaikkia kirjoja</h3></a></div><div>
<?php } else {
    echo '<a href="'. get_home_url() .'/kartta"><h3>Katso lisää henkilöitä ja paikkoja kartta sivulla <i class="fa fa-chevron-right"></i></h3></a></div>'; ?>
<h3>Tähän liittyviä artikkeleita</h3>
<?php 
$posttags = get_the_tags();
if ($posttags) {
  foreach($posttags as $tag) {
      $allTags .= $tag->name . ',';
  }
} 
$args = array( 'posts_per_page' => 3, 'orderby'=>'rand', 'tag' => $allTags );
$my_query = new WP_Query($args );
  $i = 1;
  echo '<div class="row">';
while ( $my_query->have_posts() ) : $my_query->the_post(); 
if ( $post->ID == $do_not_duplicate ) continue; ?>
<a href="<?php the_permalink(); ?>"><div class="single-post-related col-sm-4">
	<h4><?php the_title(); ?></h4>
	<p><?php echo wp_trim_words( get_the_content(), 40, ' <i class="jatka-lukemista">Jatka lukemista</i>' ); ?></p>
</div></a>
<?php
if($i % 3 == 0) {echo '</div><div class="row">';} 
$i++;

endwhile; 
  }
}
endif; 
echo '</div>'; ?>
		</div>
	</div>
<?php get_footer(); ?>