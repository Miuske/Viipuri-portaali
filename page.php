<?php get_header(); ?>
<div class="row">
  <div class="col-xs-12 col-sm-10 col-sm-offset-1 content page-content">
	<?php if ( have_posts() ) : 
		while( have_posts() ) : 
?><div class="page-postaus"><?php 
			the_post(); ?>
			<h3><?php the_title(); ?></h3>
     			<p><?php the_content(); ?></p></div><?php 
		endwhile; 
	endif; ?>
  </div>
</div>
<?php get_footer(); ?>