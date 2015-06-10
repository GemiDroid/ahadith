<fieldset>
  
  <div id="alert_message" class="alert" style="display: none;">
      <a href="#" class="close" data-dismiss="alert">&times;</a>
      <span></span>
  </div>
  
  <legend>Send Email Alerts</legend>
  
    <?php $attributes = array('class' => 'form-horizontal'); ?>
    <?php echo form_open( 'admin/subscriptions' , $attributes ); ?>
    
    <div class="form-group" >
      <label for="ddl_user_list" class="col-sm-2">Select Users:</label>
        <div class="col-sm-3">
          <select multiple class="form-control"  id="ddl_user_list" name="ddl_user_list[]">
            <?php if(!empty($users)): ?>
              <?php foreach($users as $row):?>
                <option value="<?php echo $row->email_address;?>" <?php echo set_select('ddl_user_list[]',$row->email_address ); ?> ><?php echo $row->user_id;?> </option>
              <?php endforeach; ?>
            <?php else: ?>
                <option>None</option>
            <?php endif; ?>
          </select>
        </div>
        
        <div class="helpline">
          <span class="text-error"></span>
        </div>
      </div>
  
    <div class="form-group" >
      <label for="ddl_hadith_book_id" class="col-sm-2">Select Hadith Book: </label>
      <div class="col-sm-4">
        <select class="form-control"  name ="ddl_hadith_book_id" id="ddl_hadith_book_id">
          <?php foreach($hadith_books as $row):?>
            <option value="<?php echo $row->hadith_book_id;?>" <?php echo set_select('ddl_hadith_book_id',$row->hadith_book_id ); ?> ><?php echo $row->hadith_book_title_en;?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <div class="form-group" >
      <label for="ddl_book_id" class="col-sm-2">Select Book: </label>
      <div class="col-sm-4">
        <select class="form-control"  name="ddl_book_id" id="ddl_book_id">
          <?php foreach($books as $row):?>
            <option value="<?php echo $row->book_id;?>" <?php echo set_select('ddl_book_id',$row->book_id ); ?> ><?php echo $row->book_title_en;?> </option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <div class="form-group" >
      <label for="ddl_chapter_id" class="col-sm-2">Select Chapter: </label>
      <div class="col-sm-4">
        <select class="form-control"  name="ddl_chapter_id" id="ddl_chapter_id">
          <?php foreach($chapters as $row):?>
            <option value="<?php echo $row->chapter_id;?>" <?php echo set_select('ddl_chapter_id',$row->chapter_id ); ?> ><?php echo substr( $row->chapter_title_en, 0, 20);?>&hellip;</option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
  
    <div class="form-group" >
      <label for="ddl_hadith_list" class="col-sm-2">Select Hadith: </label>
      <div class="col-sm-4">
        <select class="form-control"  name="ddl_hadith_list" id="ddl_hadith_list">
          <?php foreach($ahadith as $row):?>
            <option value="<?php echo $row->hadith_id;?>" <?php echo set_select('ddl_hadith_list',$row->hadith_id ); ?> ><?php echo $row->hadith_id ;?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    
    <button type="button" id="btn_preview_hadith" class="btn btn-primary">Preview Hadith</button>
    <button type="button" id="btn_email" name="btn_email" class="btn btn-primary">Send Email</button>  
    
  <?php echo form_close(); ?>

</fieldset>
  
<div id="previewModal" class="modal fade">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title">Preview Hadith</h4>
          </div>
          <div class="modal-body">
                <article id="<?php echo $ahadith[0]->hadith_id; ?>">
                  <p lang="AR"><?php echo $ahadith[0]->hadith_plain_ar; ?></p>
                  <p lang="EN"><?php echo $ahadith[0]->hadith_plain_en; ?></p>
                  <p lang="UR"><?php echo $ahadith[0]->hadith_plain_ur; ?></p>
                </article>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <!--<button type="button" class="btn btn-primary">Save changes</button>-->
          </div>
      </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">
  
  function hide_alert() {
      $('#alert_message').fadeOut('slow');
  } 
  
  function load_lists() {
        //prepare the data to be passed
        var result ={};
        result['task'] = 'ss';
        result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
        result['book_id'] = $('#ddl_book_id').val();
        result['chapter_id'] = $('#ddl_chapter_id').val();
        
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/subscriptions',
            data: { data: result },
            success: function(data) {
              data = $.parseJSON( data );
              $('#ddl_book_id').html(data.book_list);
              $('#ddl_chapter_id').html(data.chapter_list);
              $('#ddl_hadith_list').html(data.ahadith_list);
          }
        });
        
      }
  
  $(document).ready(function(){
  
    $('#btn_preview_hadith').on("click", function() {
      if ( $('#ddl_hadith_list').val() != '' ) {
        
        //prepare the data to be passed
        var result ={};
        result['task'] = 'hadith-preview';
        result['hadith_id'] = $('#ddl_hadith_list').val();
        
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/subscriptions',
            data: { data: result },
            success: function(data) {
              data = $.parseJSON( data );
              $('#previewModal').modal('show');
              $('article').html(data.hadith_html);
          }
        });
      }
    });
  
    $('#btn_email').on("click", function() {
      
      $('.text-error').text('');
      
      if ($('#ddl_user_list').val() == null){
        $('.text-error').text('Please select users.');
        return false;
      }
      
      //$('form').submit();
      
      //prepare the data to be passed
      var result ={};
      result['task'] = 'send-mail';
      result['arr_user_ids'] = $('#ddl_user_list').val();
      result['hadith_id'] = $('#ddl_hadith_list').val();
      
      //$('#alert_message').css('display','');
      
      $.ajax({
          type: "POST",
          url: '<?php echo base_url(); ?>admin/subscriptions',
          data: { data: result },
          beforeSend: function() {
              $('#alert_message span').text('Sending Email ...');
              $('#alert_message').removeClass('alert-success alert-danger');
              $('#alert_message').addClass('alert-warning').show();
          },
          success: function(data) {
            try{
              data = $.parseJSON( data );
              
              $('#alert_message span').text(data.message.body);
              $('#alert_message').removeClass('alert-warning');
              $('#alert_message').addClass('alert-'+data.message.type).show();
            }catch(e) {
              $('#alert_message span').text('An error occured ... Server responded with an error');
              $('#alert_message').addClass('alert-danger').show();
            }
        },
        error: function() {
          $('#alert_message span').text('An error occured ... Try again!');
          $('#alert_message').addClass('alert-danger').show();
        }
      });
      setTimeout("hide_alert()", 12000);
    });
      
      //$( "#ddl_hadith_book_id" ).on( "change", load_lists('hadith_book') );
      //$( "#ddl_book_id" ).on( "change", load_lists('book') );
      //$( "#ddl_chapter_id" ).on( "change", load_lists('chapter') );
      
      $('#ddl_hadith_book_id').on("change", function() {
        //prepare the data to be passed
        var result ={};
        result['task'] = 'hadith-book';
        result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
        result['book_id'] = $('#ddl_book_id').val();
        result['chapter_id'] = $('#ddl_chapter_id').val();
        
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/subscriptions',
            data: { data: result },
            success: function(data) {
              data = $.parseJSON( data );
              $('#ddl_book_id').html(data.book_list);
              $('#ddl_chapter_id').html(data.chapter_list);
              $('#ddl_hadith_list').html(data.ahadith_list);
          }
        });
      });
      
      $('#ddl_chapter_id').on("change", function() {
        //prepare the data to be passed
        var result ={};
        result['task'] = 'chapter';
        result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
        result['book_id'] = $('#ddl_book_id').val();
        result['chapter_id'] = $('#ddl_chapter_id').val();
      
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/subscriptions',
            data: { data: result },
            success: function(data) {
              data = $.parseJSON( data );
              $('#ddl_hadith_list').html(data.ahadith_list);
          }
        });
      });
      
      $('#ddl_book_id').on("change", function() {
        //prepare the data to be passed
        var result ={};
        result['task'] = 'book';
        result['hadith_book_id'] = $('#ddl_hadith_book_id').val();
        result['book_id'] = $('#ddl_book_id').val();
        result['chapter_id'] = $('#ddl_chapter_id').val();
        
        
        $.ajax({
            type: "POST",
            url: '<?php echo base_url(); ?>admin/subscriptions',
            data: { data: result },
            success: function(data) {
              data = $.parseJSON( data );
              $('#ddl_chapter_id').html(data.chapter_list);
              $('#ddl_hadith_list').html(data.ahadith_list);
          }
        });
      });
      
  });
</script>