<div class="col-md-9" style="margin-top: 50px;">

  <h4>Updating Error Reports!</h4>
  <hr>
  <?php if(!empty($report)): ?>
 
      <?php echo form_open('admin/report/update/'.$error_id);?>

       <div class="control-group">
            <div class="col-md-2"><label class="control-label" for="txt_error_text">Error Text:</label></div>
            <input type="text" name="txt_error_text" id="txt_error_text" value="<?php echo set_value('txt_error_text', (!empty($report) ? $report[0]->error_text : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('txt_error_text', '<span class="text-error">', '</span>'); ?>
            </div>
      </div>
      <div>&nbsp;</div>
       <div class="control-group">
            <div class="col-md-2"><label class="control-label" for="txt_user_id">User ID:</label></div>
            <input type="text" name="txt_user_id" id="txt_user_id" value="<?php echo set_value('txt_user_id', (!empty($report) ? $report[0]->user_id : '')); ?>" size="50"/>
          <div class="help-inline">
              <?php echo form_error('txt_user_id', '<span class="text-error">', '</span>'); ?>
            </div>
       </div>
      <div>&nbsp;</div>
       <div class="control-group">
            <div class="col-md-2"><label class="control-label" for="txt_hadith_id">Hadith ID:</label></div>
            <input type="text" name="txt_hadith_id" id="txt_hadith_id" value="<?php echo set_value('txt_hadith_id', (!empty($report) ? $report[0]->hadith_id : '')); ?>" size="50"/>
          <div class="help-inline">
              <?php echo form_error('txt_hadith_id', '<span class="text-error">', '</span>'); ?>
            </div>
      </div>
      <div>&nbsp;</div>
    
    <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo base_url().'admin/report' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
        <a href="<?php echo (base_url().'admin/report/delete/'.$report[0]->error_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a>
     
      <?php echo form_close();?>
  
<?php  else:
  echo 'Does not exist';
  endif;
  ?>
            </div>
 </div>
