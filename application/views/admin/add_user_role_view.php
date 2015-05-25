
<div class="col-md-9" style="margin-top: 50px;">
  

  <h4>Add New User Role</h4>
  <hr>
  

    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/user-role/add' , $attributes ); ?>
<div class="control-group form-inline">
   <div class="col-md-2"> <label for="ddl_user_list">User ID: </label></div> 
  <select class="form-control" style="width: 500px; height: 40px;" name="ddl_user_list">
    <?php foreach($users as $row):?>
    <option value="<?php echo $row->user_id;?>" <?php echo set_select('ddl_user_list',$row->user_id, ($row->user_id == '')? TRUE:FALSE ); ?> ><?php echo $row->user_id;?> </option>
    <?php endforeach; ?>
  </select>
  
</div>
 <div>&nbsp;</div>
<div class="control-group form-inline">
<div class="col-md-2"><label for="ddl_role_list">Role Title: </label></div>

  <select class="form-control" style="width: 500px; height: 35px;" name="ddl_role_list">
    <?php foreach($roles as $row):?>
    <option value="<?php echo $row->role_title;?>" <?php echo set_select('ddl_role_list',$row->role_title, ($row->role_title == '')? TRUE:FALSE ); ?> ><?php echo $row->role_title;?> </option>
    <?php endforeach; ?>
  </select>
 </div>
 <div>&nbsp;</div>
<div class="control-group">
<input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/>
<a href="<?php echo base_url().'admin/user-role' ?>"><input type="button" value="Cancel" class="btn btn-primary"></a>
</div>
<?php echo form_close(); ?>

</div>
      </div>      
        
    
          