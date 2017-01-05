<div class="container-fluid minus-padding">
  <div id="banner_long" class="wrapper_outer" >
      <?php $count_active = 0; ?>
      <?php foreach ($banners as $banner) { ?>
        <?php if ($banner['link']) { ?>
        <a href="<?php echo $banner['link']; ?>">
          <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        </a>
        <?php } else { ?>
        <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        <?php } ?>
      <?php } ?>
  </div>
</div>
<a href="#banner0" class="scrollwithArrow"></a>

<script type="text/javascript"><!--

(function slide(){
  $('.wrapper').animate({backgroundPosition : '-=7px'}, 60, 'linear', slide);
})();

--></script>
