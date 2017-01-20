<div class="container-fluid minus-padding">
  <div id="banner_long" class="wrapper_outer" >
      <?php $count_active = 0; ?>
      <?php foreach ($banners as $banner) { ?>
        <?php if ($banner['link']) { ?>
        <a href="<?php echo $banner['link']; ?>" title="<?php $banner['title']; ?>">
          <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        </a>
        <?php } else { ?>
        <div class="wrapper" style="background-image:url('<?php echo $banner['image']; ?>');"></div>
        <?php } ?>
      <?php } ?>
  </div>
</div>
<a href="#" class="scrollwithArrow"></a>
<div class="pull-right white">&copy;Benny Wu 2016</div>

<script type="text/javascript"><!--

(function slide(){
  $('.wrapper')
  .animate({backgroundPosition : '-=7px'}, 60, 'linear', slide)
  .hover(
     function(){
        $(this).stop(true,false);
    },
    function(){
        var $this = $(this);
        var cur = parseInt($this.css('margin-left'));
        $this.animate({backgroundPosition : '-=7px'}, 60, 'linear', slide)
    });
})();

$('.scrollwithArrow').on('click', function(){
    var ele = $(this).closest('#content').find(".container-fluid");
    // this will search within the section
    $("html, body").animate({
         scrollTop: $(ele).offset().top
    }, 100);
    return false;
});

--></script>
