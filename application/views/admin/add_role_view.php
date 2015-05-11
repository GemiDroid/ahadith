
            <div class="col-md-9">
  <h3>Adding Role</h3>
  <table>

    <tbody>

    <?php echo form_open('admin/role/add');?>

      <tr>
        <td><?php echo form_label('Role Title','txt_role_title');?></td>
        <td><?php echo form_input('txt_role_title'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Description','txt_description');?></td>
        <td><?php echo form_input('txt_description'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Role Order','txt_role_order');?></td>
        <td><?php echo form_input('txt_role_order');?></td>
      </tr>

      <tr>
      
       <td><input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/></td> 
      </tr>
      <?php echo form_close();?>

    </tbody>
  </table>

    </div>
 </div>
