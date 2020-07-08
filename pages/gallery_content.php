<?php 
$query_result = $obj_app -> select_all_published_gallery_info();
?>
    <section class="section-gallery">
        <h2 class="hidden" >Gallery section</h2>
        <div class="container">
            <div class="gallery-container">
            	<?php while ($gallery_info=mysqli_fetch_assoc($query_result)) { ?>
                <div class="row gallery-row">
                    <div class="col-md-6">
                        <a href="gallery-single.html"><img src="admin/<?php echo $gallery_info['gallery_image'] ?>" class="img-centered img-responsive" data-animate="fadeIn" alt="gallery-1"></a>
                    </div>
                    <div class="col-md-6">
                        <p class="desc"><?php echo $gallery_info['gallery_name'] ?></p>
                        <h3 class="content"><?php echo $gallery_info['gallery_des'] ?></h3>
                        <div class="date"><i class="fa fa-calendar-o"></i><?php echo $gallery_info['gallery_date'] ?></div>
                        <a href="gallery-single.html" class="button secondary transparent">Detail</a>
                    </div>
                </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-12 page-controls text-center">
                        <a href="#" class="button secondary transparent"><i class="fa fa-chevron-left"></i> </a>
                        <a href="#" class="button secondary transparent">1</a>
                        <a href="#" class="button ">2</a>
                        <a href="#" class="button secondary transparent">3</a>
                        <a href="#" class="button secondary transparent"><i class="fa fa-chevron-right"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    