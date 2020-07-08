<?php 
if(isset($_GET['status'])) {
    $obj_app->customer_logout();
}
    
?>   

<header >
        <div class="container">
            <a href="#" class="logo-link"><img class="logo" src="assets/front_end_assets/images/logo.png" alt="Logo" height="50" width="150"></a>
            <nav class="main-menu clearfix">
                <h2 class="hidden">Main Menu</h2>
                <ul>
                    <li class="menu-item">
                        <a href="index.php">Home</a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="rooms.php">Rooms</a>
                      
                    </li>
                    <li class="menu-item">
                        <a href="facilities.php">Facilities</a>
                    </li>
                    <li class="menu-item">
                        <a href="reservation.php">Reservation</a>
                        
                    </li>
                    <li class="menu-item">
                        <a href="gallery.php">Gallery</a>
                        
                    </li>
                 
                    <li class="menu-item">
                        <a href="contact.php">Contact</a>
                    </li>
                    
                    <?php if (isset($_SESSION['customer_id'] ) ) { ?>
                    <li class="menu-item" ><a href="?status=logout">Log Out</a></li> 
                    <?php } else { ?>
                <li class="menu-item">
                        <a href="login_menu.php">login</a>
                    </li>
                     <li class="menu-item">
                        <a href="registration.php">Sign Up</a>
                    </li>
                    <?php } ?>
                     
                </ul>
            </nav>

            <div id="menu-toggle">
                <div class="bar first"></div>
                <div class="bar second"></div>
                <div class="bar third"></div>
            </div>
        </div>

        <nav id="mobile-menu">
            <h2 class="hidden">Mobile Navigation Menu</h2>
            <ul>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="#">Home<i class="toggle-state-icon icon-angle-right"></i></a>
                    <ul class="submenu">
                        <li class="sub-menu-item"><a href="index1.html">Home Version 1</a></li>
                        <li class="sub-menu-item"><a href="index2.html">Home Version 2</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="about.html">About</a>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="#">Rooms<i class="toggle-state-icon icon-angle-right"></i></a>
                    <ul class="submenu">
                        <li class="sub-menu-item"><a href="rooms.html">Rooms List</a></li>
                        <li class="sub-menu-item"><a href="room-single.html">Room single</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="facilities.html">Services</a>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="#">Booking<i class="toggle-state-icon icon-angle-right"></i></a>
                    <ul class="submenu">
                        <li class="sub-menu-item"><a href="booking-choose-date.html">Choose Date</a></li>
                        <li class="sub-menu-item"><a href="booking-choose-room.html">Choose Room</a></li>
                        <li class="sub-menu-item"><a href="booking-reservation.html">Reservation</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="#">Gallery<i class="toggle-state-icon icon-angle-right"></i></a>
                    <ul class="submenu">
                        <li class="sub-menu-item"><a href="gallery.html">Gallery</a></li>
                        <li class="sub-menu-item"><a href="gallery-single.html">Gallery Single</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="#">Blog<i class="toggle-state-icon icon-angle-right"></i></a>
                    <ul class="submenu">
                        <li class="sub-menu-item"><a href="blog1.html">Blog Version 1</a></li>
                        <li class="sub-menu-item"><a href="blog2.html">Blog Version 2</a></li>
                        <li class="sub-menu-item"><a href="blog-single.html">Blog Single</a></li>
                    </ul>
                </li>
                <li class="mobile-menu-item">
                    <a class="menu-item" href="contact.html">Contact</a>
                </li>
            </ul>
        </nav>
        </header>