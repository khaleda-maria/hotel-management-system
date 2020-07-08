<?php 

$query_result=$obj_app->select_all_published_slider_info();
?>


    <div id="main-slider" class="slider">
        <div class="swiper-container">
            <h2 class="hidden">Main Slider</h2>
            <div class="swiper-wrapper">
                <!-- Slide 01 -->
                <?php while($slider_info=mysqli_fetch_assoc($query_result)){?>
                <div class="swiper-slide" style="background: url('admin/<?php echo $slider_info['slider_image'] ?>') center top/cover no-repeat">
                    <div class="container">
                        <div class="slide-content">
                            <div class="slide-subtitle" data-animate="fadeInRight"><?php echo $slider_info['slider_subtitle'] ?></div>
                            <h3 class="slide-title" data-animate="fadeInDown"><strong><?php echo $slider_info['slider_title'] ?></strong> Room</h3>
                            <div class="slide-divider" data-animate="fadeInRight"></div>
                            <div class="slide-subtitle-italic" data-animate="fadeInRight" data-delay="300">bringing to you the best experience from only <span class="price"><?php echo $slider_info['special_offer'] ?></span> / night</div>
                            <a href="#" class="button transparent" data-animate="fadeInRight" data-delay="300">Get this offer</a>
                        </div>
                    </div>
                </div>
                 <?php }?>
                <!-- Slide 02 -->
         
            </div>
        </div>
        <div class="main-slider-control prev"><i class="icon-prev"></i></div>
        <div class="main-slider-control next"><i class="icon-next"></i></div>
        <div class="container">
            <div class="page-controls centered clearfix">
            </div>
        </div>
    </div>
   