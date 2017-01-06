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
      <h1><?php echo $heading_title; ?></h1>
      <br/>
      <label class="control-label" for="input-search"><p><?php echo $entry_search; ?></p></label>
      <div class="row">
        <div class="col-sm-4">
          <input type="text" name="search" value="<?php echo $search; ?>" placeholder="<?php echo $text_keyword; ?>" id="input-search" class="form-control" />
        </div>
        <div class="col-sm-3">
          <select name="category_id" class="form-control">
            <option value="0"><?php echo $text_category; ?></option>
            <?php foreach ($categories as $category_1) { ?>
            <?php if ($category_1['category_id'] == $category_id) { ?>
            <option value="<?php echo $category_1['category_id']; ?>" selected="selected"><?php echo $category_1['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_1['category_id']; ?>"><?php echo $category_1['name']; ?></option>
            <?php } ?>
            <?php foreach ($category_1['children'] as $category_2) { ?>
            <?php if ($category_2['category_id'] == $category_id) { ?>
            <option value="<?php echo $category_2['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_2['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_2['name']; ?></option>
            <?php } ?>
            <?php foreach ($category_2['children'] as $category_3) { ?>
            <?php if ($category_3['category_id'] == $category_id) { ?>
            <option value="<?php echo $category_3['category_id']; ?>" selected="selected">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
            <?php } else { ?>
            <option value="<?php echo $category_3['category_id']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $category_3['name']; ?></option>
            <?php } ?>
            <?php } ?>
            <?php } ?>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <p>
            <label class="checkbox-inline">
              <?php if ($description) { ?>
              <input type="checkbox" name="description" value="1" id="description" checked="checked" />
              <?php } else { ?>
              <input type="checkbox" name="description" value="1" id="description" />
              <?php } ?>
              <?php echo $entry_description; ?></label>
          </p>
          <p>
            <label class="checkbox-inline">
              <?php if ($sub_category) { ?>
              <input type="checkbox" name="sub_category" value="1" checked="checked" />
              <?php } else { ?>
              <input type="checkbox" name="sub_category" value="1" />
              <?php } ?>
              <?php echo $text_sub_category; ?></label>
          </p>
        </div>
        <div class="col-sm-3">
          <p>
            <label class="checkbox-inline">
              <?php if ($model) { ?>
              <input type="checkbox" name="model" value="1" checked="checked" />
              <?php } else { ?>
              <input type="checkbox" name="model" value="1" />
              <?php } ?>
              Search by Model</label>
          </p>
        </div>
      </div>
      <input type="button" value="<?php echo $button_search; ?>" id="button-search" class="btn btn-primary" />
      <hr/>
      <h2><?php echo $text_search; ?></h2>
      <br/>
      <?php if ($products) { ?>
      <div class="row">
        <div class="col-sm-3 hidden-xs">
          <h2><?php echo $heading_title; ?></h2>
        </div>
        <div class="col-md-1 col-md-offset-3 col-sm-3 col-xs-6 text-right">
          <div class="dropdown">
            <p class="sort dropdown-toggle">Sort By</p>
            <ul class="dropdown-menu sort-content">
              <?php foreach ($sorts as $sorts) { ?>
                <li><a href="<?php echo $sorts['href']; ?>"><?php echo $sorts['text']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-md-1 col-md-offset-3 col-sm-3 col-xs-6 text-right">
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
      <br />
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
      <?php } else { ?>
      <p><?php echo $text_empty; ?></p>
      <?php } ?>
      <?php echo $content_bottom; ?></div>
    <?php echo $column_right; ?></div>
</div>
<script type="text/javascript"><!--
$('#button-search').bind('click', function() {
  url = 'index.php?route=product/search';
  var search = $('#content input[name=\'search\']').prop('value');
  if (search) {
    url += '&search=' + encodeURIComponent(search);
  }
  var category_id = $('#content select[name=\'category_id\']').prop('value');
  if (category_id > 0) {
    url += '&category_id=' + encodeURIComponent(category_id);
  }
  var sub_category = $('#content input[name=\'sub_category\']:checked').prop('value');
  if (sub_category) {
    url += '&sub_category=true';
  }
  var filter_description = $('#content input[name=\'description\']:checked').prop('value');
  if (filter_description) {
    url += '&description=true';
  }
  var filter_model = $('#content input[name=\'model\']:checked').prop('value');
  if (filter_model) {
    url += '&model=true';
  }
  location = url;
});
$('#content input[name=\'search\']').bind('keydown', function(e) {
  if (e.keyCode == 13) {
    $('#button-search').trigger('click');
  }
});
$('select[name=\'category_id\']').on('change', function() {
  if (this.value == '0') {
    $('input[name=\'sub_category\']').prop('disabled', true);
  } else {
    $('input[name=\'sub_category\']').prop('disabled', false);
  }
});
$('select[name=\'category_id\']').trigger('change');
--></script>
<?php echo $footer; ?>