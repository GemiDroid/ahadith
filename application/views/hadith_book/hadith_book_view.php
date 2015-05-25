

<div class="col-md-9" style="margin-top: 50px;">
  
            <div style="float:right;" class="control-group form-inline">
                
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
<div>&nbsp;</div> 
            
  <h4>Displaying All Hadith Books</h4>
   <hr> 
  <table class="table table-bordered table-hover">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Hadith Book ID</th>
        <th>Arabic Title</th>
        <th>English Title</th>
        <th>Urdu Title</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($hadith_books)):?>

      <?php foreach($hadith_books as $hadith_book): ?>
        <tr>
          <td><?php echo $hadith_book->hadith_book_id; ?></td>
          <td><?php echo $hadith_book->hadith_book_title_ar; ?></td>
          <td><?php echo $hadith_book->hadith_book_title_en; ?></td>
          <td><?php echo $hadith_book->hadith_book_title_ur; ?></td>
          
          <td><a href='<?php echo (base_url().'admin/hadith-book/update/'.$hadith_book->hadith_book_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
  
  
   <div style="float: left;">
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/hadith-book/add' , $attributes ); ?>

        <input type="submit" id="btn_add_new_hadith_book" name="btn_add_new_hadith_book" value="Add New Hadith Book" class="btn btn-primary"/>
        
        <?php echo form_close(); ?>

  </div>
            </div>
 </div>
 <script type="text/javascript">
  
  $(document).ready(function(){

    $('.search-btn').on("click", function() {
      window.open("<?php echo base_url(); ?>admin/hadith-book/update/"+$('#ddl_hadith_book_list').val(),"_self");
    });

  });

 </script>