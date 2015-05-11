<div class="col-md-9">
     
  <div style="float: left;">
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/role/add' , $attributes ); ?>

<input type="submit" id="btn_add_new_role" name="btn_add_new_role" value="Add New Role" class="btn btn-primary"/>

<?php echo form_close(); ?>

  </div>
<div>&nbsp;</div> 
              
  <h3>Displaying All Roles</h3>
  <table class="table table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Role Title</th>
        <th>Description</th>
        <th>Role Order</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($roles)):?>

      <?php foreach($roles as $role): ?>
        <tr>
          <td><?php echo $role->role_title; ?></td>
          <td><?php echo $role->description; ?></td>
          <td><?php echo $role->role_order; ?></td>
          <td><a href='<?php echo ('http://localhost/ahadith/admin/role/update/'.$role->role_title); ?>' >Edit</a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
    </div>
 </div>
