
             
            
            <div class="col-md-9">
                
                <?php echo validation_errors(); ?>
  
          <?php $attributes = array('class' => 'form-horizontal'); ?>
          <?php echo form_open( '/admin/user-role/update/'.$user_id , $attributes ); ?>
                <h3> Update User Roles </h3>
              
                <?php if(!empty($user_role)): ?>

                  <div class="control-group">
              <div class="col-md-2"><label for="ddl_role_list">Role Title: </label></div>

                <select name="ddl_role_list">
                  <?php foreach($user_role as $row):?>
                  <option value="<?php echo $row->role_title;?>" <?php echo set_select('ddl_role_list',$row->role_title, ($row->role_title == '')? TRUE:FALSE ); ?> ><?php echo $row->role_title;?> </option>
                  <?php endforeach; ?>
                </select>
               </div>
              
              <div>&nbsp;</div>
              <div class="control-group">
                <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success" />
                    <a href="<?php echo base_url().'admin/user-role' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
                    <a href="<?php echo base_url().'admin/user-role/delete/'.$user_id; ?>" ><input type="button" value="Delete" class="btn btn-danger"></a>
              </div>
                <?php endif; ?>
       
            
            
            <?php echo form_close();?>
        </div>
 </div>