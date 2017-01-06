<div class="lookbook-modal">
	<div class="modal" id="<?php echo $product['product_id'] . "-modal"; ?>">
  		<div class="modal-content-box">
  			<span class="modal-close">&times;</span>
  			<h4><?php echo $heading_title; ?></h4>
  			<div class="quick-view-container">
  				<img class="quick-view-main" src="<?php echo $product['thumb']; ?>">
  			</div>
  			<div class="lookbook-info">
  				<h3><?php echo $product['name']; ?></h3>
				<a href="<?php echo $product['href']; ?>">Shop</a>
				<!-- Current Id: <?php print_r($product['product_id']); ?><br/>
				Previous Id: <?php print_r($sliderNextPrev[$product['product_id']][0]); ?><br/>
				Next Id: <?php print_r($sliderNextPrev[$product['product_id']][1]); ?> -->
  			</div>
  				<button class="modal-cycle left" id="<?php echo $sliderNextPrev[$product['product_id']][0]; ?>"><span class="glyphicon glyphicon-chevron-left"></span></button>
  				<button class="modal-cycle right" id="<?php echo $sliderNextPrev[$product['product_id']][1]; ?>"><span class="glyphicon glyphicon-chevron-right"></span></button>
  		</div>
  	</div>
</div>

