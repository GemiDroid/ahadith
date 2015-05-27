<div class="col-md-9" style="margin-top: 50px;">
  
  
  <fieldset>
    <legend>Displaying All User Roles</legend>
    
    <div class="row-fluid">
      <div>
    
        <table class="table table-bordered table-hover table-condensed">
          <thead>
            <tr>
              <th style="text-align: center;">User ID</th>
              <th style="text-align: center;">Roles Title</th>
              <th style="text-align: center;">Action</th>
            </tr>
          </thead>
          
          <tbody>
            <?php if(!empty($user_roles)):?>
              <?php foreach($user_roles as $row): ?>
                <tr>
                  <td style="text-align: center;"><?php echo $row->user_id; ?></td>
                  <td style="text-align: center;">
                  <?php
                    if(!empty($row->roles)):
                      foreach( $row->roles as $role ):
                        echo $role->role_title ."<br/>";
                      endforeach;
                    else:
                      echo "None";
                    endif;
                  ?>
                  </td>
                  <td style="text-align: center;"><a href='<?php echo (base_url().'admin/user-role/update/'.$row->user_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
                </tr>
              <?php endforeach; ?>
            <?php endif;?>
          </tbody>
        </table>
      </div>
    </div>
    
  </fieldset>
         
</div>
 </div>
