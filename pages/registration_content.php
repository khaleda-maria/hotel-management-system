
<?php
if (isset($_POST['register'])) {
$obj_app->save_customer_info($_POST);
header('Location:login_menu.php');
 }

?>
<div class="container">
<div class="row">
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