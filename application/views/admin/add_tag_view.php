
            <div class="col-md-9">
  <h3>Adding Tag</h3>
  <table>

    <tbody>

    <?php echo form_open('admin/add');?>

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
      
       <td><input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/></td> 
      </tr>
      <?php echo form_close();?>



    </tbody>
  </table>

            </div>
 </div>
