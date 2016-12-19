<div class="container-fluid">
  <div class="row">
    <div id="banner<?php echo $module; ?>" class="col-md-5 col-md-offset-1 banner-class carousel slide carousel-fade" >
      <div class="carousel-inner">
        <div class="item active">
        <?php $count_active = 0; ?>
        <?php foreach ($banners as $banner) { ?>
          <?php if($count_active != 0) { ?>
          <div class="item">
          <?php } ?>
          <?php $count_active = $count_active + 1; ?>
          <?php if ($banner['link']) { ?>
          <a href="<?php echo $banner['link']; ?>"><div class="fill" style="background-image:url('<?php echo $banner['image']; ?>');">
          </div></a>
          <?php } else { ?>
          <div class="fill" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
          <?php } ?>
        </div>
        <?php } ?>
    </div>
  </div>
  <div class="col-md-4 col-md-offset-1">
  <a href="http://localhost:8888/2200/Ready-To-Wear/Jackets-and-Coats"><h2 class="vertical-align-middle hover-button" >Entire Fall Winter 2016 Collection</h2></a>
  <button class="btn btn-primary btn-lg btn-block add-margin-top" href="http://localhost:8888/2200/Ready-To-Wear/Jackets-and-Coats">Shop Jackets and Coats</button>
  </div>
</div>
<script type="text/javascript"><!--
$('#banner<?php echo $module; ?>').carousel({
  interval: 3000,
  pause: "false"
});
--></script>
