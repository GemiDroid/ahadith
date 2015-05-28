
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
            <div class="col-md-9" style="margin-top: 50px;">
               <fieldset>
                <legend>Displaying All Users</legend>
                <table class="table table-bordered table-hover">
                    
                        <thead style="background-color: #AABB78;">
                           <tr>
                        <th>User ID</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th>Full Name</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Country Code</th>
                        <th>Active</th>
                        <th>User Since</th>
                        <th>Last Activity</th>
                        <th>Action</th>
                        </thead>
                        </tr>
                        <tbody>        
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
                            
                            <td><a href='<?php echo (base_url().'admin/user/'.$user->user_id); ?>' ><li class="glyphicon glyphicon-pencil"></li></a></td>
                     
                        </tr>
                                    
        
                          
                            <?php endforeach; ?>
                    </tbody>
                </table>
                </fieldset>
            </div>
            
        </div>
