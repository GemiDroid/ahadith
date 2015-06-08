<div class="col-md-9" style="margin-top: 50px;">
              
  <fieldset>
    <legend>All Reports</legend>
  <?php if(!empty($reports)): ?>
  <table class="table table-bordered table-hover">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Error Id</th>
        <th>Error Text</th>
        <th>User ID</th>
        <th>Hadith Id</th>
        <th>Time</th>
        <th>Fixed by</th>
        <th>Fixed Comments</th>
        <th>Fixed Time</th>
      </tr>
    </thead>
    <tbody>
      

      <?php foreach($reports as $report): ?>
        <tr class="<?php  if(empty($report->fixed_by) ): echo 'danger'; endif;  ?>">
          <td><?php echo $report->error_id; ?></td>
          <?php if(empty($report->fixed_by)): ?>
          <td><a href="<?php echo base_url().'admin/report/update/'.$report->error_id; ?>"><?php echo $report->error_text; ?></a></td>
          <?php else: ?>
          <td><?php echo $report->error_text; ?></td>
          <?php endif; ?>
          <td><?php echo $report->user_id; ?></td>
          <td><?php echo $report->hadith_id; ?></td>
          <td><?php echo $report->timestamp; ?></td>
          <td><?php echo $report->fixed_by; ?></td>
          <td><?php echo $report->fixed_comments; ?></td>
          <td><?php echo $report->fixed_timestamp; ?></td>
          <!--<td><a href="<?php echo base_url().'admin/report/update/'.$report->error_id; ?>"><li class="glyphicon glyphicon-pencil"></li></a></td>-->
        </tr>
      <?php endforeach; ?>

      
    

    </tbody>
  </table>
 
  <?php else:
    echo 'No Reports Found';
    
    endif; ?>
   </fieldset>
    </div>
 </div>
