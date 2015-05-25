<div class="col-md-9" style="margin-top: 50px;">
  
  <div style="float:right;" class="control-group form-inline">
    
      <label for="ddl_chapter_list">Search Chapter by Title: </label>
      <?php if(!empty($ahadith)):?>
  
      <select class="form-control" style="width: 380px; height: 35px;" name="ddl_chapter_list" id="ddl_chapter_list">
      <?php foreach($ahadith as $row):?>
        <option value="<?php echo $row->chapter_id;?>" <?php echo set_select('ddl_chapter_list',$row->chapter_id,TRUE); ?> ><?php echo substr($row->chapter_title_en,0,40);?> </option>
      <?php endforeach; ?>
      </select>
      <?php endif;?>
    
     <button class="search-btn"><li class="glyphicon glyphicon-search"></li></button>  
  
  </div>

    
          
  <div>&nbsp;</div>
              
  <h4>Displaying All Chapters</h4>
  <hr>
  <table class="table table-bordered table-hover">
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
          <td><a href='<?php echo (base_url().'admin/chapter/update/'.$chapter->chapter_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
  
  
    
              <div style="float: left;">
                <?php $attributes = array('class' => 'form-horizontal'); ?>
                <?php echo form_open( 'admin/chapter/add' , $attributes ); ?>
          
          <input type="submit" id="btn_add_new_chapter" name="btn_add_new_chapter" value="Add New Chapter" class="btn btn-primary"/>
          
          <?php echo form_close(); ?>
          
              </div>
  
            </div>
 </div>
 
 <script type="text/javascript">
  
  $(document).ready(function(){

    $('.search-btn').on("click", function() {
      window.open("<?php echo base_url(); ?>admin/chapter/update/"+$('#ddl_chapter_list').val(),"_self");
    });

  });

 </script>
