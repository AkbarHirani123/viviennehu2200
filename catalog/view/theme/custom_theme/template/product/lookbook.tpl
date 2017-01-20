<?php echo $header; ?>
<div class="container lookbook">
  <ul class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
    <?php } ?>
  </ul>
  <div class="row"><?php echo $column_left; ?>
    <?php if ($column_left && $column_right) { ?>
    <?php $class = 'col-sm-6'; ?>
    <?php } elseif ($column_left || $column_right) { ?>
    <?php $class = 'col-sm-9'; ?>
    <?php } else { ?>
    <?php $class = 'col-sm-12'; ?>
    <?php } ?>
    <div id="content" class="<?php echo $class; ?>"><?php echo $content_top; ?>
      
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
          <h2><?php echo $heading_title; ?></h2>
        </div>
        <div class="col-md-1 col-md-offset-2 col-sm-3 col-xs-6 text-right">
          <div class="dropdown">
            <p class="sort dropdown-toggle">Sort By</p>
            <ul class="dropdown-menu sort-content">
              <?php foreach ($sorts as $sorts) { ?>
                <li><a href="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <!-- <div class="col-md-1 col-md-offset-2 col-sm-3 col-xs-6 text-right">
          <div class="dropdown">
            <p class="sort dropdown-toggle">View</p>
            <ul class="dropdown-menu sort-content">
              <?php foreach ($limits as $limits) { ?>
                <li><a href="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div> -->
      </div>
      <?php if ($categories) { ?>
      <hr/>
      <?php if (count($categories) <= 5) { ?>
      <div class="row">
        <div class="col-sm-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
            <?php if ($thumb) { echo $thumb; ?>
              <img src="<?php echo $thumb; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>" class="img-thumbnail" />
            <?php } ?>
            <li><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></li>
            <?php } ?>
          </ul>
        </div>
      </div>
      <?php } else { ?>
      <div class="row">
        <?php foreach (array_chunk($categories, ceil(count($categories) / 4)) as $categories) { ?>
        <div class="col-sm-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
              <!-- <?php if ($category['image']) { echo $category['image']; ?>
                <img src="<?php echo $category['image']; ?>" alt="<?php echo $heading_title; ?>" title="<?php echo $heading_title; ?>" class="img-thumbnail" />
              <?php } ?> -->
            <li style="padding-bottom: 10px;"><h3><a href="<?php echo $category['href']; ?>"><?php echo $category['name']; ?></a></h3></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      <?php } ?>
      <?php if ($products) { ?>
      
      <br />
      <div class="row">
        <?php $sliderNextPrev = array(); ?>
        <?php $previous = null; ?>
        <?php $next1 = next($products); ?>
        <?php $next = $next1['product_id']; ?>
        <?php for ($i = 0; $i < count($products); $i++) { ?> 
          <?php $product = $products[$i]; ?>
          <?php if ($i < (count($products) - 1)) { ?>
            <?php $next = $products[$i + 1]['product_id']; ?>
          <?php } ?>
          <?php $sliderNextPrev[$product['product_id']] = array($previous, $next); ?>
          <?php $previous = $product['product_id']; ?>

        <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product-thumb">
            <div class="image">
              <button class="modal-click lookbook-modal-button" id="<?php echo $product['product_id']; ?>"><img data-original="image/placeholder-ripple.svg" src="<?php echo $product['thumb']; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" /></button>
              <div class="corner">
                <p><?php echo sprintf("%02d", $i + 1); ?></p>
              </div>
              <?php include 'modal.tpl'; ?>
            </div>
            <div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
      </div>
      <?php } ?>
      <?php if (!$categories && !$products) { ?>
      <p><?php echo $text_empty; ?></p>
      <div class="buttons">
        <div class="pull-right"><a href="<?php echo $continue; ?>" class="btn btn-primary"><?php echo $button_continue; ?></a></div>
      </div>
      <?php } ?>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<?php echo $footer; ?>
