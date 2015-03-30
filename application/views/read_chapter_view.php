<!DOCTYPE html>

<body>
  <h2>Reading a Chapter</h2>

  <?php if(empty($chapter)):
    echo "Record not found";
    else:?>
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
        <th>Book Id</th>
        <th>Hadith_Book_Id</th>
      </tr>
    </thead>
    <tbody>


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

          <td><a href="<?php echo ('http://localhost/ahadith/chapter/update/'.$chapter->chapter_id); ?>">Update</a></td>
          <!--<td><a href="<?php echo ('http://local.ws/ahadith/index.php/chapter/delete/'.$chapter->chapter_id); ?>">Delete</a></td>-->
          <td><a href="<?php echo ('http://localhost/ahadith/chapter/delete/'.$chapter->chapter_id); ?>">Delete</a></td>
        </tr>

    </tbody>
  </table>
<?php endif;?>
</body>
</html>
