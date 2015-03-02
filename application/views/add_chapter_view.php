<!DOCTYPE html>

<body>
  <h2>Adding Chapter</h2>
  <table>

    <tbody>

    <?php echo form_open('editor/chapter/add');?>

      <tr>
        <td><?php echo form_label('Arabic Title','txt_title_ar');?></td>
        <td><?php echo form_input('txt_title_ar'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Title','txt_title_en');?></td>
        <td><?php echo form_input('txt_title_en'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Urdu Title','txt_title_ur');?></td>
        <td><?php echo form_input('txt_title_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Arabic Detail','txt_detail_ar');?></td>
        <td><?php echo form_input('txt_detail_ar');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('English Detail','txt_detail_en');?></td>
        <td><?php echo form_input('txt_detail_en');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Urdu Detail','txt_detail_ur');?></td>
        <td><?php echo form_input('txt_detail_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Book Id','txt_book_id');?></td>
        <td>
          <?php if(!empty($books)):?>
          <?php foreach($books as $row):?>
            <select name="ddl_book_id">
              <option value="<?php echo $row->book_id;?>" <?php echo  set_select('ddl_book_id',$row->book_id, TRUE); ?> ><?php echo $row->book_title_ar;?> </option>
            </select>
          <?php endforeach; ?>
        <?php else:
            echo 'No book has been added ' . anchor('book/view','Add Book');?>
          <?php endif;?>
        </td>
      </tr>
      <tr>
        <td><?php echo form_label('Hadith Book Id','txt_hadith_book_id');?></td>
        <td>
          <?php if(!empty($hadith_books)):?>
            <?php foreach($hadith_books as $row):?>
              <select name="ddl_hadith_book_id">
                <option value="<?php echo $row->hadith_book_id;?>" <?php echo  set_select('ddl_hadith_book_id',$row->hadith_book_id, TRUE); ?> ><?php echo $row->hadith_book_id;?> </option>
              </select>
            <?php endforeach; ?>
          <?php endif;?>
        </td>
      </tr>

      <tr>
        <td><?php echo form_submit('mysubmit','Submit Chapter');?></td>
      </tr>
      <?php echo form_close();?>



    </tbody>
  </table>

</body>
</html>
