<div class="lookbook-modal">
	<div class="modal" id="<?php echo $product['product_id'] . "-modal"; ?>">
  		<div class="modal-content-box">
  			<span class="modal-close">Exit</span>
  			<div class="quick-view-container">
  				<img class="quick-view-main" src="<?php echo $product['thumb']; ?>">
  			</div>
  			<div class="lookbook-info">
  				<h3><?php echo $product['name']; ?></h3>
				<a href="<?php echo $product['href']; ?>">Shop this Look</a>
				Current Id: <?php print_r($product['product_id']); ?><br/>
				Previous Id: <?php print_r($sliderNextPrev[$product['product_id']][0]); ?><br/>
				Next Id: <?php print_r($sliderNextPrev[$product['product_id']][1]); ?>
				<button class="modal-click" id="<?php echo $sliderNextPrev[$product['product_id']][0]; ?>"><span class="glyphicon glyphicon-chevron-left"></span></button>
  		<button class="modal-click lookbook-modal-button" id="<?php echo $sliderNextPrev[$product['product_id']][1]; ?>"><span class="glyphicon glyphicon-chevron-right"></span></button>
  			</div>
  		</div>

  		<!-- <a href="<?php echo $sliderNextPrev[$product['product_id']][0] . "-modal"; ?>"><span class="glyphicon glyphicon-previous"></span></a>
  		<a href="<?php echo $sliderNextPrev[$product['product_id']][1] . "-modal"; ?>"><span class="glyphicon glyphicon-next"></span></a> -->
  	</div>
</div>

