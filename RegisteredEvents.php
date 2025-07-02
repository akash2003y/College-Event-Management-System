<?php
require_once 'utils/header.php';
require_once 'utils/styles.php';

$usrname=$_POST['usrname'];


include_once 'classes/db1.php';

$result = mysqli_query($conn, "SELECT * FROM registered r,events e where  r.usrname= '$usrname' and r.event_id=e.event_id");

?>
<!DOCTYPE html>
<html>
<body>
<div class = "content">
            <div class = "container">
            <h1> Registered Events</h1>
             <?php
if (mysqli_num_rows($result) > 0) {
?> 
                <table class="table table-hover" >
                    <thead>
                        <tr>
                            
                            <th>Event_name</th>             
                           <th>Student Co-ordinator</th>
                            <th>Staff Co-ordinator</th>
                           
                            <th>Date</th>
                        
                            <th>Time</th>
                            <th>location </th>
                          
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    $i=0;
                    while($row = mysqli_fetch_array($result)) {

                            echo '<tr>';
                            echo '<td>' . $row['event_title'] . '</td>';                    
                            echo '<td>' . $row['st_name'] . '</td>';
                            echo '<td>' . $row['name'] . '</td>';
                           
                            echo '<td>'.$row['Date'].'</td>';
                            echo '<td>'.$row['time'].'</td>';
                            echo '<td>'.$row['location'].'</td>';
                            
                         
                            echo '</tr>';  

                            $i++;
                        }
                      
                        ?>
                    </tbody>
                </table>
                    <?php }
                    else{
                    echo 'Not Yet Rgistered any events';
                    
                    }?>
                
               
            </div>
        </div>

                
               
            </div>
        </div>
                </body>
        <?php include 'utils/footer.php'; ?> 
        </html>