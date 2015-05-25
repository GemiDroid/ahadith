 
            <div class="col-md-9" style="margin-top: 50px;">
             
         
         
         <div>
          <div style="float:left;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/hadith/add' , $attributes ); ?>
          
          <input type="submit" id="btn_add_new_hadith" name="btn_add_new_hadith" value="Add New Hadith" class="btn btn-primary"/>
          
          <?php echo form_close(); ?>
          
          </div>
         
          
            
           
        <div style="float:right;" class="control-group form-inline">
               
            <label for="search_hadith_by_id">Search Hadith by ID: </label>
            <input class="form-control" style="width: 150px; height: 35px;" type="text" id="search_hadith_by_id" name="search_hadith_by_id"/>
          
         <button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>
          
          </div>
        
        </div>
          
          <div>&nbsp;</div>
            <div>&nbsp;</div> 
            
              
  <h4>Displaying All Ahadith</h4>
  <hr>
  <table class="table table-bordered table-hover">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>ID</th>
        <th>Arabic Plain</th>
        <th>English Plain</th>
        <th>Urdu Plain</th>
      <!--  <th>Arabic Mark</th>
        <th>English Mark</th>
        <th>Urdu Mark</th>
        <th>Raw Arabic</th>
        <th>Authenticity</th>-->
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ahadith as $hadith): ?>
        <tr>
          <td><?php echo $hadith->hadith_id; ?></td>
          <td><?php echo $hadith->hadith_plain_ar; ?></td>
          <td><?php echo $hadith->hadith_plain_en; ?></td>
          <td><?php echo $hadith->hadith_plain_ur; ?></td>
      <!--    <td><?php echo $hadith->hadith_marked_ar; ?></td>
          <td><?php echo $hadith->hadith_marked_en; ?></td>
          <td><?php echo $hadith->hadith_marked_ur; ?></td>
          <td><?php echo $hadith->hadith_raw_ar; ?></td>
          <td><?php echo $hadith->authenticity_id; ?></td>-->
          
          <td><a href='<?php echo (base_url().'admin/hadith/update/'.$hadith->hadith_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

            </div>
            
  </div>


 <script type="text/javascript">
  
  $(document).ready(function(){

    $('.search-btn').on("click", function() {
      window.open("<?php echo base_url(); ?>admin/hadith/update/"+$('#search_hadith_by_id').val(),"_self");
    });

  });

 </script>