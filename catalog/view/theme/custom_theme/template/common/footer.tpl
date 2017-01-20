<footer>
  <div class="container">
    <div class="social">
        <ul>
        <!-- <li>Follow Us:</li> -->
        <li class="youtube"><a href="http://www.youtube.com/user/viviennehuoffical" target=""><img src="image/catalog/icons/youtube.png"><span class="hidden-xs">Youtube</span></a></li>
        <li class="facebook"><a href="http://www.facebook.com/pages/Vivienne-Hu/644049312275197" target=""><img src="image/catalog/icons/facebook.png"><span class="hidden-xs">Facebook</span></a></li>
        <li class="twitter"><a href="https://twitter.com/Vivienne_Hu" target=""><img src="image/catalog/icons/twitter.png"><span class="hidden-xs">Twitter</span></a></li>
        <li class="pinterest"><a href="http://pinterest.com/viviennehunj/" target=""><img src="image/catalog/icons/pinterest.png"><span class="hidden-xs">Pinterest</span></a></li>
        <li class="tumblr"><a href="http://viviennehu.tumblr.com" target=""><img src="image/catalog/icons/tumblr.png"><span class="hidden-xs">Tumblr</span></a></li>
        <li class="instagram"><a href="http://instagram.com/viviennehustudio" target=""><img src="image/catalog/icons/instragram.png"><span class="hidden-xs">Instagram</span></a></li>
        </ul>
      </div>
    <div class="row">
      <?php if ($informations) { ?>
      <div class="col-sm-12">
        <!-- <h5><?php echo $text_information; ?></h5> -->
        <ul class="list-unstyled">
          <?php foreach ($informations as $information) { ?>
          <li><a href="<?php echo $information['href']; ?>"><?php echo $information['title']; ?></a></li>
          <?php } ?>
          <li><a href="<?php echo $contact; ?>"><?php echo $text_contact; ?></a></li>
          <li><a href="<?php echo $sitemap; ?>"><?php echo $text_sitemap; ?></a></li>
          <li><a href="<?php echo $account; ?>"><?php echo $text_account; ?></a></li>
          <li><a href="<?php echo $order; ?>"><?php echo $text_order; ?></a></li>
        </ul>
      </div>
      <?php } ?>
      <!-- <div class="col-sm-6">
        <h5><?php echo $text_account; ?></h5>
        <ul class="list-unstyled">
          
          <li><a href="<?php echo $wishlist; ?>"><?php echo $text_wishlist; ?></a></li>
          <li><a href="<?php echo $newsletter; ?>"><?php echo $text_newsletter; ?></a></li>
        </ul>
      </div> -->
    </div>
    <div class="row">          
      <div class="info">
      <!-- <span>© 2012~2017 Vivienne Hu</span> -->   
      <p><?php echo $powered; ?></p>
      </div>
    </div>
    <hr>
    
  </div>
</footer>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->

<!-- Theme created by Welford Media for OpenCart 2.0 www.welfordmedia.co.uk -->

</body></html>