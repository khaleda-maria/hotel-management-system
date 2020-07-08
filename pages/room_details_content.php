<?php
$room_id = $_GET['room_id'];
$query_result1 = $obj_app->select_all_room_info_by_id($room_id);
$room_info = mysqli_fetch_assoc($query_result1);

//$query_result = $obj_app->select_room_info_by_category_id($category_id);
?>
<h2> Single Room Details</h2>
<table>

    <tr>
        <td><b>Room Name:</b> </td>
        <td><h4><?php echo $room_info['room_name']; ?></h4></td>
    </tr>
    <br />

    <tr>
    <tr>
        <td> <b>Room Number:</b> </td>
        <td><h4><?php echo $room_info['room_num']; ?></h4></td>
    </tr>
    <br />
    <tr>


        <td><b>Room Category: </b></td>
        <td><h4><?php echo $room_info['category_name']; ?></h4></td>
    </tr>
    <br />
    <tr>
        <td><b>Room Image: </b></td>
        <td><img src="admin/<?php echo $room_info['room_image']; ?>" class="img-centered img-responsive" data-animate="fadeIn" alt="room-1"></td>
    </tr>
    <br />
    <tr>
        <td><b>Room Short Description: </b> </td>
        <td><h4><?php echo $room_info['room_short_des']; ?></h4></td>
    </tr>
    <br />
    <tr>
        <td><b>Room Long Description: </b></td>
        <td><h4><?php echo $room_info['room_long_des']; ?></h4></td>
    </tr>
    <br />
    <tr>
        <td><b>Room Price: </b></td>
        <td><h4><?php echo $room_info['room_price']; ?></h4></td>
    </tr>
    <tr>
      
        <td style="padding: 20px;"><a href="reservation_by_room_id.php?room_id=<?php echo $room_info['room_id']; ?>" class="button secondary transparent">Book Now</a></h4></td>
    </tr>
    <br />

</table>

