<div class="col-md-9">
              
  <h3>Displaying All Reports</h3>
  
  <?php if(!empty($reports)): ?>
  <table class="table table-bordered">
    <thead style="background-color: #AABB78;">
      <tr>
        <th>Error Id</th>
        <th>Error Text</th>
        <th>User ID</th>
        <th>Hadith Id</th>
        <th>Time</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      

      <?php foreach($reports as $report): ?>
        <tr>
          <td><?php echo $report->error_id; ?></td>
          <td><?php echo $report->error_text; ?></td>
          <td><?php echo $report->user_id; ?></td>
          <td><?php echo $report->hadith_id; ?></td>
          <td><?php echo $report->timestamp; ?></td>
          <td><a href="<?php echo base_url().'admin/report/update/'.$report->error_id; ?>">Edit</a></td>
        </tr>
      <?php endforeach; ?>

      
    

    </tbody>
  </table>
  
  <?php else:
    echo 'No Reports Found';
    
    endif; ?>
  
    </div>
 </div>
