
            <div class="col-md-9" style="margin-top: 50px;">
  <h4>Adding All Ahadith</h4>
  <hr>

    <?php echo form_open('admin/hadith/add');?>

    
    <div class="control-group">
       
          <label for="txt_plain_ar">Plain Arabic:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
	<textarea name="txt_plain_ar" value="<?php echo set_value('txt_plain_ar',''); ?>" style="width: 500px; height: 100px;" ></textarea>
	<div class="help-inline">
            <?php echo form_error('txt_plain_ar', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
       <div class="control-group">
       
          <label for="txt_plain_en">Plain English:</label>&nbsp;&nbsp;&nbsp;
       
	<textarea name="txt_plain_en" value="<?php echo set_value('txt_plain_en',''); ?>" style="width: 500px; height: 100px;" ></textarea>
	<div class="help-inline">
            <?php echo form_error('txt_plain_en', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
          <div class="control-group">
       
          <label for="txt_plain_ur">Plain Urdu:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         
	<textarea name="txt_plain_ur" value="<?php echo set_value('txt_plain_ur',''); ?>" style="width: 500px; height: 100px;"></textarea>
	<div class="help-inline">
            <?php echo form_error('txt_plain_ur', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
          
          <div class="control-group">
  
     <label for="txt_marked_ar">Marked Arabic:</label>&nbsp;&nbsp;
    
   <textarea name="txt_marked_ar" value="<?php echo set_value('txt_marked_ar',''); ?>" style="width: 500px; height: 100px;"></textarea>
   <div class="help-inline">
       <?php echo form_error('txt_marked_ar', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
    
  <div class="control-group">
  
     <label for="txt_marked_en">Marked English:</label>
    
   <textarea name="txt_marked_en" value="<?php echo set_value('txt_marked_en',''); ?>" style="width: 500px; height: 100px;"></textarea>
   <div class="help-inline">
       <?php echo form_error('txt_marked_en', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
  
  <div class="control-group">
  
     <label for="txt_marked_ur">Marked Urdu:</label>&nbsp;&nbsp;&nbsp;&nbsp;
    
   <textarea name="txt_marked_ur" value="<?php echo set_value('txt_marked_ur',''); ?>" style="width: 500px; height: 100px;"></textarea>
   <div class="help-inline">
       <?php echo form_error('txt_marked_ur', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
  
  <div class="control-group">
  
     <label for="txt_raw_ar">Raw Arabic:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    
   <textarea name="txt_raw_ar" value="<?php echo set_value('txt_raw_ar',''); ?>" style="width: 500px; height: 100px;"></textarea>
   <div class="help-inline">
       <?php echo form_error('txt_raw_ar', '<span class="text-error">', '</span>'); ?>
      
    </div>
     </div>
     
     
      <div class="control-group">
  
     <label for="ddl_authenticity_id">Authenticity:</label>&nbsp;&nbsp;&nbsp;&nbsp;

            <select name="ddl_authenticity_id">
              <?php if(!empty($authenticity)):?>
              <?php foreach($authenticity as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo  set_select('ddl_authenticity_id',$row->authenticity_id, TRUE); ?> ><?php echo $row->authenticity_id;?> </option>
              <?php endforeach; ?>
              <?php endif; ?>
            </select>
			
      </div>
      <br>
       <div class="control-group">
        <input type="submit"  id="mysubmit" name="mysubmit" value="Submit" class="btn btn-success">
        <a href="<?php echo base_url().'admin/hadith' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
        
       </div>
      <?php echo form_close();?>


            </div>
  </div>
