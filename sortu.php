<?php
session_start();
include('adminwrk.php');
$sot = $_POST['by'];
$id = $_SESSION['userdata']['user_id'];

     ?>
     <h3 class="text-center">All Rides</h3>
            
            <table id='tbl' class="container-fluid col-lg-10 mr-lg-2 table table-responsive table-hover table-bordered table-striped">
                <thead>
                <th onclick="sortTable(0,tbl)">Ride Date ⇩</th>
                <th>Pickup Point</th>
                <th>Drop Point</th>
                <th>Cab Type</th>
                <th onclick="sortTablen(4,tbl)">Distance ⇩</th>
                <th onclick="sortTablen(5,tbl)">Luggage ⇩</th>
                <th onclick="sortTablen(6,tbl)">Ride Fare ⇩</th>
                <th>Status</th>
                <th>User id</th>
                <th>Cancel</th>
                <th>Invoice</th>
                </thead>
                <tbody id='tblc'>

                <?php
                
                    $adm = new user();
                    $admc = new dbcon();
                    $show = $adm->sort($sot,$id,$admc->connect());
                    foreach($show as $key=>$val)
                    {
                    echo "<tr><td>".$val['ride_date']."</td><td>".$val['from_distance']."</td><td>".$val['to_distance']."</td><td>".$val['cab_type']."</td><td>".$val['total_distance']." Km</td><td>".$val['luggage']." Kg</td><td>".$val['total_fare']."</td><td>";
                    if($val['status']==1)
                    {
                        echo "Pending</td>";
                    }
                    if($val['status']==0)
                    {
                        echo "Canceled</td>";
                    }
                    if($val['status']==2)
                    {
                        echo "Completed</td>";
                    }
                    echo  "<td>".$val['customer_user_id']."</td>"; 

                    if($val['status']==1)
                    {
                        echo "<td><a class='btn btn-warning' href='allrides.php?action=blk&id=".$val['ride_id']."'>Cancel</a></td>";
                    
                    }
                    else{
                        echo "<td><a class='btn btn-warning disabled' >Cancel</a></td>";
                    
                    }
                    if($val['status']==2)
                    {
                        echo "<td><a class='btn btn-info' href='invoiceu.php?id=".$val['ride_id']."'>Invoice</a></td>";
                    }
                    else{
                        echo "<td><a class='btn btn-info disabled'>Invoice</a></td>";
                    }
                    }
                
              echo  '</tbody></table>';


?>