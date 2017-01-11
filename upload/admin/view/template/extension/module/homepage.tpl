<?php echo $header; ?><?php echo $column_left; ?>
<div id="content">
  <div class="page-header">
    <div class="container-fluid">
      <div class="pull-right">
        <button type="submit" form="form-homepage" data-toggle="tooltip" title="<?php echo $button_save; ?>" class="btn btn-primary"><i class="fa fa-save"></i></button>
        <a href="<?php echo $cancel; ?>" data-toggle="tooltip" title="<?php echo $button_cancel; ?>" class="btn btn-default"><i class="fa fa-reply"></i></a></div>
      <h1><?php echo $heading_title; ?></h1>
      <ul class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <li><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="container-fluid">
    <?php if ($error_warning) { ?>
    <div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> <?php echo $error_warning; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <?php if ($success) { ?>
    <div class="alert alert-success"><i class="fa fa-check-circle"></i> <?php echo $success; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>
    <?php } ?>
    <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo $text_view_list; ?>
      <button type="button" class="close" data-dismiss="alert">&times;</button>
    </div>   
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title"><i class="fa fa-pencil"></i> <?php echo $text_edit; ?></h3>
      </div>
      <div class="panel-body">
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form-homepage" class="form-horizontal">
          <input type="hidden" name="module_id" value="<?php echo $module_id; ?>" />
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-name"><?php echo $entry_name; ?></label>
            <div class="col-sm-8">
              <input type="text" name="name" value="<?php echo $name; ?>" placeholder="<?php echo $entry_name; ?>" id="input-name" class="form-control" />
              <?php if ($error_name) { ?>
              <div class="text-danger"><?php echo $error_name; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-status"><?php echo $entry_status; ?></label>
            <div class="col-sm-8">
              <select name="status" id="input-status" class="form-control">
                <?php if ($status) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <?php } else { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-option"><?php echo $entry_option; ?></label>
            <div class="col-sm-8">
              <select name="option" id="input-option" class="form-control">
              <?php foreach ($module_options as $module_option) { ?>
              <?php if ($module_option['value'] == $option) { ?>
              <option value="<?php echo $module_option['value']; ?>" selected="selected"><?php echo $module_option['title']; ?></option>
              <?php } else { ?>
              <option value="<?php echo $module_option['value']; ?>"><?php echo $module_option['title']; ?></option>
              <?php } ?>
              <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-text-align"><span data-toggle="tooltip" title="<?php echo $help_text_align; ?>"><?php echo $entry_text_align; ?></span></label>
            <div class="col-sm-8">
              <select name="text_align" id="input-text-align" class="form-control">
                <option value=""><?php echo $text_select; ?></option>
                <?php foreach ($alignments as $alignment) { ?>
                <?php if ($alignment['value'] == $text_align) { ?>
                <option value="<?php echo $alignment['value']; ?>" selected="selected"><?php echo $alignment['title']; ?></option>
                <?php } else { ?>
                <option value="<?php echo $alignment['value']; ?>"><?php echo $alignment['title']; ?></option>
                <?php } ?>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-thumb-width"><span data-toggle="tooltip" title="<?php echo $help_image_size; ?>"><?php echo $entry_thumb_size; ?></span></label>
            <div class="col-sm-4">
              <input type="text" name="thumb_width" value="<?php echo $thumb_width; ?>" placeholder="<?php echo $entry_width; ?>" id="input-thumb-width" class="form-control" />
              <?php if ($error_thumb_width) { ?>
              <div class="text-danger"><?php echo $error_thumb_width; ?></div>
              <?php } ?>
            </div>
            <div class="col-sm-4">
              <input type="text" name="thumb_height" value="<?php echo $thumb_height; ?>" placeholder="<?php echo $entry_height; ?>" id="input-thumb-height" class="form-control" />
              <?php if ($error_thumb_height) { ?>
              <div class="text-danger"><?php echo $error_thumb_height; ?></div>
              <?php } ?>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-3 control-label" for="input-popup-width"><span data-toggle="tooltip" title="<?php echo $help_image_size; ?>"><?php echo $entry_popup_size; ?></span></label>
            <div class="col-sm-4">
              <input type="text" name="popup_width" value="<?php echo $popup_width; ?>" placeholder="<?php echo $entry_width; ?>" id="input-popup-width" class="form-control" />
              <?php if ($error_popup_width) { ?>
              <div class="text-danger"><?php echo $error_popup_width; ?></div>
              <?php } ?>
            </div>
            <div class="col-sm-4">
              <input type="text" name="popup_height" value="<?php echo $popup_height; ?>" placeholder="<?php echo $entry_height; ?>" id="input-popup-height" class="form-control" />
              <?php if ($error_popup_height) { ?>
              <div class="text-danger"><?php echo $error_popup_height; ?></div>
              <?php } ?>
            </div>
          </div>
          <table class="table table-striped table-bordered table-hover">
            <thead>
              <tr>
                <td class="text-left"><?php echo $column_title; ?></td>
                <td class="text-left"><?php echo $column_status; ?></td>
                <td class="text-right"><?php echo $column_sort_order; ?></td>
                <td class="text-right"><?php echo $column_action; ?></td>
              </tr>
            </thead>
            <?php if ($homepage_entries) { ?>
            <tbody>
              <?php foreach ($homepage_entries as $entry) { ?>
              <tr>
                <td class="text-left"><?php echo $entry['title']; ?></td>
                <td class="text-left"><?php echo $entry['status']; ?></td>
                <td class="text-right"><?php echo $entry['sort_order']; ?></td>
                <td class="text-right">
                  <a onclick="confirm('<?php echo $text_confirm; ?>') ? location.href='<?php echo $entry['delete']; ?>' : false;" data-toggle="tooltip" title="<?php echo $button_delete; ?>" class="btn btn-danger"><i class="fa fa-minus-circle"></i></a>
                  <a href="<?php echo $entry['edit']; ?>" data-toggle="tooltip" title="<?php echo $button_edit; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                  </td>
              </tr>
              <?php } ?>
            </tbody>
            <?php } ?>
            <tfoot>
              <?php if ($add_entry) { ?>
              <tr>
                <td class="text-right" colspan="4"><button type="button" onclick="location = '<?php echo $add_entry; ?>';" data-toggle="tooltip" title="<?php echo $button_add_entry; ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i></button></td>
              </tr>
              <?php } else { ?>
              <tr>
                <td class="text-center" colspan="4"><?php echo $text_save_module; ?></td>
              </tr>
              <?php } ?>
            </tfoot>
          </table>
        </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript"><!--
$('input[name=\'allow_popup\']').on('change', function() {
	$('#allow-popup').slideToggle();
});
//--></script>
<?php echo $footer; ?>