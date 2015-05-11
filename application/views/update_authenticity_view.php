
            
            <div class="col-md-9">

  <h3>Updating Authenticity!</h3>

  <?php
  if(!empty($authenticity)){

  ?>
  <table>

    <tbody>
      <?php echo form_open('admin/authenticity/update/'.$authenticity_id);?>
      <tr>
        <td><?php echo form_label('Arabic Title','txt_title_ar');?></td>
        <td><?php echo form_input('txt_title_ar',(!empty($authenticity) ? $authenticity->authenticity_title_ar : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Title','txt_title_en');?></td>
        <td><?php echo form_input('txt_title_en',(!empty($authenticity) ? $authenticity->authenticity_title_en : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Urdu Title','txt_title_ur');?></td>
        <td><?php echo form_input('txt_title_ur',(!empty($authenticity) ? $authenticity->authenticity_title_ur : ''));?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Order','txt_order');?></td>
        <td><?php echo form_input('txt_order',(!empty($authenticity) ? $authenticity->authenticity_order : ''));?></td>
      </tr>
      <tr>
        <td><input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo ('http://localhost/ahadith/authencticity/'.$authenticity->authenticity_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
<?php
}
else
  echo 'Does not exist';

  ?>

  </div>
 </div>