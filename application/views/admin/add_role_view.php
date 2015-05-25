<div class="col-md-9" style="margin-top: 50px;">
  <h4>Adding Role</h4>
  <hr>
 
    <?php echo form_open('admin/role/add');?>

        <div class="control-group form-inline">
        <label for="txt_role_title">Role Title:</label>&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_role_title" value="<?php echo set_value('txt_role_title',''); ?>" />
	<div class="help-inline">
            <?php echo form_error('txt_role_title', '<span class="text-error">', '</span>'); ?>
        </div>
        </div>
        <br/>
        <div class="control-group form-inline">
	<label for="txt_description">Description:</label>
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_description" value="<?php echo set_value('txt_description',''); ?>"/>
	<div class="help-inline">
            <?php echo form_error('txt_description', '<span class="text-error">', '</span>'); ?>
        </div>
        </div>
        <br/>
        <div class="control-group form-inline">
	<label for="txt_role_order">Role Order:</label>&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_role_order" value="<?php echo set_value('txt_role_order',''); ?>"/>
	<div class="help-inline">
            <?php echo form_error('txt_role_order', '<span class="text-error">', '</span>'); ?>
      
        </div>
        </div>
        <br/>
        
       <!-- <div class="help-inline">
            <?php echo validation_errors('<span class="text-error">', '</span>'); ?>
        </div>-->
      
       <input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/>
       <a href="<?php echo base_url().'admin/role' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
      
      <?php echo form_close();?>
    </div>
 </div>
