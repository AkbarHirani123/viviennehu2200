<?php if ($tabbed) { ?>
<ul class="nav nav-tabs">
  <?php for ($i = 0; $i < count($homepages); $i++) { ?>
  <?php if ($i == 0) { ?>
  <li class="active"><a href="#tab-description<?php echo $homepages[$i]['homepage_id']; ?>" data-toggle="tab"><b><?php echo $homepages[$i]['title']; ?></b></a></li>
  <?php } else { ?>
  <li><a href="#tab-description<?php echo $homepages[$i]['homepage_id']; ?>" data-toggle="tab"><b><?php echo $homepages[$i]['title']; ?></b></a></li>
  <?php } ?>
  <?php } ?>
</ul>
<div class="tab-content">
  <?php for ($i = 0; $i < count($homepages); $i++) { ?>
  <?php if ($i == 0) { ?>
  <div class="tab-pane active" id="tab-description<?php echo $homepages[$i]['homepage_id']; ?>">
    <div class="homepage" style="<?php echo $text_align; ?> <?php echo $homepages[$i]['min_height']; ?>">
      <?php if ($homepages[$i]['thumb']) { ?>
      <?php if ($homepages[$i]['popup_status']) { ?>
      <a class="home-thumb" href="<?php echo $homepages[$i]['popup']; ?>" title="<?php echo $homepages[$i]['caption']; ?>"><img align="<?php echo $homepages[$i]['image_align']; ?>" style="<?php echo $homepages[$i]['margin']; ?>" src="<?php echo $homepages[$i]['thumb']; ?>" title="<?php echo $homepages[$i]['title']; ?>" alt="<?php echo $homepages[$i]['title']; ?>" /></a>
      <?php } else { ?>
      <img align="<?php echo $homepages[$i]['image_align']; ?>" style="<?php echo $homepages[$i]['margin']; ?>" src="<?php echo $homepages[$i]['thumb']; ?>" title="<?php echo $homepages[$i]['title']; ?>" alt="<?php echo $homepages[$i]['title']; ?>" />
      <?php } ?>
      <?php } ?>
      <?php echo $homepages[$i]['description']; ?>
    </div>
  </div>
  <?php } else { ?>
  <div class="tab-pane" id="tab-description<?php echo $homepages[$i]['homepage_id']; ?>">
    <div class="homepage" style="<?php echo $text_align; ?> <?php echo $homepages[$i]['min_height']; ?>">
      <?php if ($homepages[$i]['thumb']) { ?>
      <?php if ($homepages[$i]['popup_status']) { ?>
      <a class="home-thumb" href="<?php echo $homepages[$i]['popup']; ?>" title="<?php echo $homepages[$i]['caption']; ?>"><img align="<?php echo $homepages[$i]['image_align']; ?>" style="<?php echo $homepages[$i]['margin']; ?>" src="<?php echo $homepages[$i]['thumb']; ?>" title="<?php echo $homepages[$i]['title']; ?>" alt="<?php echo $homepages[$i]['title']; ?>" /></a>
      <?php } else { ?>
      <img align="<?php echo $homepages[$i]['image_align']; ?>" style="<?php echo $homepages[$i]['margin']; ?>" src="<?php echo $homepages[$i]['thumb']; ?>" title="<?php echo $homepages[$i]['title']; ?>" alt="<?php echo $homepages[$i]['title']; ?>" />
      <?php } ?>
      <?php } ?>
      <?php echo $homepages[$i]['description']; ?>
    </div>
  </div>
  <?php } ?>
  <?php } ?>
</div>
<?php } else { ?>
<?php foreach ($homepages as $homepage) { ?>
<div class="panel panel-default">
  <div class="panel-body homepage" style="<?php echo $text_align; ?> <?php echo $homepage['min_height']; ?>">
    <h3><?php echo $homepage['title']; ?></h3>
    <?php if ($homepage['thumb']) { ?>
    <?php if ($homepage['popup_status']) { ?>
    <a class="home-thumb" href="<?php echo $homepage['popup']; ?>" title="<?php echo $homepage['caption']; ?>"><img align="<?php echo $homepage['image_align']; ?>" style="<?php echo $homepage['margin']; ?>" src="<?php echo $homepage['thumb']; ?>" title="<?php echo $homepage['title']; ?>" alt="<?php echo $homepage['title']; ?>" /></a>
    <?php } else { ?>
    <img align="<?php echo $homepage['image_align']; ?>" style="<?php echo $homepage['margin']; ?>" src="<?php echo $homepage['thumb']; ?>" title="<?php echo $homepage['title']; ?>" alt="<?php echo $homepage['title']; ?>" />
    <?php } ?>
    <?php } ?>
    <?php echo $homepage['description']; ?>
  </div>
</div>
<?php } ?>
<?php } ?>
<script type="text/javascript"><!--
$(document).ready(function() {
	$('.home-thumb').magnificPopup({
		type:'image',
		gallery: {
			enabled: false
		}
	});
});
//--></script>
