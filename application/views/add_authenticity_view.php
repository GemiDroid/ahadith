
            
            <div class="col-md-9">
  <h3>Adding Authenticity</h3>
  <table>

    <tbody>

    <?php echo form_open('admin/authenticity/add');?>

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
        <td><?php echo form_label('Order','txt_order');?></td>
        <td><?php echo form_input('txt_order');?></td>
      </tr>
      <tr>
       <td><input type="submit" id="mysubmit" name="mysubmit" value="Add" class="btn btn-success"/></td> 
      </tr>
      <?php echo form_close();?>



    </tbody>
  </table>

</div>
 </div>
