<script>
    function ajax_email_check(x, y) {
        
        var xmlhttp=new XMLHttpRequest();
        var server_page='email_search.php?email='+x;
        xmlhttp.open('GET', server_page);
        xmlhttp.onreadystatechange = function () {
            if(xmlhttp.readyState == 4 && xmlhttp.status ==200) {
                document.getElementById(y).innerHTML=xmlhttp.responseText;
            }
        }
        xmlhttp.send(null);
    }
</script>

<?php
$room_id = $_GET['room_id'];
if (isset($_POST['btn'])) {
 $message = $obj_app->save_reservation_info($_POST);
}
$query_result1=$obj_app->select_all_published_room_info();
$query_result=$obj_app->select_all_published_category_info();
 if(isset($_POST['register'])){
$obj_app->save_customer_info($_POST);
header('Location:login.php');
 }

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
                <div class="col-lg-4 col-md-5 ">
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
                                            <option>---Select Category---</option>
                                <?php while ($category_info = mysqli_fetch_assoc($query_result)) { ?>
                                    <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                               <?php } ?>
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
                <div class="col-lg-8 col-md-7">
                    <h3 class="hidden">Registration form</h3>
                    <div class="reservation-container">
                        <img src="assets/front_end_assets/images/booking.jpg" class="img-centered img-responsive" alt="booking-background" data-animate="fadeIn">
                        <div class="reservation-form">
                            <form class="form-horizontal" role="form" action="" method="post">
                                <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label" >First name *</label>
                                        <input type="text" class="form-control" name="first_name">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label " >Last name *</label>
                                        <input type="text" class="form-control" name="last_name">
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label">Email *</label>
                                        <input type="email" class="form-control"name="email_address" onblur="ajax_email_check(this.value, 'res'" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label">Password *</label>
                                        <input type="text" class="form-control" name="password" >
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label">Address *</label>
                                        <textarea type="text" class="form-control" name="address"></textarea>
                                    </div>
                                </div>
                                 <div class="col-xs-6">
                                    <div class="">
                                        <label class="control-label">Phone *</label>
                                        <input type="number" class="form-control" name="phone_number" >
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="text-center buttons-container">
                                       
                                        <button class="button third" type="submit" name="register">Register</button>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

  