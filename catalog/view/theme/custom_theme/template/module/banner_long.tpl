
<div class="container-fluid minus-padding">
  <div id="banner_long" class="wrapper_outer" >
      <?php $count_active = 0; ?>
      <?php foreach ($banners as $banner) { ?>
        <?php if ($banner['link']) { ?>
        <a href="<?php echo $banner['link']; ?>" title="<?php echo $banner['title']; ?>">
          <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        </a>
        <?php } else { ?>
        <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        <?php } ?>
      <?php } ?>
  </div>
</div>
<a href="#banner0" class="scrollwithArrow"></a>
<div style="width: 100%;">
<button type="button" class="btn btn-new" onclick="change()">
  <i id="button_play" class="fa fa-pause"></i>
</button>
</div>
<div class="pull-right white"><?php echo $banner['title']; ?></div>


<script type="text/javascript"><!--

function slide(){
  console.log('run');
  if($('#button_play').attr('class')=='fa fa-pause'){
    $('.wrapper').animate({backgroundPosition : '-=7px'}, 60, 'linear', slide);
  }
};
function stopslide(){
  console.log('stoped');
  $('.wrapper').stop(true,false);
}
slide();
function change(){
  if($('#button_play').attr('class')=='fa fa-pause'){
    $('#button_play').attr('class', 'fa fa-play');
  }else {
    $('#button_play').attr('class', 'fa fa-pause');
    slide();
  }
}

--></script>