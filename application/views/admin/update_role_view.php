<div class="col-md-9" style="margin-top: 50px;">

  <h4>Updating Role!</h4>
  <hr>
  <?php if(!empty($role)): ?>
 
      <?php echo form_open('admin/role/update/'.$role_title);?>

       <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_description">Description:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_description" id="txt_description" value="<?php echo set_value('txt_description', (!empty($role) ? $role[0]->description : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('txt_description', '<span class="text-error">', '</span>'); ?>
            </div>
       </div>
      <div>&nbsp;</div>
       <div class="control-group form-inline">
            <div class="col-md-2"><label class="control-label" for="txt_role_order">Role Order:</label></div>
            <input class="form-control" style="width: 500px; height: 30px;" type="text" name="txt_role_order" id="txt_role_order" value="<?php echo set_value('txt_role_order', (!empty($role) ? $role[0]->role_order : '')); ?>" size="50"/>
            <div class="help-inline">
              <?php echo form_error('txt_role_order', '<span class="text-error">', '</span>'); ?>
            </div>
       </div>
      <div>&nbsp;</div>
     
     <input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo base_url().'admin/role' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
        <a href="<?php echo (base_url().'admin/role/delete/'.$role[0]->role_title); ?>"><input type="button" value="Delete" class="btn btn-danger"></a>
    
      <?php echo form_close();?>

<?php  else:
  echo 'Does not exist';
  endif;
  ?>
            </div>
 </div>
