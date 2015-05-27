<div class="col-md-9" style="margin-top: 50px;">
    
    <fieldset id="block_add_role">
        <legend>Assign Roles to <?php echo $user_id; ?>:</legend>
		  
        <?php $attributes = array('class' => 'form-horizontal col-md-7'); ?>
        <?php echo form_open('admin/user-role/update/'.$user_id , $attributes); ?>
	            
    

            <div class="control-group">
                <label class="control-label" for="ddl_roles">Assign roles:</label>
                
                <select class="form-control" multiple name="ddl_roles[]" id="ddl_roles">
                    <?php foreach ($roles as $row): ?>
                        <option value="<?php echo $row->role_title; ?>" <?php echo set_select('ddl_roles[]',$row->role_title,( !empty($user_roles) && in_array($row->role_title, $user_roles) ? TRUE: FALSE)); ?>><?php echo $row->role_title; ?></option>
                    <?php endforeach; ?>
                </select>
                
                <div class="help-inline">
                    <?php echo form_error('ddl_roles', '<span class="text-error">', '</span>'); ?>
                </div>
            </div>
              
            <br/>
            
			<button type="submit" id="btn_save" name="btn_save" class="btn btn-primary" >Save Changes</button>
			<?php echo anchor(base_url().'admin/user-role', 'Cancel', 'class="btn btn-default"'); ?>					
            
        <?php echo form_close();?>
    </fieldset>
</div>
 </div>