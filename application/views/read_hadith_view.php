  <div class="row">
            
            <div class="col-md-2">
                <h3>Dashboard</h3>
                <table class="table table-bordered">
                    <tbody>
                       
                        <tr><td><a href="<?php echo base_url().'admin/tags' ?>">Tags</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/users' ?>">Users</a></td></tr>
                        <tr><td><a href="">User Activities</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'admin/ahadith' ?>">Hadith</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'hadith_book' ?>">Hadith Book</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'chapter' ?>">Chapter</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'authenticity' ?>">Authenticity</a></td></tr>
                        <tr><td><a href="<?php echo base_url().'book' ?>">Book</a></td></tr>
                        
                    </tbody>
                </table>
            </div>
            
            <div>&nbsp;</div>
            <div>&nbsp;</div>
            <div class="col-md-10">
  <h3>Reading a hadith</h3>
  <table border="1">
    <thead>
      <tr>
        <th>ID</th>
        <th>Arabic Plain</th>
        <th>English Plain</th>
        <th>Urdu Plain</th>
        <th>Arabic Mark</th>
        <th>English Mark</th>
        <th>Urdu Mark</th>
        <th>Raw</th>
        <th>Authenticity</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        <tr>
          <td><?php echo $hadith->hadith_id; ?></td>
          <td><?php echo $hadith->hadith_plain_ar; ?></td>
          <td><?php echo $hadith->hadith_plain_en; ?></td>
          <td><?php echo $hadith->hadith_plain_ur; ?></td>
          <td><?php echo $hadith->hadith_marked_ar; ?></td>
          <td><?php echo $hadith->hadith_marked_en; ?></td>
          <td><?php echo $hadith->hadith_marked_ur; ?></td>
          <td><?php echo  $hadith->hadith_raw_ar; ?></td>
          <td><?php echo $hadith->authenticity_id; ?></td>
          
          <td><a href="<?php echo base_url().'admin/hadith/update/'.$hadith->hadith_id; ?>">Edit</a></td>
        </tr>

    </tbody>
  </table>
            </div>
  </div>
