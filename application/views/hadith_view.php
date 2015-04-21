<!DOCTYPE html>

<body>
  <h3>Displaying All Ahadith</h3>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Arabic Plain</th>
        <th>English Plain</th>
        <th>Urdu Plain</th>
        <th>Arabic Mark</th>
        <th>English Mark</th>
        <th>Urdu Mark</th>
        <th>Raw Arabic</th>
        <th>Authenticity</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ahadith as $hadith): ?>
        <tr>
          <td><?php echo $hadith->hadith_id; ?></td>
          <td><?php echo $hadith->hadith_plain_ar; ?></td>
          <td><?php echo $hadith->hadith_plain_en; ?></td>
          <td><?php echo $hadith->hadith_plain_ur; ?></td>
          <td><?php echo $hadith->hadith_marked_ar; ?></td>
          <td><?php echo $hadith->hadith_marked_en; ?></td>
          <td><?php echo $hadith->hadith_marked_ur; ?></td>
          <td><?php echo  $hadith->hadith_raw_ar; ?></td>
          <td><?php echo $hadith->authenticity_id; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>
