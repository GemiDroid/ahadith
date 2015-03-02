<!DOCTYPE html>

<body>
  <h2>Adding All Ahadith</h2>
  <table>

    <tbody>

    <?php echo form_open('editor/hadith/add');?>

      <tr>
        <td><?php echo form_label('Plain Arabic','txt_plain_ar');?></td>
        <td><?php echo form_textarea('txt_plain_ar'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain English','txt_plain_en');?></td>
        <td><?php echo form_textarea('txt_plain_en'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Plain Urdu','txt_plain_ur');?></td>
        <td><?php echo form_textarea('txt_plain_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Arabic','txt_marked_ar');?></td>
        <td><?php echo form_textarea('txt_marked_ar');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked English','txt_marked_en');?></td>
        <td><?php echo form_textarea('txt_marked_en');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Marked Urdu','txt_marked_ur');?></td>
        <td><?php echo form_textarea('txt_marked_ur');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Raw Arabic','txt_raw_ar');?></td>
        <td><?php echo form_textarea('txt_raw_ar');?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Authenticity','authenticity_id');?></td>
        <td><?php echo form_input('authenticity_id');?></td>
      </tr>
      <tr>
        <td><?php echo form_submit('mysubmit','Submit Hadith');?></td>
      </tr>
      <?php echo form_close();?>



    </tbody>
  </table>

</body>
</html>
