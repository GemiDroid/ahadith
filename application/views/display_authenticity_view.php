
 <div class="col-md-9" style="margin-top: 50px;">
         
  <div style="float:right;" class="control-group form-inline">
     
      <label for="ddl_authenticity_list">Search Authenticity by Title: </label>
<?php if(!empty($ahadith)):?>

    <select class="form-control" style="width: 380px; height: 35px;" name="ddl_authenticity_list" id="ddl_authenticity_list">
      <?php foreach($ahadith as $row):?>
      <option value="<?php echo $row->authenticity_id;?>" <?php echo set_select('ddl_authenticity_list',$row->authenticity_id, ($row->authenticity_id == '')? TRUE:FALSE ); ?> ><?php echo substr($row->authenticity_title_en,0,30);?> </option>
      <?php endforeach; ?>
    </select>
    <?php endif;?>
<button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>



</div>
<div>&nbsp;</div> 
              
  <h4>Authenticity</h4>
  <hr>
  <table class="table table-hover table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Authenticity ID</th>
        <th>Title Arabic</th>
        <th>Title English</th>
        <th>Title Urdu</th>
        <th>Order</th>
        <th>Action</th>
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
          <td><a href='<?php echo (base_url().'admin/authenticity/update/'.$authenticity->authenticity_id); ?>'"><li class="glyphicon glyphicon-pencil"></li></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

  
    <div style="float: left;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/authenticity/add' , $attributes ); ?>
          
          <input type="submit" id="btn_add_new_authenticity" name="btn_add_new_authenticity" value="Add New Authenticity" class="btn btn-primary"/>
          
          <?php echo form_close(); ?>
          
              </div>
               
  
</div>
 </div>

 <script type="text/javascript">
  
  $(document).ready(function(){

    $('.search-btn').on("click", function() {
      window.open("<?php echo base_url(); ?>admin/authenticity/update/"+$('#ddl_authenticity_list').val(),"_self");
    });

  });

 </script>