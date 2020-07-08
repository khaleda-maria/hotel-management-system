
<?php
  $slider_id=$_GET['slider_id'];
    $query_result=$obj_admin->select_all_slider_info_by_id($slider_id);
    $slider_info=mysqli_fetch_assoc($query_result);
	
if (isset($_POST['btn'])) {
    $message = $obj_admin->update_slider_info($_POST);
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Update Sliders Here</h2>
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
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" name="edit_slider_form">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label btn" for="typeahead">Slider Title </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff;width:50%" name="slider_title" class="span" value="<?php echo $slider_info['slider_title']; ?>" >
                              <input class="input focused" id="focusedInput" type="hidden" name="slider_id" value="<?php echo $slider_info['slider_id']; ?>">
                        </div>
                    </div>
                      <div class="control-group">
                        <label class="control-label btn" for="typeahead">Slider Subtitle </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff;width:50%" name="slider_subtitle" class="span" value="<?php echo $slider_info['slider_subtitle']; ?>">
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label btn" for="typeahead">Special Offer </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff;width:50%" name="special_offer" class="span" value="<?php echo $slider_info['special_offer']; ?>">
                        </div>
                    </div>
                       
                  
                  <div class="control-group">
                        <label class="control-label" for="focusedInput">Slider Image</label>
                        <div class="controls">
                            <input style="background-color:#b3ccff ;width:50% " class="input focused" id="focusedInput" type="file" name="slider_image" >
                          
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
                        <button type="submit" class="btn btn-primary" name="btn">Update Slider</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->

<script>
	document.forms['edit_slider_form'].elements['publication_status'].value='<?php echo $slider_info['publication_status']?>';
</script>