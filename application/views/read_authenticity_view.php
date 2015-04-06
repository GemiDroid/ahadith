<!DOCTYPE html>

<body>
  <h2>Authenticity</h2>

  <?php
  if((!empty($authenticity))){
?>
  <table>
    <thead>
      <tr>

        <th>Authenticity ID</th>
        <th>Title Arabic</th>
        <th>Title English</th>
        <th>Title Urdu</th>
        <th>Order</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td><?php echo (!empty($authenticity) ? $authenticity->authenticity_id : ''); ?></td>
          <td><?php echo (!empty($authenticity) ? $authenticity->authenticity_title_ar : ''); ?></td>
          <td><?php echo (!empty($authenticity) ? $authenticity->authenticity_title_en : ''); ?></td>
          <td><?php echo (!empty($authenticity) ? $authenticity->authenticity_title_ur : ''); ?></td>
          <td><?php echo (!empty($authenticity) ? $authenticity->authenticity_order : '') ?></td>


          <td><a href="<?php echo ('http://localhost/ahadith/authenticity/update/'.$authenticity->authenticity_id); ?>">Update</a></td>
          <!--<td><a href="<?php echo ('http://local.ws/ahadith/index.php/authenticity/delete/'.$authenticity->authenticity_id); ?>">Delete</a></td>-->
          <td><a href="<?php echo ('http://localhost/ahadith/authenticitydelete/'.$authenticity->authenticity_id); ?>">Delete</a></td>
        </tr>

    </tbody>
  </table>
  <?php
}
else{
  //echo 'does not exist';
}?>
</body>
</html>
