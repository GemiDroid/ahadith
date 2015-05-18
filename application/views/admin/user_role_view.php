<div class="col-md-9" style="margin-top: 50px;">
     
          
  <h4>Displaying All User Roles</h4>
  <hr>
  <table class="table table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>User Id</th>
        <th>Role Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($user_roles)):?>

      <?php foreach($user_roles as $role): ?>
        <tr>
          <td><?php echo $role->user_id; ?></td>
          <td><?php echo $role->role_title; ?></td>
          
           <td><a href='<?php echo (base_url().'admin/user-role/update/'.$role->user_id); ?>' >Edit</a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
  
  
    <div style="float: left;">

          <a href="<?php echo (base_url().'admin/user-role/add'); ?>"><input type="submit" id="btn_add_new_user_role" name="btn_add_new_user_role" value="Add New User Role" class="btn btn-primary"/></a>
          
              </div>
         
    </div>
 </div>
