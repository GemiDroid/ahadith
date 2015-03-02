<html>
<head>
<title>My Form</title>
</head>
<body>

  <table>
    <tbody>

      <?php echo validation_errors(); ?>
      <?php echo form_open('form'); ?>

      <tr>
        <td><?php echo form_label('Username','txt_username');?></td>
        <td><?php echo form_input('txt_username'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Email','txt_email');?></td>
        <td><?php echo form_input('txt_email'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Password','txt_password');?></td>
        <td><?php echo form_input('txt_password'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Confirm Password','txt_confirm_password');?></td>
        <td><?php echo form_input('txt_confrim_password'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Full Name','txt_full_name');?></td>
        <td><?php echo form_input('txt_full_name'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Date of Birth','txt_date-of_birth');?></td>
        <td><?php echo form_input('txt_date_of_birth'); ?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Gender','txt_gender');?></td>
        <td><?php echo echo form_radio('male', 'Male', TRUE); ?></td>
        <td><?php echo form_radio('female', 'Female', FALSE);?></td>
      </tr>
      <tr>
        <td><?php echo form_label('Country','ddl_country_list');?></td>
        <td>
          <?php if(!empty($country_name)):?>
          <?php foreach($country_name as $row):?>
            <select name="ddl_country_list">
              <option value="<?php echo $row->country_code;?>" <?php echo  set_select('ddl_country_name',$row->country_code, TRUE); ?> ><?php echo $row->country_name;?> </option>
            </select>
          <?php endforeach; ?>

          <?php endif;?>
        </td>
      </tr>

    </tbody>
  </table>

</body>
</html>
