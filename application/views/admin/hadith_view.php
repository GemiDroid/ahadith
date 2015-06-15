<div style="margin-left:65%;" class="control-group form-inline">
  <label for="search_hadith_by_id">Search Hadith by ID: </label>
  <input class="form-control" style="width: 100px;" type="text" id="search_hadith_by_id"/>
  <button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>
</div>
        
<fieldset>
    
  <legend>Displaying All Ahadith </legend>
  <?php if( $this->user_roles->is_authorized( array('admin_hadith_add') )   ): ?>
  <?php echo anchor(base_url().'admin/hadith/add', 'Add New Hadith', 'class="btn btn-primary"'); ?>
  <?php endif; ?>
  <br/>
  <br/>
  
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="text-align: center;">#</th>
        <th style="text-align: center;">Arabic Plain</th>
        <th style="text-align: center;">English Plain</th>
        <th style="text-align: center;">Urdu Plain</th>
        <th style="text-align: center;">Hadith in books</th>
        <?php if( $this->user_roles->is_authorized( array('admin_hadith_edit') )   ): ?>
        <th style="text-align: center;">Action</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php foreach($ahadith as $hadith): ?>
        <tr>
          <td style="text-align: center;"><?php echo $hadith->hadith_id; ?></td>
          <td style="text-align: center;" lang='AR'><?php echo substr( $hadith->hadith_plain_ar, 0 ,20); ?>&nbsp;&hellip;</td>
          <td style="text-align: center;" lang='EN'><?php echo substr( $hadith->hadith_plain_en, 0, 20); ?>&nbsp;&hellip;</td>
          <td style="text-align: center;" lang='UR'><?php echo substr( $hadith->hadith_plain_ur, 0, 20); ?>&nbsp;&hellip;</td>          
          <td style="text-align: center;"><a href='<?php echo (base_url().'admin/hadith-in-book/'.$hadith->hadith_id); ?>' >view</a></td>
        <?php if( $this->user_roles->is_authorized( array('admin_hadith_edit') )   ): ?>
          <td style="text-align: center;"><a href='<?php echo (base_url().'admin/hadith/update/'.$hadith->hadith_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</fieldset>        


<script type="text/javascript">
 
 $(document).ready(function(){

   $('.search-btn').on("click", function() {
     //if field is not empty
     if ( $('#search_hadith_by_id').val().trim() != '' ) {
       window.open("<?php echo base_url(); ?>admin/hadith/update/"+$('#search_hadith_by_id').val(),"_self"); 
     }
   });

 });

</script>