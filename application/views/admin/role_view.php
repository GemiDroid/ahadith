<fieldset id="block_display_roles">
  <legend>Displaying All Roles</legend>
  
  <div class="row-fluid">
    <div>
  
      <table class="table table-bordered table-hover table-condensed">
        <thead>
          <tr>
            <th style="text-align: center;">Role Title</th>
            <th style="text-align: center;">Description</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        
        <tbody>
          <?php if(!empty($roles)):?>
            <?php foreach($roles as $role): ?>
              <tr>
                <td style="text-align: center;"><?php echo $role->role_title; ?></td>
                <td style="text-align: center;"><?php echo $role->description; ?></td>
                <td style="text-align: center;"><a href='<?php echo (base_url().'admin/role/update/'.$role->role_title); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
              </tr>
            <?php endforeach; ?>
          <?php endif;?>
        </tbody>
      </table>
    </div>
  </div>

  <?php echo anchor(base_url().'admin/role/add', 'Add New Role', 'class="btn btn-primary"'); ?>
  
</fieldset>