<?php 

function custom_theme_setup() {
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size( 230, 230, array( 'center', 'center')  );
	add_theme_support('title-tag');
	add_theme_support('custom-background');
	add_theme_support('custom-header', array('width' => 1170, 'height' => 300));
}
add_action('after_setup_theme', 'custom_theme_setup');

function register_my_menu() {
  register_nav_menu('header-menu',__( 'Ylävalikko' ));
}
add_action( 'init', 'register_my_menu' );

function wptp_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'wptp_add_tags_to_attachments' );

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}
?>