<?php /* Template Name: Kirjallisuus */ ?>

<?php get_header(); ?>
  <div class="row content kirjallisuus-wrapper">
<?php 
$category = get_the_title();
query_posts('category_name='.$category);
if($category == 'Kirjallisuus'){
  $i = 1;
  echo '<div class="row">';
  if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <a href="<?php the_permalink(); ?>">
	<div class="kirjallisuus-listaus col-xs-6 col-sm-2">
	<div class="kirjan-kansi"><?php 
		if ( has_post_thumbnail() ) {
    			the_post_thumbnail();
		} else {?>
			<img src="<?php bloginfo('template_directory'); ?>/images/tyhjakirja.jpg" /><?php 
		}?></div>
		<h2><?php the_title(); ?></h2>
	</div>
    </a>
  <?php
if($i % 6 == 0) {echo '</div><div class="row">';}
$i++; endwhile; else: 
echo 'Ei näytettäviä artikkeleita';
endif;
echo '</div>'; 
}
?>
</div>
<?php get_footer(); ?>