<!DOCTYPE html>

<body>
  <h2>Reading a hadith</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Arabic Plain</th>
        <th>English Plain</th>
        <th>Urdu Plain</th>
        <th>Arabic Mark</th>
        <th>English Mark</th>
        <th>Urdu Mark</th>
        <th>Raw</th>
        <th>Reliability</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td><?php echo $hadith->hadith_code; ?></td>
          <td><?php echo $hadith->hadith_plain_ar; ?></td>
          <td><?php echo $hadith->hadith_plain_en; ?></td>
          <td><?php echo $hadith->hadith_plain_ur; ?></td>
          <td><?php echo $hadith->hadith_marked_ar; ?></td>
          <td><?php echo $hadith->hadith_marked_en; ?></td>
          <td><?php echo $hadith->hadith_marked_ur; ?></td>
          <td><?php echo  $hadith->hadith_raw_ar; ?></td>
          <td><?php echo $hadith->reliability; ?></td>
        </tr>

    </tbody>
  </table>

</body>
</html>
