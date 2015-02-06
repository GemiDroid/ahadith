<!DOCTYPE html>

<body>



  <h2>Updating Authenticity!</h2>

  <?php
  if(!empty($authenticity)){

  ?>
  <table>

    <tbody>
      <?php echo form_open('authenticity/update/'.$authenticity_id);?>
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
        <td><?php echo form_submit('mysubmit','Submit Authenticity');?></td>
        <!--td><a href="<?php echo ('http://local.ws/ahadith/index.php/authenticity/delete/'.$authenticity_id); ?>">Delete</a></td>-->
      </tr>
      <?php echo form_close();?>
    </tbody>
  </table>
<?php
}
else
  echo 'Does not exist';

  ?>
</body>
</html>
