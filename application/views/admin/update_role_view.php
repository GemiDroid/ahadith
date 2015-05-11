<div class="col-md-9">

  <h3>Updating Role!</h3>
  <?php if(!empty($role)): ?>
  <table>
    <tbody>
      <?php echo form_open('admin/role/update/'.$role_title);?>

      <tr>
        <td><?php echo form_label('Description','txt_description');?></td>
        <td><?php echo form_input('txt_description',(!empty($role) ? $role[0]->description : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Role Order','txt_role_order');?></td>
        <td><?php echo form_input('txt_role_order',(!empty($role) ? $role[0]->role_order : ''));?></td>
      </tr>
      <tr>
        <td><input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo ('http://localhost/ahadith/admin/role/delete/'.$role[0]->role_title); ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
<?php  else:
  echo 'Does not exist';
  endif;
  ?>
            </div>
 </div>
