<fieldset>
    
  <legend>Fix Report</legend>

  <?php $attributes = array('class' => 'form-horizontal col-md-7'); ?>
  <?php echo form_open('admin/report/update/'.$error_id, $attributes);?>
  
    <div class="form-group">
      <label class="col-sm-3" for="txt_error_text">Error Text:</label>
      
        <textarea class="form-control" type="text" name="txt_error_text" id="txt_error_text" readonly>
          <?php echo set_value('txt_error_text', (!empty($report) ? trim($report[0]->error_text) : '')); ?>
        </textarea>
      
    </div>
    
    <div class="form-group">
      <label class="col-sm-4" for="txt_fixed_commentst">Fixed Comments</label>
      <textarea class="form-control" type="text" name="txt_fixed_comments" rows=2 id="txt_fixed_comments">
        <?php echo set_value('txt_fixed_comments', (!empty($report) ? trim($report[0]->fixed_comments) : '')); ?>
      </textarea> 
    </div>
  
    
    <button type="submit" id="mysubmit" name="mysubmit" value="Fix Report" class="btn btn-primary">Fix Report</button>
    <a href="<?php echo base_url().'admin/report' ?>" class="btn btn-default">Cancel</a>
    <?php if( $this->user_roles->is_authorized( array('admin_reports_delete') )   ): ?>
    <a href="<?php echo (base_url().'admin/report/delete/'.$report[0]->error_id); ?>" class="btn btn-danger">Delete</a>
    <?php endif; ?>
   
  <?php echo form_close();?>    
</fieldset>
