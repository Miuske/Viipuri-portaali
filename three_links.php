<?php /* Template Name: Kolme linkkiä */ ?>
<div class="row kolme-linkkia">
  <div class="col-xs-12 col-sm-4 content img-link" id="img-left">
    <a href="<?php echo get_home_url() ?>/henkilot" alt="Henkilöiden tarinat">
      <img class="hidden-xs" src="<?php bloginfo('template_directory'); ?>/images/vp-henkilot.jpg">
      <h1 class="visible-xs">Henkilöt</h1>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4 content img-link" id="img-mid">
    <a href="<?php echo get_home_url() ?>/paikat" alt="Paikat">
      <img class="hidden-xs" src="<?php bloginfo('template_directory'); ?>/images/vp-places.jpg">
      <h1 class="visible-xs">Paikat</h1>
    </a>
  </div>
  <div class="col-xs-12 col-sm-4 content img-link" id="img-right">
    <a href="<?php echo get_home_url() ?>/aikajana" alt="Aikajana">
      <img class="hidden-xs" src="<?php bloginfo('template_directory'); ?>/images/vp-time.jpg">
      <h1 class="visible-xs">Aikajana</h1>
    </a>
  </div>
</div>