

<div class="col-md-9">
  
  
  <div style="float: left;">
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/hadith-book/add' , $attributes ); ?>

        <input type="submit" id="btn_add_new_hadith_book" name="btn_add_new_hadith_book" value="Add New Hadith Book" class="btn btn-primary"/>
        
        <?php echo form_close(); ?>

  </div>
  
  
     
            <div style="float:right;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/hadith-book/search/' , $attributes ); ?>
                <label for="ddl_hadith_book_list">Search Hadith Book by Title: </label>
       <?php if(!empty($hadith_books)):?>

              <select name="ddl_hadith_book_list">
                <?php foreach($hadith_books as $row):?>
                <option value="<?php echo $row->hadith_book_id;?>" <?php echo set_select('ddl_hadith_book_list',$row->hadith_book_id, ($row->hadith_book_id == '')? TRUE:FALSE ); ?> ><?php echo $row->hadith_book_title_en;?> </option>
                <?php endforeach; ?>
              </select>
              <?php endif;?>
          <input type="submit" id="btn_search" name="btn_search" value="Search" class="btn btn-success"/>
          
          <?php echo form_close(); ?>
          
          </div>
<div>&nbsp;</div> 
              
  <h3>Displaying All Hadith Books</h3>
  <table class="table table-bordered">
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
          
          <td><a href='<?php echo ('http://localhost/ahadith/admin/hadith-book/update/'.$hadith_book->hadith_book_id); ?>' >Edit</a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
            </div>
 </div>
