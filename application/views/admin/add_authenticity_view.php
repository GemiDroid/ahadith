<div class="col-md-9" style="margin-top: 50px;">
  <fieldset class="col-md-7">
  <legend>Adding Authenticity</legend>

    <?php echo form_open('admin/authenticity/add');?>

    
    <div class="control-group">
    <label for="txt_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control"type="text" name="txt_title_ar" value="<?php echo set_value('txt_title_ar'); ?>" />
     <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <br/>
    <div class="control-group">
    <label for="txt_title_en">English Title:</label>&nbsp;&nbsp;
	<input class="form-control" type="text" name="txt_title_en" value="<?php echo set_value('txt_title_en'); ?>" />
    
	<div class="help-inline">
        <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
    </div>
    
	</div>
    <br/>
    <div class="control-group">
      <label for="txt_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input class="form-control" type="text" name="txt_title_ur" value="<?php echo set_value('txt_title_ur'); ?>" />
      <div class="help-inline">
        <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
      </div>
    </div>
    <br/>
    <div class="control-group">
      <label for="txt_order">Order:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	  <input class="form-control" type="text" name="txt_order" value="<?php echo set_value('txt_order'); ?>" />
      <div class="help-inline">
            <?php echo form_error('txt_order', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
   <br/>
      <button type="submit" id="btn_save" name="btn_save" value="Add" class="btn btn-primary">Save Record</button>
      <a href="<?php echo (base_url().'admin/authenticity'); ?>" class="btn btn-default">Cancel</a>
      <?php echo form_close();?>
  </fieldset>
</div>
 </div>
