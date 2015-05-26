<div class="col-md-9" style="margin-top: 50px;">
    <div class="col-md-9" style="margin-top: 50px;">
    
    <fieldset id="block_add_role">
        <legend>Update Role:</legend>
		  
        <?php $attributes = array('class' => 'form-horizontal col-md-7'); ?>
        <?php echo form_open('admin/role/update/'.$role_title , $attributes); ?>
			
            <div class="control-group">
                <label class="control-label" for="txt_role_title">Role Title:</label>
                
                <input type="text" class="form-control" id="txt_role_title" name="txt_role_title" value="<?php echo set_value('txt_role_title', (!empty($data) ? $data->role_title : '')); ?>" tabindex="1" />
                <div class="help-inline">
                    <?php echo form_error('txt_role_title', '<span class="text-error">', '</span>'); ?>
                </div>
                
            </div>
            
            <div class="control-group">
                <label  class="control-label" for="txt_description">Description</label>
                
                <textarea class="form-control" id="txt_description" rows ="3" cols="10" name="txt_description" tabindex="4"><?php echo set_value('txt_description', (!empty($data) ? $data->description : '')); ?></textarea>
                <div class="help-inline">
                    <?php echo form_error('txt_description', '<span class="text-error">', '</span>'); ?>
                </div>
                
            </div>
            
            <div class="control-group">
                <label class="control-label" for="ddl_dependent_roles">Select dependent roles:</label>
                
                <select class="form-control" multiple name="ddl_dependent_roles[]" id="ddl_dependent_roles">
                    <?php foreach ($roles as $row): ?>
                        <option value="<?php echo $row->role_title; ?>" <?php echo set_select('ddl_dependent_roles[]',$row->role_title,( !empty($dependency) && in_array($row->role_title, $dependency) ? TRUE: FALSE)); ?>><?php echo $row->role_title; ?></option>
                    <?php endforeach; ?>
                </select>
                
                <div class="help-inline">
                    <?php echo form_error('ddl_dependent_roles', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
            <br/>
            
			<button type="submit" id="btn_save" name="btn_save" class="btn btn-primary" >Save Record</button>
            <?php echo anchor(base_url().'admin/role/delete/'.$role_title, 'Delete Role', 'class="btn btn-danger"'); ?>					
			<?php echo anchor(base_url().'admin/role', 'Cancel', 'class="btn btn-default"'); ?>					
                    
        <?php echo form_close(); ?>
    </fieldset>
	
  </div>
</div>

</div>
</div>
