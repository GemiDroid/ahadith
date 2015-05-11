
            
            <div class="col-md-9">

  <h3>Updating Hadith Book!</h3>

  <?php
  if(!empty($hadith_books)){

  ?>
  <table>

    <tbody>
      <?php echo form_open('admin/hadith-book/update/'.$hadith_book_id);?>
      <tr>
        <td><?php echo form_label('Arabic Title','hadith_book_title_ar');?></td>
        <td><?php echo form_input('hadith_book_title_ar',(!empty($hadith_books) ? $hadith_books->hadith_book_title_ar : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Title','hadith_book_title_en');?></td>
        <td><?php echo form_input('hadith_book_title_en',(!empty($hadith_books) ? $hadith_books->hadith_book_title_en : '')); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Urdu Title','hadith_book_title_ur');?></td>
        <td><?php echo form_input('hadith_book_title_ur',(!empty($hadith_books) ? $hadith_books->hadith_book_title_ur : ''));?></td>
      </tr>
    
      <tr>
        <td><input type="submit" id="mysubmit" name="mysubmit" value="Update" class="btn btn-success">
        <a href="<?php echo ('http://localhost/ahadith/hadith-book'); ?>"><input type="submit" id="mysubmit" name="mysubmit" value="Cancel" class="btn btn-primary">
        <a href="<?php echo ('http://localhost/ahadith/admin/hadith-book/delete/'.$hadith_books->hadith_book_id); ?>"><input type="button" value="Delete" class="btn btn-danger"></a></td>
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
