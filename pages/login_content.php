<?php
if (isset($_POST['btn'])) {
    $obj_app->customer_login_check($_POST);
}

?>

<div class="container">

    <div class="row">

        <div class="col-md-6">
            <div class="well">
                <h3 class="text-center text-success"> new user please <a href="reservation.php">Register</a> first.<br> Login to confirm booking!</h3>
                <hr/>
                <form class="form-horizontal" role="form" action="" method="post">
                    <div class="form-group">
                        <label class="control-label col-md-3">Email Address</label>
                        <div class="col-md-9">
                            <input type="email" name="email_address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-9">
                            <input type="password" name="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-offset-3 col-md-9">
                            <input type="submit" name="btn" class="btn btn-success btn-block" value="Sign IN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
