<div class="container-fluid">
  <div class="row">
    <div id="banner<?php echo $module; ?>" class="col-md-5 col-md-offset-1 banner-class carousel slide carousel-fade" >
      <div class="carousel-inner">
        <div class="item active">
        <?php $count_active = 0; ?>
        <?php $banner1Title = ''; ?>
        <?php foreach ($banners as $banner) { ?>
          <?php if($count_active == 0) { ?>
            <?php $banner1Title = $banner['title']; ?>
          <?php } ?>
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
  <a href="https://www.viviennehu.com/collections/FW16"><h2 class="vertical-align-middle hover-button" >
  <?php echo $banner1Title; ?></h2></a>
  <a type="button" class="btn btn-primary btn-lg btn-block add-margin-top" href="https://www.viviennehu.com/Ready-To-Wear/Jackets-and-Coats"><?php echo $banner['title']; ?></a>
  </div>
</div>
<script type="text/javascript"><!--
$('#banner<?php echo $module; ?>').carousel({
  interval: 3000,
  pause: "false"
});
--></script>
