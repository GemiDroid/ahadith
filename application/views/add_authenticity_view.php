
            
            <div class="col-md-9" style="margin-top: 50px;">
  <h4>Adding Authenticity</h4>
  <hr>

    <?php echo form_open('admin/authenticity/add');?>

    
    <div class="control-group form-inline">
    <label for="txt_title_ar">Arabic Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ar" />
     <div class="help-inline">
            <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <br/>
    <div class="control-group form-inline">
    <label for="txt_title_en">English Title:</label>&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_en" />
      <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
      
        </div>
      
    </div>
    <br/>
    <div class="control-group form-inline">
        <label for="txt_title_ur">Urdu Title:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ur" />
      <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
    <br/>
    <div class="control-group form-inline">
        <label for="txt_order">Order:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_order" />
      <div class="help-inline">
            <?php echo form_error('txt_order', '<span class="text-error">', '</span>'); ?>
      
        </div>
    </div>
   <br/>
      <input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/>
      <a href="<?php echo (base_url().'authenticity'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
      <?php echo form_close();?>

</div>
 </div>
