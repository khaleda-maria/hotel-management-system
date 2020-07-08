    
<?php
$room_id = $_GET['room_id'];
$query_result1 = $obj_app->select_all_room_info_by_id($room_id);
$room_info = mysqli_fetch_assoc($query_result1);

if (isset($_POST['btn'])) {
 $message = $obj_app->save_reservation_info($_POST);
}

//$query_result = $obj_app->select_room_info_by_category_id($category_id);
?>

<section class="section-booking">
    	      
                    
        <h2 class="hidden">Booking section</h2>
        <div class="container">
        	     <h3>
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h3>
            <div class="row">
                <div class=" col-md-offset-2 col-md-8" >
                    <h3 class="hidden">Check date form</h3>
                    <div class="widget-box ">
                        <div class="widget-title">Your Reservation Information</div>
                        <em >Booking Online System</em>
                        <hr>
                  <form class="check-rooms vertical third" action="" method="post">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="form-group ">
                                        <label >Arrival Date</label>
                                        <input type="date" class="form-control  " name="arrival_date" data-theme="primary">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label >Departure Date</label>
                                        <input type="date" class="form-control  " name="departure_date" data-theme="primary">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            	 <div class="col-xs-4">
                                    <div class="form-group ">
                                        <label >Total Room</label>
                                        <select class="form-control third" name="total_room">
                                            <option>0</option>
                                            <option selected="selected">1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label >Rooms Category</label>
                                        <select name="category_id" class="form-control third">
                                           
                              
                                    <option value="<?php echo $category_info['category_id']; ?>"><?php echo $room_info['category_name']; ?></option>
                               
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row">
                            	<div class="col-xs-6">
                            		 <div class="form-group">
                                        <label >Cost Per Room </label>
                                         
                                        <input type="number" class="form-control  " name="room_price" data-theme="primary" value="<?php if(isset($category_info['category_name'])){ echo $room_info['room_price']; }?>">
                                       
                                    </div>
                            	</div>
                            </div> -->
                             
                            <hr >
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <br>
                                        <label class="room-num"><i class="fa fa-plus-circle"></i> Persons: </label>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group ">
                                        <label>Adults</label>
                                        <select class="form-control third" name="adult">
                                            <option>1</option>
                                            <option selected="selected">2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group ">
                                        <label >Children</label>
                                        <select class="form-control third" name="children">
                                            <option>0</option>
                                            <option selected="selected">1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
<!--                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group ">
                                        <br>
                                        <label class="room-num"><i class="fa fa-plus-circle"></i>Room 2</label>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group ">
                                        <label>Adults</label>
                                        <select class="form-control third">
                                            <option>1</option>
                                            <option selected="selected">2</option>
                                            <option>3</option>
                                            <option>4</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group ">
                                        <label >Children</label>
                                        <select class="form-control third">
                                            <option>0</option>
                                            <option selected="selected">1</option>
                                            <option>2</option>
                                            <option>3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>-->
                            <hr >
                            <div class="text-center">
                                <button type="submit" class="button" name="btn">Book Now!</button>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                </div>
    </section>