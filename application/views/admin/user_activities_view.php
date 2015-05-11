<div class="col-md-9">
              
          
  <h3>Displaying All User Activities</h3>
  
  <?php if(!empty($user_activities)): ?>
  <table class="table table-bordered">
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

      <?php foreach($user_activites as $row): ?>
        <tr>
          <td><?php echo $row->user_activity_log_id; ?></td>
          <td><?php echo $row->user_id; ?></td>
          <td><?php echo $row->log_time; ?></td>
          <td><?php echo $row->log_query; ?></td>
          
        </tr>
      <?php endforeach; ?>

    <?php endif;?>

    </tbody>
  </table>
  
  <?php else:
    echo 'No Activities Found'; ?>
  <?php endif;?>
    </div>
 </div>
