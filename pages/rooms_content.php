<?php
$query_result1 = $obj_app -> select_all_published_room_info();
//$query_result=$obj_admin->select_all_published_category_info();
?>
    <section class="section-style-2 section-check-rooms">
        <h2 class="hidden" >Rooms section</h2>
        <div class="container">
            <h3 class="title" >Check Availability</h3>
            <div class="section-starter"></div>
            <div class="row">
                <div class="search-form">
                    <form class="check-rooms ">
                        <div class="col-md-3">
                        <div class="form-group ">
                            <label>Arrival Date</label><br>
                            <input class="form-control datepicker" data-theme="primary" >
                        </div>
                        </div>
                        <div class="col-md-3">
                        <div class="form-group ">
                            <label>Departure Date</label><br>
                            <input class="form-control datepicker">
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <label>Adults</label><br>
                            <select class="form-control form-select" data-theme="primary">
                                <option>1</option>
                                <option selected="selected">2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                            <label >Children</label><br>
                            <select class="form-control form-select">
                                <option>0</option>
                                <option selected="selected">1</option>
                                <option>2</option>
                                <option>3</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group text-center">
                            <button type="submit" class="button">Check Now</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
              
            <div class="row">
                <h3 class="hidden">Rooms list</h3>
                <?php while ($room_info=  mysqli_fetch_assoc($query_result1)) { ?>
                <div class="col-md-4">
                    
                    <div class="room-box">
                        <img src="admin/<?php echo $room_info['room_image']; ?>" class="img-centered img-responsive" data-animate="fadeIn" alt="room-1">
                        <h4 class="title-big">Room <strong><?php echo $room_info['room_name']; ?></strong> </h4>
                        <p class="content"><?php echo $room_info['room_long_des']; ?></p>
                        <a href="room_details.php?room_id=<?php echo $room_info['room_id']; ?>" class="button secondary transparent">Details</a>
                    </div>
                     
                </div>
                <?php } ?>
            </div>
             
        </div>
    </section>