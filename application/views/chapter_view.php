<!DOCTYPE html>

<body>
  <h2>Displaying All Chapters</h2>
  <table>
    <thead>
      <tr>
        <th>ID</th>
        <th>Arabic Title</th>
        <th>English Title</th>
        <th>Urdu Title</th>
        <th>Arabic Detail</th>
        <th>English Detail</th>
        <th>Urdu Detail</th>
        <th>Book ID</th>
        <th>Hadith Book ID</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($ahadith)):?>

      <?php foreach($ahadith as $chapter): ?>
        <tr>
          <td><?php echo $chapter->chapter_id; ?></td>
          <td><?php echo $chapter->chapter_title_ar; ?></td>
          <td><?php echo $chapter->chapter_title_en; ?></td>
          <td><?php echo $chapter->chapter_title_ur; ?></td>
          <td><?php echo $chapter->chapter_detail_ar; ?></td>
          <td><?php echo $chapter->chapter_detail_en; ?></td>
          <td><?php echo $chapter->chapter_detail_ur; ?></td>
          <td><?php echo $chapter->book_id; ?></td>
          <td><?php echo $chapter->hadith_book_id; ?></td>
          <td><a href='<?php echo ('http://local.ws/ahadith/index.php/chapter/read/'.$chapter->chapter_id); ?>' >Read</a></td>
        </tr>
      <?php endforeach; ?>
  
    <?php endif;?>

    </tbody>
  </table>

</body>
</html>
