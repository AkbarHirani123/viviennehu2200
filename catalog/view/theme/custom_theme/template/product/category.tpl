<?php echo $header; ?>
<div class="container">
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
        <div class="col-md-1 col-md-offset-2 col-sm-3 col-xs-6 text-right">
          <div class="dropdown">
            <p class="sort dropdown-toggle">View</p>
            <ul class="dropdown-menu sort-content">
              <?php foreach ($limits as $limits) { ?>
                <li><a href="<?php echo $limits['href']; ?>"><?php echo $limits['text']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
      </div>
      <hr>
      <?php if ($categories) { ?>
      <h3><?php echo $heading_title; ?> Categories: </h3>
      <br/>
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
        <div class="col-sm-3 col-md-3">
          <ul>
            <?php foreach ($categories as $category) { ?>
              <!-- <?php if ($category['image']) { ?>
              <?php echo $category['image']; ?>
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
      
      <div class="row">
        <?php foreach ($products as $product) { ?>
        <div class="product-layout product-grid col-lg-3 col-md-3 col-sm-4 col-xs-6">
          <div class="product-thumb">
            <div class="image">
              <div id="pos-rel">
                <a href="<?php echo $product['href']; ?>">
                  <img src="<?php echo end($product['images']); ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive front-pic" />
                  <img src="<?php echo $product['images'][1]; ?>" alt="<?php echo $product['name']; ?>" title="<?php echo $product['name']; ?>" class="img-responsive" />
                </a>
              </div>
            </div>
            
            <div>
              <div class="caption">
                <h4><a href="<?php echo $product['href']; ?>"><?php echo $product['name']; ?>
                <?php if($product['model']) { ?>
                <?php echo $product['model']; ?>
                <?php } ?>
                </a></h4>
                <?php if ($product['price']) { ?>
                <h4 class="price"><a href="<?php echo $product['href']; ?>">
                  <?php if (!$product['special']) { ?>
                  <?php echo $product['price']; ?>
                  <?php } else { ?>
                  <span class="price-new"><?php echo $product['special']; ?></span> <span class="price-old"><?php echo $product['price']; ?></span>
                  <?php } ?>
                  <?php if ($product['tax']) { ?>
                  <span class="price-tax"><?php echo $text_tax; ?> <?php echo $product['tax']; ?></span>
                  <?php } ?>
                </a></h4>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
      <div class="row">
        <div class="col-sm-6 text-left"><?php echo $pagination; ?></div>
        <div class="col-sm-6 text-right"><?php echo $results; ?></div>
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
<style type="text/css">

</style>
<?php echo $footer; ?>
