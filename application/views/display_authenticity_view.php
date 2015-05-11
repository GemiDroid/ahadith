
            <div class="col-md-9">
              
               <div style="float: left;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/authenticity/add' , $attributes ); ?>
          
          <input type="submit" id="btn_add_new_authenticity" name="btn_add_new_authenticity" value="Add New Authenticity" class="btn btn-primary"/>
          
          <?php echo form_close(); ?>
          
              </div>
               
               
                      
            <div style="float:right;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/authenticity/search/' , $attributes ); ?>
                <label for="ddl_authenticity_list">Search Authenticity by Title: </label>
       <?php if(!empty($ahadith)):?>

              <select name="ddl_authenticity_list">
                <?php foreach($ahadith as $row):?>
                <option value="<?php echo $row->authenticity_id;?>" <?php echo set_select('ddl_authenticity_list',$row->authenticity_id, ($row->authenticity_id == '')? TRUE:FALSE ); ?> ><?php echo $row->authenticity_title_en;?> </option>
                <?php endforeach; ?>
              </select>
              <?php endif;?>
          <input type="submit" id="btn_search" name="btn_search" value="Search" class="btn btn-success"/>
          
          <?php echo form_close(); ?>
          
          </div>
          <div>&nbsp;</div> 
              
  <h3>Authenticity</h3>
  <table class="table table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Authenticity ID</th>
        <th>Title Arabic</th>
        <th>Title English</th>
        <th>Title Urdu</th>
        <th>Order</th>
        <th>Read</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ahadith as $authenticity): ?>
        <tr>
          <td><?php echo $authenticity->authenticity_id; ?></td>
          <td><?php echo $authenticity->authenticity_title_ar; ?></td>
          <td><?php echo $authenticity->authenticity_title_en; ?></td>
          <td><?php echo $authenticity->authenticity_title_ur; ?></td>
          <td><?php echo $authenticity->authenticity_order; ?></td>
          <td><a href='<?php echo ('http://localhost/ahadith/admin/authenticity/update/'.$authenticity->authenticity_id); ?>' >Edit</a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</div>
 </div>
