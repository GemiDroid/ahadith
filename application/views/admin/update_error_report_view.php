<div class="col-md-9" style="margin-top: 50px;">
  <fieldset>
    
  <legend>Fix Report</legend>
  <?php if(!empty($report)): ?>
 
      <?php echo form_open('admin/report/update/'.$error_id);?>

      <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_error_text">Error Text:</label></div>
            <textarea class="form-control" style="width: 500px; height: 100px;" type="text" name="txt_error_text" id="txt_error_text" readonly><?php echo set_value('txt_error_text', (!empty($report) ? $report[0]->error_text : '')); ?> </textarea>
      </div>
    
      <div>&nbsp;</div>
      
      <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_fixed_commentst">Fixed Comments</label></div>
            <textarea class="form-control" style="width: 500px; height: 100px;" type="text" name="txt_fixed_comments" id="txt_fixed_comments"><?php echo set_value('txt_fixed_comments', (!empty($report) ? $report[0]->fixed_comments : '')); ?></textarea> 
      </div>
    
      <div>&nbsp;</div>
      <input type="submit" id="mysubmit" name="mysubmit" value="Fix Report" class="btn btn-success">
      <a href="<?php echo base_url().'admin/report' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
      <a href="<?php echo (base_url().'admin/report/delete/'.$report[0]->error_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a>
     
      <?php echo form_close();?>
  
    <?php  else:
    echo 'Does not exist';
    endif;
    ?>
    
  </fieldset>
  </div>
 </div>
