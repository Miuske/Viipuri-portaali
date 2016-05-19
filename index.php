<?php get_header(); ?>
<div class="row">
  <div class="col-xs-12 col-md-4 content">
	<?php if ( have_posts() ) : 
		while( have_posts() ) : 
			the_post();
     			the_content();
		endwhile; 
	endif; ?>
</div>
</div>
<?php get_footer(); ?>