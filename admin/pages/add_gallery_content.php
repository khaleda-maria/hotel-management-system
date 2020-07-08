
<?php
if (isset($_POST['btn'])) {
    $message = $obj_admin->add_gallery_info($_POST);
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
            <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Gallery Info Here</h2>
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
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <div class="control-group">
                        <label class="control-label btn" for="typeahead">Gallery Name </label>
                        <div class="controls">
                            <input type="text"style="background-color:#b3ccff ;width:50%" name="gallery_name" class="span">
                        </div>
                    </div>
                   


                    <div class="control-group hidden-phone">
                        <label class="control-label  btn" for="textarea2">Gallery Description</label>
                        <div class="controls ">
                            <textarea  id="" rows="8" style="background-color:  #b3ccff; width: 50%" name="gallery_des"></textarea>
                        </div>
                    </div>

                   
                       <div class="control-group">
                        <label class="control-label btn" for="typeahead">Date </label>
                        <div class="controls">
                            <input type="date"style="background-color:#b3ccff ;width:50%" name="gallery_date" class="span">
                        </div>
                    </div>
                   

                    <div class="control-group">
                        <label class="control-label" for="focusedInput">Gallery Image</label>
                        <div class="controls">
                            <input style="background-color:#b3ccff ;width:50% " class="input focused" id="focusedInput" type="file" name="gallery_image">
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
                        <button type="submit" class="btn btn-primary" name="btn">Save Gallery</button>
                        <button type="reset" class="btn">Reset</button>
                    </div>
                </fieldset>
            </form>   
        </div>
    </div><!--/span-->
</div><!--/row-->