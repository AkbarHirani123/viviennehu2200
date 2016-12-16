<button class="modal-click quick-view-button" id="<?php echo $product['product_id']; ?>">Quick View</button>
<div class="pic-modal">
	<div class="modal" id="<?php echo $product['product_id'] . "-modal"; ?>">
  		<div class="modal-content-box">
  			<span class="close">&times;</span>
  			<div class="quick-view-container">
  				<img class="quick-view-main" src="<?php echo $product['thumb']; ?>">
  			</div>
			<div class="quick-view-info">
				<h3><?php echo $product['name']; ?></h3>
				
			</div>

			<!-- <div id="slider">
			    <img src="img/springsummer_2017/SS1701_front.jpg" alt="">
			    <img src="img/springsummer_2017/SS1701_back.jpg" alt="">
			    <img src="img/springsummer_2017/SS1701_side.jpg" alt="">
			  	<img src="img/springsummer_2017/SS1701_side2.jpg" alt="">
			</div> -->
  		</div>
  	</div>
</div>
