<?php
$query_result = $obj_app -> select_all_reservation_info();
//$query_result1=$obj_app->select_category_info_by_id();


?>
<head>
    <style>
		table tr {
			padding: 2px;
		}
		table tr th, td {
			padding: 20px;
		}
    </style>
</head>

<div class="container">
    <h2>Here is your Bill</h2>
    <div class="row">
        <table border="1">
            <tr>
                <th>Room Category</th>
                <th>Number Of Rooms</th>
                <th>Number Of Days</th>
                <th>Price Per Room</th>
                <th>Total Bill</th>

            </tr>
            <?php  $res_info = mysqli_fetch_assoc($query_result)  ?>
                <tr>
                    <td><?php echo $res_info['category_name'] ?></td>
                    <td><?php echo $res_info['total_room'] ?></td>


                <td><?php
				$s_date = $res_info['arrival_date'];
				$d_date = $res_info['departure_date'];
				$date1 = date_create("$s_date");
				$date2 = date_create("$d_date");
				$diff = date_diff($date1, $date2);
				$d_diff=$diff -> format("%a days");
				echo $d_diff;
                ?></td>

              
                        <td><?php echo $res_info['room_price'] ?></td>
                        <td><h4><?php 
                        $total= $res_info['total_room']* $d_diff*$res_info['room_price'];
						echo $total;
                        
                         ?></h4></td>

                    </tr>
           
        </table>
    </div>

</div>


<?php

if (isset($_POST['btn'])) {
     $obj_app->save_booking_info($_POST);
  
}
?>
<div class="container">

    <div class="row">
        <form action="" method="post">
                
            <table>
                <tr>
                    <td>      <h4> Select how do u want to pay:</h4></td>
                </tr>
          
                <tr>
                    <td>Cash On Delivery</td>
                    <td><input type="radio" value="1" name="payment_type"></td>
                      
                </tr>
                <hr/>
                      <tr>
                    <td>BKash</td>
              <td><input type="radio" value="2" name="payment_type"></td>
                     
                </tr>
                <tr>
                    <td> <input type="submit" name="btn" value="Confirm Payment" ></td>
               
                </tr>
            </table>
        </form>
    </div>
</div>