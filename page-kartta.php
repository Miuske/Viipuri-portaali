<?php /* Template Name: Kartta */ ?>

<?php get_header(); ?>
<?php get_template_part('three_links'); ?>
<div class="row">
  <div class="col-xs-12 content kartan-content">
    <div class="kartta-svg">
	<?php get_template_part('kartta_svg'); ?>
    </div>  
    <div class="kartan-vuosiluvut">
      <h4>Tarkastele vuosikymmenellä</h4>
    <?php $posttags = get_tags();
  if ($posttags) {
    foreach($posttags as $tag) {
	if(substr( $tag->name, 0, 5 ) === "vuosi"){
	  $vuosiluku = substr($tag->name, -9);
	echo '<h3>'.$vuosiluku.'</h3>';
	} } } ?>
	</div>
<div class="kartan-lisatieto">
<h3 class="kartta-alue-otsikko">Valitse kartalta alue</h3>
    <?php
	$args = array( 'tag' => $post_tag, 'category_name' => 'paikat, henkilot' );
	//$args = 'tag='.$post_tag;
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
	  while ( $the_query->have_posts() ) { ?>
	    <div class="yksi_postaus col-sm-4 col-xs-12">
	    <?php $the_query->the_post(); ?>
	    <h3><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
	    <p><?php echo wp_trim_words( get_the_content(), 40, ' <i class="jatka-lukemista">Jatka lukemista</i>' ); ?></p>
	    <?php $tags = wp_get_post_tags($post->ID);
		if ($tags) {
		  foreach ($tags as $tag) { 
		    echo '<p class="postaus-tag">'. $tag->name .'</p>';
		  }
		} ?>
	    </div>
	<?php }
	} else {
	  echo '<div class="yksi-postaus col-sm-4 col-xs-12"><p>Sisältöä ei löytynyt</p></div>';
	}
	wp_reset_postdata();
    ?>
	<div class="yksi_postaus ei-kartta-sisaltoa col-sm-4 col-xs-12"><p>Alueeseen liittyvää sisältöä ei löytynyt</p></div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    $('.kartan-vuosiluvut h3').on('click', function(){
      var valittuVuosi = $(this).text();
	  $('.yksi_postaus').each(function() {
	    $('.yksi_postaus').removeClass('show-block');
	  });
	  if($(this).hasClass('valittu')){
		$(this).removeClass('valittu');
		var mapItem = $('.kartan-lisatieto').attr('id');
		if(mapItem != null){
		  suodataPaikalla(mapItem);
		}
	  } else {
		$('.kartan-vuosiluvut h3').each(function(){
		  $(this).removeClass('valittu');
	    });
	    $(this).addClass('valittu');
        suodataVuodella(valittuVuosi);
	  }
    });
	
    $('.paikka').hover(function(){
	$(this).css({'fill': '#e49729', 'fill-opacity': '0.7'});
	$(this).next().css({'fill': 'black', 'fill-opacity': '0.7'});
    }, function(){
	$(this).css({'fill': 'white', 'fill-opacity': '0.1'});
	$(this).next().css({'fill': 'white', 'fill-opacity': '0.1'});
    });

    $('.paikka').on('click', function(){
	$('.kartan-vuosiluvut h3').each(function(){
	  $(this).removeClass('valittu');
	});
	var mapItem = $(this).attr('id');
	var mapItemOtsikko = mapItem.substr(5, mapItem.length-1);
	$('.kartta-alue-otsikko').text($(this).next().text());
	suodataPaikalla(mapItem);
    });

    $('.paikan-nimi').hover(function(){
	$(this).css({'fill': 'black', 'fill-opacity': '0.7'});
	$(this).prev().css({'fill': '#e49729', 'fill-opacity': '0.7'});
    }, function(){
	$(this).css({'fill': 'white', 'fill-opacity': '0.1'});
	$(this).prev().css({'fill': 'white', 'fill-opacity': '0.1'});
    });

    $('.paikan-nimi').on('click', function(){
	$('.kartan-vuosiluvut h3').each(function(){
	  $(this).removeClass('valittu');
	});
	var mapItem = $(this).prev().attr('id');
	$('.kartta-alue-otsikko').text($(this).text());
	suodataPaikalla(mapItem);
    });
  });
  
  function suodataPaikalla(mapItem){
    $('.kartan-lisatieto').addClass('show-block');
	$('.kartan-lisatieto').attr('id', mapItem);
	$('.yksi_postaus').removeClass('show-block');
	var postsShowBlock = 0;
	$('.yksi_postaus').each(function() {
	  var thisTag = $(this).find('.postaus-tag').text();
	  if(thisTag.indexOf(mapItem) >= 0){
		$(this).addClass('show-block');
		postsShowBlock++;
	  }
	});
	if(postsShowBlock == 0){
		$('.ei-kartta-sisaltoa').addClass('show-block');
	}
  }
  
  function suodataVuodella(valittuVuosi) {
    if($('.kartan-lisatieto').hasClass('show-block')){
	  var mapItem = $('.kartan-lisatieto').attr('id');
	  var vuosiSisaltoOlemassa = 0;
	  $('.yksi_postaus').each(function() {
	    var thisTag = $(this).find('.postaus-tag').text();
	    if(thisTag.indexOf(valittuVuosi) >= 0 && thisTag.indexOf(mapItem) >= 0){
	      $(this).addClass('show-block');
		  vuosiSisaltoOlemassa++;
	    }
      });
	  if(vuosiSisaltoOlemassa == 0){
		if(vuosiSisaltoOlemassa == 0){
		  $('.ei-kartta-sisaltoa').addClass('show-block');
		}
	  }
    } else {
      $('.yksi_postaus').each(function() {
	    var thisTag = $(this).find('.postaus-tag').text();
	    if(thisTag.indexOf(valittuVuosi) >= 0){
	      $(this).addClass('show-block');
	    }
      });
    }
  }
</script>
<?php get_footer(); ?>