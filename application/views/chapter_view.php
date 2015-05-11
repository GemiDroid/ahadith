
            
            <div class="col-md-9">
              
              
              <div style="float: left;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/chapter/add' , $attributes ); ?>
          
          <input type="submit" id="btn_add_new_chapter" name="btn_add_new_chapter" value="Add New Chapter" class="btn btn-primary"/>
          
          <?php echo form_close(); ?>
          
              </div>
              
              
            <div style="float:right;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/chapter/search/' , $attributes ); ?>
                <label for="ddl_chapter_list">Search Chapter by Title: </label>
       <?php if(!empty($ahadith)):?>

              <select name="ddl_chapter_list">
                <?php foreach($ahadith as $row):?>
                <option value="<?php echo $row->chapter_id;?>" <?php echo set_select('ddl_chapter_list',$row->chapter_id, ($row->chapter_id == '')? TRUE:FALSE ); ?> ><?php echo $row->chapter_title_en;?> </option>
                <?php endforeach; ?>
              </select>
              <?php endif;?>
          <input type="submit" id="btn_search" name="btn_search" value="Search" class="btn btn-success"/>
          
          <?php echo form_close(); ?>
          
          </div>
        
    
          
          <div>&nbsp;</div>
              
  <h3>Displaying All Chapters</h3>
  <table class="table table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>ID</th>
        <th>Arabic Title</th>
        <th>English Title</th>
        <th>Urdu Title</th>
        <th>Arabic Detail</th>
        <th>English Detail</th>
        <th>Urdu Detail</th>
        <th>Book ID</th>
        <th>Hadith Book ID</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($ahadith)):?>

      <?php foreach($ahadith as $chapter): ?>
        <tr>
          <td><?php echo $chapter->chapter_id; ?></td>
          <td><?php echo $chapter->chapter_title_ar; ?></td>
          <td><?php echo $chapter->chapter_title_en; ?></td>
          <td><?php echo $chapter->chapter_title_ur; ?></td>
          <td><?php echo $chapter->chapter_detail_ar; ?></td>
          <td><?php echo $chapter->chapter_detail_en; ?></td>
          <td><?php echo $chapter->chapter_detail_ur; ?></td>
          <td><?php echo $chapter->book_id; ?></td>
          <td><?php echo $chapter->hadith_book_id; ?></td>
          <td><a href='<?php echo ('http://localhost/ahadith/admin/chapter/update/'.$chapter->chapter_id); ?>' >Edit</a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
            </div>
 </div>
