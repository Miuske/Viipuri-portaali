<?php /* Template Name: Kuva-arkiston */ ?>

<?php get_header(); ?>

<?php 
$url = get_site_url().'/panorama/panorama.php'; ?>
<iframe class="panorama-iframe" src="<?php echo $url ?>"></iframe>

<?php 
    $query_images_args = array(
    'post_type'      => 'attachment',
    'post_mime_type' => 'image',
    'post_status'    => 'inherit',
    'posts_per_page' => - 1,
);

$query_images = new WP_Query( $query_images_args );

$images = array();
echo '<div class="row kuva-arkisto-content">';
foreach ( $query_images->posts as $image ) {
    $posttags = get_the_tags($image->ID);
    if ($posttags) {
      echo '<div class="col-sm-4 col-md-2 yksittainen-kuva">';
        echo '<a href="'.wp_get_attachment_url( $image->ID ).'" target="_blank" alt="">';
          echo '<img class="thumbnail img-responsive" src="'.wp_get_attachment_url( $image->ID ).'" alt="" />';
          echo '<div class="caption">'. $attachment_title = get_the_title($image->ID) . '</div>'; 
        echo '</a>';
      echo '</div>';
    }
} ?>
</div>
<script type="text/javascript">
</script>
<?php get_footer(); ?>