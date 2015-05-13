<h1>Add an Item</h1>
<?php echo validation_errors('<p class="error">'); ?>
<?php echo form_open_multipart("admin/addItem"); ?>
<div class="row">
  <p><label for="item_type">Item Type</label></p>
  <p><?php echo form_dropdown('item_type', $itemList, $itemList[0]) ?></p>
</div>
<div class="row">
  <p><label for="item_name">Item Name</label></p>
  <p><input type="text" id="item_name" name="item_name" value="<?php echo set_value('item_name'); ?>"/></p>
</div>
<div class="row">
  <p><label for="item_price">Item Price</label></p>
  <p><input type="text" id="item_price" name="item_price" value="<?php echo set_value('item_price'); ?>"/></p>
</div>
<div class="row">
  <p><label for="item_shipping">Shipping Price</label></p>
  <p><input type="text" id="item_shipping" name="item_shipping" value="<?php echo set_value('item_shipping'); ?>"/></p>
</div>
<div class="row">
  <p><label for="item_description">Item Description</label></p>
  <p><input type="text" id="item_description" name="item_description" value="<?php echo set_value('item_description'); ?>"/></p>
</div>
<div class="row">
  <p><label for="user_file">Image Upload</label></p>
  <p><?php echo form_upload('userfile'); ?></p>
</div>
<div class="row">
  <p><input type="submit" class="special" value="Submit" /></p>
</div>
<?php echo form_close(); ?>