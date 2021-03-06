<fieldset>
  <legend>Add New Tag</legend>
  <?php $attributes = array('class' => 'form-horizontal col-md-7'); ?>
  <?php echo form_open( 'admin/tag/add', $attributes ); ?>  
	  
	  <div class="control-group">
	 
		<label for="txt_title_ar">Arabic Title:</label>     
		<input class="form-control" type="text" name="txt_title_ar" value="<?php echo set_value('txt_title_ar',''); ?>" />
		<div class="help-inline">
		  <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
		</div>
	  </div>
	  
	  <div class="control-group">
		<label for="txt_title_en">English Title:</label>
		  <input class="form-control" type="text" name="txt_title_en" value="<?php echo set_value('txt_title_en',''); ?>" />
		  <div class="help-inline">
			<?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
		  </div>
	  </div>

	   <div class="control-group">
	   <label for="txt_title_ur">Urdu Title:</label>
		<input class="form-control" type="text" name="txt_title_ur" value="<?php echo set_value('txt_title_ur',''); ?>" />
		<div class="help-inline">
		  <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
		</div>
	  </div>
	  
	  <div class="control-group">
		<label for="txt_detail_ar">Arabic Detail:</label>
		<input class="form-control" type="text" name="txt_detail_ar" value="<?php echo set_value('txt_detail_ar',''); ?>"/>
		<div class="help-inline">
			<?php echo form_error('txt_detail_ar', '<span class="text-error">', '</span>'); ?>
		</div>
	 </div>
	  
	  <div class="control-group">
	  <label for="txt_detail_en">English Detail:</label>
		<input class="form-control" type="text" name="txt_detail_en" value="<?php echo set_value('txt_detail_en',''); ?>"/>
		<div class="help-inline">
		  <?php echo form_error('txt_detail_en', '<span class="text-error">', '</span>'); ?>
		</div>
	  </div>
	  
	  <div class="control-group">
	   <label for="txt_detail_ur">Urdu Detail:</label>
		<input class="form-control" type="text" name="txt_detail_ur" value="<?php echo set_value('txt_detail_ur',''); ?>"/>
		<div class="help-inline">
		  <?php echo form_error('txt_detail_ur', '<span class="text-error">', '</span>'); ?>
		</div>
	  </div>
  
	<br/>
	<div class="control-group">
	  <button type="submit" id="mysubmit" name="mysubmit" class="btn btn-primary">Save Record</button>
	  <a href="<?php echo base_url().'admin/tag' ?>" class="btn btn-default">Cancel</a>
	</div>
	
	<?php echo form_close();?>
</fieldset>
