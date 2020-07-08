<?php

$room_id = $_GET['room_id'];
$query_result1=$obj_admin->select_all_room_info_by_id($room_id);
$room_info=mysqli_fetch_assoc($query_result1);
$query_result = $obj_admin->select_all_category_info();
if (isset($_POST['btn'])) {
    $message = $obj_admin->update_room_info($_POST);
}
?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin_master.php">Home</a>
        <i class="icon-angle-right"></i> 
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Forms</a>
    </li>
</ul>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Rooms Here</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h2>
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h2>
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="edit_room_form">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label btn" for="typeahead">Room Name </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff ;width:50%" name="room_name" value="<?php echo $room_info['room_name']; ?>" class="span">
                            <input type="hidden" name="room_id" value="<?php echo $room_info['room_id']; ?>" class="span6 typeahead">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="selectError"> Room Category</label>
                        <div class="controls">
                        	
                            <select id="selectError" data-rel="chosen" name="category_id" style="background-color:#b3ccff ;width:50%">
                                <option>---Select Category Name---</option>
                                <?php while ($category_info = mysqli_fetch_assoc($query_result)) { ?>
                                    <option value="<?php echo $category_info['category_id']; ?>"><?php echo $category_info['category_name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label  btn" for="textarea2">Room Short Description</label>
                        <div class="controls ">
                            <textarea  id="" rows="8" style="background-color:  #b3ccff; width: 50%" name="room_short_des"><?php echo $room_info['room_short_des']; ?></textarea>
                        </div>
                    </div>

                    <div class="control-group hidden-phone">
                        <label class="control-label  btn" for="textarea2">Room Long Description</label>
                        <div class="controls ">
                            <textarea  id="" rows="8" style="background-color:  #b3ccff; width: 50%" name="room_long_des"><?php echo $room_info['room_long_des']; ?></textarea>
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label btn" for="typeahead">Room Price </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff ;width:50%" name="room_price" value="<?php echo $room_info['room_price']; ?>" class="span">
                        </div>
                    </div>

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Room Image</label>
                        <div class="controls">
                            <input style="background-color:#b3ccff ;width:50% " class="input focused" id="focusedInput" type="file" name="room_image">
                        </div>
                    </div>
                    
                    <div class="control-group">
                        <label class="control-label  btn" for="typeahead">Publication Status </label>
                        <div class="controls">
                            <select class="" name="publication_status" style="width: 50%; background-color:  #b3ccff">
                                <option>--publication status--</option>
                                <option value="1">Published</option>
                                <option value="0">Unpublished</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" name="btn">Save Room</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->
<script>
	document.forms['edit_room_form'].elements['publication_status'].value='<?php echo $room_info['publication_status']?>';
</script>