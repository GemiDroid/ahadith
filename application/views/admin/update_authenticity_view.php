<div class="col-md-9" style="margin-top: 50px;">

<fieldset class="col-md-7" >
  <legend>Updating Authenticity</legend>
      <?php echo form_open('admin/authenticity/update/'.$authenticity_id);?>
      
      
       <div class="control-group ">
            <label for="txt_title_ar">Arabic Title:</label>
            <input class="form-control" type="text" name="txt_title_ar" id="txt_title_ar" value="<?php echo set_value('txt_title_ar', (!empty($authenticity) ? $authenticity->authenticity_title_ar : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('txt_title_ar', '<span class="text-error">', '</span>'); ?>
            </div>
       </div>
      
      <div class="control-group">
            <label for="txt_title_en">English Title:</label>
            <input class="form-control" type="text" name="txt_title_en" id="txt_title_en" value="<?php echo set_value('txt_title_en', (!empty($authenticity) ? $authenticity->authenticity_title_en : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_en', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      
      <div class="control-group">
            <label for="txt_title_ur">Urdu Title:</label>
            <input class="form-control" type="text" name="txt_title_ur" id="txt_title_ur" value="<?php echo set_value('txt_title_ur', (!empty($authenticity) ? $authenticity->authenticity_title_ur : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_title_ur', '<span class="text-error">', '</span>'); ?>
          </div>
      </div>
      
   
    <div class="control-group">
            <label for="txt_order">Order:</label>
            <input class="form-control" type="text" name="txt_order" id="txt_order" value="<?php echo set_value('txt_order', (!empty($authenticity) ? $authenticity->authenticity_order : '')); ?>" size="50"/>
          <div class="help-inline">
            <?php echo form_error('txt_order', '<span class="text-error">', '</span>'); ?>
          </div>   
    </div>
   <br/>
    <div class="control-group">
      <button type="submit" id="btn_save" name="btn_save" value="Update" class="btn btn-primary">Save Record</button>
      <a href="<?php echo (base_url().'admin/authenticity/delete/'.$authenticity->authenticity_id); ?>" class="btn btn-danger" >Delete Record</a>
      <a href="<?php echo (base_url().'admin/authenticity'); ?>" class="btn btn-default">Cancel</a>
    </div>
    <?php echo form_close();?>
</fieldset>
</div>
</div>