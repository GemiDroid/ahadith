<div class="col-md-9">
              
          
  <h3>Displaying All User Activities</h3>
  
  <?php if(!empty($user_activities)): ?>
  <table class="table table-bordered" id="tbl_activity_logs">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Activity ID:</th>
        <th>User ID:</th>
        <th>Log Time</th>
        <th>Log Query</th>
      </tr>
    </thead>
    <tbody>
      <?php if(!empty($user_activities)):?>

      <?php foreach($user_activities as $row): ?>
        <tr>
          <td><?php echo $row->user_activity_log_id; ?></td>
          <td><?php echo $row->user_id; ?></td>
          <td><?php echo $row->log_time; ?></td>
          <td>
            <?php
            $queries =  json_decode($row->log_query);
            foreach( $queries as $query ):
                $query = (string) $query;
                
                //replace special chars with space
                $query = preg_replace("/[\r\n]+/", " ", $query);
                
                //getting length of table with is btw ``
                $len = ( strpos($query, '` ') - (strpos($query, ' `') + 2) );
                echo "<p class='query_text' style='cursor: pointer;'>" . substr($query, 0, strpos($query , ' ') ) . " " . substr($query, strpos($query, '`') + 1, $len) . "<span style='display: none;'>" . $query . "</span></p>";
            endforeach;
          ?>
          </td>
          
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
  
  <?php else:
    echo 'No Activities Found'; ?>
  <?php endif;?>
    </div>
  
    
  <!--Pop up Model-->  
  <div id="modal_queries" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title">Complete Query Text</h4>
				</div>
				<div class="modal-body">
					<div id="txt_queries" name="txt_queries" style="margin-bottom: 30px;"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div><!-- /.modal-content -->
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->  

 </div>
 <script type="text/javascript">
    $(document).ready(function() {
        
        $('table#tbl_activity_logs tbody td:last-child p.query_text').mousedown(function(e) {
            
            //limit the event to this cell only
            e.cancelBubble = true;
            if (e.stopPropagation) e.stopPropagation();
            
            //perform action on right click only
            if (e.which == 3) {
                var temp = $(this).children().text();
                $('#modal_queries #txt_queries').text( temp );
                
                //delay so that right click is not shown
                setTimeout("$('#modal_queries').modal()", 100);
                setTimeout("$('textarea#txt_queries').focus()", 500);
                
                //prevent the default right click behaviour
                e.preventDefault();
                return false;
            }
        });
        
        //disable default right-click on query text
        $('table#tbl_activity_logs tbody td:last-child p.query_text').bind("contextmenu", function(e) { return false; });
        
    });
</script>
