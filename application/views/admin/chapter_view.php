<div style="margin-left:60%;" class="control-group form-inline">
 <label for="search_chapter_by_id">Search Chapter by ID: </label>
 <input class="form-control" style="width: 100px;" type="text" id="search_chapter_by_id"/>
 <button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>
</div>
          
<fieldset>
              
  <legend>Displaying All Chapters</legend>
  <?php if( $this->user_roles->is_authorized( array('admin_chapter_add') ) ): ?>
     <?php echo anchor(base_url().'admin/chapter/add', 'Add New Chapter', 'class="btn btn-primary"'); ?>
  <?php endif; ?>
  <br/>
  <br/>
  
  <table class="table table-bordered table-hover">
    <thead>
      <tr>
        <th style="text-align: center;">#</th>
        <th style="text-align: center;">Hadith Book</th>
        <th style="text-align: center;">Arabic Title</th>
        <th style="text-align: center;">English Title</th>
        <th style="text-align: center;">Urdu Title</th>
        <?php if( $this->user_roles->is_authorized( array('admin_chapter_edit') ) ): ?>
          <th style="text-align: center;">Action</th>
        <?php endif; ?>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($ahadith)):?>

      <?php foreach($ahadith as $chapter): ?>
        <tr>
          <td style="text-align: center;"><?php echo $chapter->chapter_id; ?></td>
          <td style="text-align: center;"><?php echo $chapter->hadith_book_id; ?></td>
          <td style="text-align: center;" lang='AR'><?php echo substr( $chapter->chapter_title_ar, 0, 20); ?>&nbsp;&hellip;</td>
          <td style="text-align: center;"><?php echo substr( $chapter->chapter_title_en, 0 ,20); ?>&nbsp;&hellip;</td>
          <td style="text-align: center;" lang='UR'><?php echo substr( $chapter->chapter_title_ur, 0, 20); ?>&nbsp;&hellip;</td>
          <?php if( $this->user_roles->is_authorized( array('admin_chapter_edit') ) ): ?>
               <td style="text-align: center;"><a href='<?php echo (base_url().'admin/chapter/update/'.$chapter->chapter_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
    
</fieldset>
 
<script type="text/javascript">
 
 $(document).ready(function(){

   $('.search-btn').on("click", function() {
     //if field is not empty
     if ( $('#search_chapter_by_id').val().trim() != '' ) {
       window.open("<?php echo base_url(); ?>admin/chapter/update/"+$('#search_chapter_by_id').val(),"_self");
     }
   });

 });

</script>
