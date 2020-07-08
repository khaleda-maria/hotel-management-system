<?php
if (isset($_GET['p_status'])) {
    $slider_id = $_GET['slider_id'];

    if ($_GET['p_status'] == 'unpublished') {
        $message = $obj_admin->unpublished_slider_info($slider_id);
    } else if ($_GET['p_status'] == 'published') {
        $message = $obj_admin->published_slider_info($slider_id);
    } else if ($_GET['p_status'] == 'delete') {
        $obj_admin->delete_slider_info($slider_id);
    }
}
$query_result = $obj_admin->select_all_slider_info();

?>

<ul class="breadcrumb">
    <li>
        <i class="icon-home"></i>
        <a href="admin_master.php">Home</a> 
        <i class="icon-angle-right"></i>
    </li>
    <li>
        <i class="icon-edit"></i>
        <a href="#">Manage Category</a>
    </li>
</ul>

<div class="row-fluid sortable">		
    <div class="box span12">
        <div class="box-header" data-original-title>
            <h2><i class="halflings-icon user"></i><span class="break"></span>slider Details</h2>
            <div class="box-icon">
                <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
            </div>
        </div>
        <div class="box-content">
            <h3>
                <?php
                if (isset($message)) {
                    echo $message;
                    unset($message);
                }
                ?>
            </h3>
            <h3>
                <?php
                if (isset($_SESSION['message'])) {
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                }
                ?>
            </h3>
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>
                        <th>Slider Title</th>
                        <th>Slider Subtitle </th>
                        <th>Special Offer</th>
                        <th>Slider Image</th>
                        <th>Publication Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    <?php while ($slider_info = mysqli_fetch_assoc($query_result)) { ?>
                        <tr>
                            <td align="center"><?php echo $slider_info['slider_title'] ?></td>
                            <td><?php echo $slider_info['slider_subtitle'] ?></td>
                            <td><?php echo $slider_info['special_offer'] ?></td>
               
                            <td><img src="<?php echo $slider_info['slider_image']; ?>" class="img-responsive"style="width: 100px;height: 80px;" alt=""/></td>
                            <td class="center">
                                <span class="label label-success">
                                    <?php
                                    if ($slider_info['publication_status'] == 1) {
                                        echo 'Published';
                                    } else {
                                        echo 'Unpublished';
                                    }
                                    ?>
                                </span>
                            </td>
                            <td class="center">
                                <a class="btn btn-info" href="view_slider.php?slider_id=<?php echo $slider_info['slider_id'] ?>" title="View">
                                 <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <?php if ($slider_info['publication_status'] == 1) { ?>
                                    <a class="btn btn-success" href="?p_status=unpublished&slider_id=<?php echo $slider_info['slider_id'] ?>" title="Unpublished">
                                
                                      <i class="fa fa-arrow-up" aria-hidden="true"></i>

                                    </a>
                                <?php } else { ?>
                                    <a class="btn btn-danger" href="?p_status=published&slider_id=<?php echo $slider_info['slider_id'] ?>" title="Published">
                                      <i class="fa fa-arrow-down" aria-hidden="true"></i>

                                    </a>
                                <?php } ?>
                                <a class="btn btn-info" href="edit_slider.php?slider_id=<?php echo $slider_info['slider_id'] ?>">
                               <i class="fa fa-pencil" aria-hidden="true"></i>


                                </a>
                                <a class="btn btn-danger" href="?p_status=delete&slider_id=<?php echo $slider_info['slider_id'] ?>" title="delete" onclick="return check_delete();">
                                  <i class="fa fa-trash" aria-hidden="true"></i>

                                </a>
                            </td>
                        </tr>
                    <?php } ?>


                </tbody>

            </table>            
        </div>
    </div><!--/span-->
</div>