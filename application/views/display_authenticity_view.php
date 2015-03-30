<!DOCTYPE html>

<body>
  <h2>Authenticity</h2>
  <table>
    <thead>
      <tr>
        <th>Authenticity ID</th>
        <th>Title Arabic</th>
        <th>Title English</th>
        <th>Title Urdu</th>
        <th>Order</th>
        <th>Read</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ahadith as $authenticity): ?>
        <tr>
          <td><?php echo $authenticity->authenticity_id; ?></td>
          <td><?php echo $authenticity->authenticity_title_ar; ?></td>
          <td><?php echo $authenticity->authenticity_title_en; ?></td>
          <td><?php echo $authenticity->authenticity_title_ur; ?></td>
          <td><?php echo $authenticity->authenticity_order; ?></td>
          <td><a href='<?php echo ('http://localhost/ahadith/authenticity/read/'.$authenticity->authenticity_id); ?>' >Read</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
