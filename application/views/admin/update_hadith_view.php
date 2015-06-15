<fieldset>
  <legend>Updating Hadith</legend>  
      <?php echo form_open('admin/hadith/update/'.$hadith_id);?>
      
      <div class="control-group">
        <label class="control-label" for="txt_plain_ar">Plain Arabic:</label>
        <textarea class="form-control" name="txt_plain_ar" id="txt_plain_ar" lang='AR' rows=10>
		  <?php echo set_value('txt_plain_ar', (!empty($hadith) ? $hadith->hadith_plain_ar : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
      
    <div class="control-group">
        <label class="control-label" for="txt_plain_en">Plain English:</label>
        <textarea class="form-control" name="txt_plain_en" id="txt_plain_en" rows=10>
		  <?php echo set_value('txt_plain_en', (!empty($hadith) ? $hadith->hadith_plain_en : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_en', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    
     <div class="control-group">
        <label class="control-label" for="txt_plain_ur">Plain Urdu:</label>
        <textarea class="form-control" name="txt_plain_ur" id="txt_plain_ur" lang='UR' rows=10>
		  <?php echo set_value('txt_plain_ur', (!empty($hadith) ? $hadith->hadith_plain_ur : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_plain_ur', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
     
    <div class="control-group">
        <label class="control-label" for="txt_marked_ar">Marked Arabic:</label>
        <textarea class="form-control" name="txt_marked_ar" id="txt_marked_ar" lang='AR' rows=10>
		  <?php echo set_value('txt_marked_ar', (!empty($hadith) ? $hadith->hadith_marked_ar : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
  
    <div class="control-group">
        <label class="control-label" for="txt_marked_en">Marked English:</label>
        <textarea class="form-control" name="txt_marked_en" id="txt_marked_en" rows=10>
		  <?php echo set_value('txt_marked_en', (!empty($hadith) ? $hadith->hadith_marked_en : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_en', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
  
    <div class="control-group">
        <label class="control-label" for="txt_marked_ur">Marked Urdu:</label>
        <textarea class="form-control" name="txt_marked_ur" id="txt_marked_ur" lang='UR' rows=10>
		  <?php echo set_value('txt_marked_ur', (!empty($hadith) ? $hadith->hadith_marked_ur : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_marked_ur', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="txt_raw_ar">Raw Arabic:</label>
        <textarea class="form-control" name="txt_raw_ar" id="txt_raw_ar" lang='AR' rows=10>
		  <?php echo set_value('txt_raw_ar', (!empty($hadith) ? $hadith->hadith_raw_ar : '')); ?>
		</textarea>
        <div class="help-inline">
          <?php echo form_error('txt_raw_ar', '<span class="text-error">', '</span>'); ?>
        </div>
    </div>
     
    <div class="control-group">
        <label class="control-label" for="ddl_authenticity_id">Authenticity:</label>
       
          <?php if(!empty($authenticity)):?>

            <select class="form-control" name="ddl_authenticity_id">
              <?php foreach($authenticity as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo  set_select('ddl_authenticity_id',$row->authenticity_id, (!empty($hadith) AND $hadith->authenticity_id == $row->authenticity_id ? TRUE: FALSE ) ); ?> ><?php echo $row->authenticity_title_en;?> </option>
              <?php endforeach; ?>
            </select>
			
	  <?php endif; ?>
    </div>
	
	<br/>
  
    <div class="control-group form-inline">
		<button  type="submit" id="mysubmit" name="mysubmit" class="btn btn-primary">Save Record</button>
        <a href="<?php echo base_url().'admin/hadith' ?>" class="btn btn-default">Cancel</a>
		<?php if( $this->user_roles->is_authorized( array('admin_hadith_delete') )   ): ?>
        <a href="<?php echo (base_url().'admin/hadith/delete/'.$hadith_id); ?>" class="btn btn-danger"/>Delete</a>
		<?php endif; ?>
    </div>
  <?php echo form_close();?>
</fieldset>