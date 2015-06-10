<div style="margin-left:70%;"  class="control-group form-inline">
    <label for="ddl_hadith_book_list">Search Hadith Book by Title: </label>
        <?php if(!empty($hadith_books)):?>
        
          <select class="form-control" style="width: 200px; height: 40px;" name="ddl_hadith_book_list" id="ddl_hadith_book_list">
            <?php foreach($hadith_books as $row):?>
            <option value="<?php echo $row->hadith_book_id;?>" <?php echo set_select('ddl_hadith_book_list',$row->hadith_book_id, ($row->hadith_book_id == '')? TRUE:FALSE ); ?> ><?php echo $row->hadith_book_title_en;?> </option>
            <?php endforeach; ?>
          </select>
          <?php endif;?>
        <button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>
        
</div>
    
<fieldset>
    <legend>Displaying All Hadith Books</legend>
    <table class="table table-bordered table-hover">
        <thead>
          <tr>
            <th style="text-align: center;">Hadith Book ID</th>
            <th style="text-align: center;">Arabic Title</th>
            <th style="text-align: center;">English Title</th>
            <th style="text-align: center;">Urdu Title</th>
            <th style="text-align: center;">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if(!empty($hadith_books)):?>
    
          <?php foreach($hadith_books as $hadith_book): ?>
            <tr>
              <td style="text-align: center;"><?php echo $hadith_book->hadith_book_id; ?></td>
              <td style="text-align: center;"><?php echo $hadith_book->hadith_book_title_ar; ?></td>
              <td style="text-align: center;"><?php echo $hadith_book->hadith_book_title_en; ?></td>
              <td style="text-align: center;"><?php echo $hadith_book->hadith_book_title_ur; ?></td>
              
              <td style="text-align: center;"><a href='<?php echo (base_url().'admin/hadith-book/update/'.$hadith_book->hadith_book_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
            </tr>
          <?php endforeach; ?>
    
        <?php endif;?>
    
        </tbody>
      </table>
      <?php echo anchor(base_url().'admin/hadith-book/add', 'Add New Hadith Book', 'class="btn btn-primary"'); ?>  
</fieldset>
<script type="text/javascript">
    $(document).ready(function(){
        $('.search-btn').on("click", function() {
            window.open("<?php echo base_url(); ?>admin/hadith-book/update/"+$('#ddl_hadith_book_list').val(),"_self");
        });
    });
</script>