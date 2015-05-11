
         <style type="text/css">
            .blue{
                background-color: lightblue;
            }
            
            .red{
                background-color: red;
            }
            
            .white{
                background-color: none;
            }
         </style>   
            <div class="col-md-9">
                <h3>View All Users</h3>
                <table class="table table-bordered">
                    <tbody>
                        <thead style="background-color: #AABB78;">
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Country Code</th>
                        <th>Active</th>
                        <th>User Since</th>
                        <th>Last Activity</th>
                        <th>Action</th>
                        </thead>
 
                            
                         <?php foreach($users as $user): ?>           
                    
                        <tr class='<?php if($user->admin_role == TRUE): echo "blue"; elseif($user->is_active=='1'): echo "white"; else: echo "red"; endif; ?>'>
                      
                            <td><?php echo $user->user_id; ?></td>
                            <td><?php echo $user->password; ?></td>
                            <td><?php echo $user->email_address; ?></td>
                            <td><?php echo $user->full_name; ?></td>
                            <td><?php echo $user->date_of_birth; ?></td>
                            <td><?php echo $user->gender; ?></td>
                            <td><?php echo $user->country_code; ?></td>
                            <td><?php echo $user->is_active; ?></td>
                            <td><?php echo $user->user_since; ?></td>
                            <td><?php echo $user->last_activity; ?></td>
                            
                            <td><a href='<?php echo ('http://localhost/ahadith/admin/user/'.$user->user_id); ?>' >Edit</a></td>
                     
                        </tr>
                                    
        
                          
                            <?php endforeach; ?>
                    </tbody>
                </table>
                
            </div>
            
        </div>
