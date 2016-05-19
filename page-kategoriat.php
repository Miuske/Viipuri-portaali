<?php /* Template Name: Kategoriat */ ?>

<?php get_header(); ?>
<?php get_template_part('three_links'); ?>
  <div class="row content kategoria-wrapper">
<?php 
$category = get_the_title();
query_posts('category_name='.$category);
if($category == 'Henkilöt' || $category == 'Paikat'){
  $i = 1;
  echo '<div class="row clearfix">';
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>">
	<div class="kategoria-listaus col-sm-4">
		<h2><?php the_title(); ?></h2>
		<p><?php echo wp_trim_words( get_the_content(), 40, ' <i class="jatka-lukemista">Jatka lukemista</i>' ); ?></p>
	</div>
    </a>
  <?php
if($i % 3 == 0) {echo '</div><div class="row clearfix">';}
$i++; endwhile; else: 
echo 'Ei näytettäviä artikkeleita';
endif;
echo '</div>'; 
} else {
    $posttags = get_tags();
  if ($posttags) {
    foreach($posttags as $tag) {
	if(substr( $tag->name, 0, 5 ) === "vuosi"){
	$i = 1;
	echo '<div class="row">';
	$vuosiluku = substr($tag->name, 6, 15);
	echo '<h3>'.$vuosiluku.'</h3>';
	echo '</div><div class="row">';
            $my_query = new WP_Query( 'tag='.$tag->name );
  while ( $my_query->have_posts() ) : $my_query->the_post(); ?> 
      <a href="<?php the_permalink(); ?>">
        <div class="kategoria-listaus aikajana col-sm-4">
	  <h4><?php the_title(); ?></h4>
	  <p><?php echo wp_trim_words( get_the_content(), 40, ' <i class="jatka-lukemista">Jatka lukemista</i>' ); ?></p>
        </div>
      </a>
   <?php
   if($i % 3 == 0) {echo '</div><div class="row">';} 
   $i++;
  endwhile; 
echo '</div>';
	}
    }
  }
}

?>
</div>
<?php get_footer(); ?>