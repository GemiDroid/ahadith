
<div class="col-md-9" style="margin-top: 50px;">

  <h4>Updating Authenticity!</h4>
  <hr>

  <?php
  if(!empty($authenticity)){

  ?>
 
      <?php echo form_open('admin/authenticity/update/'.$authenticity_id);?>
      
      
       <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_title_ar">Arabic Title:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ar" id="txt_title_ar" value="<?php echo set_value('txt_title_ar', (!empty($authenticity) ? $authenticity->authenticity_title_ar : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
            </div>
       </div>
      <div>&nbsp;</div>
      <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_title_en">English Title:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_en" id="txt_title_en" value="<?php echo set_value('txt_title_en', (!empty($authenticity) ? $authenticity->authenticity_title_en : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
      <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_title_ur">Urdu Title:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_title_ur" id="txt_title_ur" value="<?php echo set_value('txt_title_ur', (!empty($authenticity) ? $authenticity->authenticity_title_ur : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      <div>&nbsp;</div>
   
   <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_order">Order:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_order" id="txt_order" value="<?php echo set_value('txt_order', (!empty($authenticity) ? $authenticity->authenticity_order : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_order', '<span class="text-error">', '</span>'); ?>
          </div>   
   </div>
      <div>&nbsp;</div>
      
    <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
         <a href="<?php echo (base_url().'authenticity'); ?>"><input type="button" value="Cancel" class="btn btn-primary">
       <a href="<?php echo (base_url().'admin/authenticity/delete/'.$authenticity->authenticity_id); ?>" ><input type="button" value="Delete" class="btn btn-danger" ></a>
      <?php echo form_close();?>

<?php
}
else
  echo 'Does not exist';

  ?>

  </div>
 </div>