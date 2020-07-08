<?php

class Admin {

    public function __constract() {
        $host_name = 'localhost';
        $user_name = 'root';
        $password = '';
        $db_name = 'db-hms';

        $con = mysqli_connect($host_name, $user_name, $password);
        if ($con) {
            $db_select = mysqli_select_db($con, $db_name);
            if ($db_select) {
                return $con;
            } else {
                die('Database not selected' . mysqli_error($con));
            }
        } else {
            die('Database connction fail' . mysqli_error($con));
        }
    }

    public function admin_login_check($data) {
        $con = $this->__constract();
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_admin WHERE email_address='$data[email_address]' AND password='$password' AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            $admin_info = mysqli_fetch_assoc($query_result);
            if ($admin_info) {
                session_start();
                $_SESSION['admin_id'] = $admin_info['admin_id'];
                $_SESSION['admin_name'] = $admin_info['admin_name'];
                header('Location: admin_master.php');
            } else {
                $message = "Please use valid email and password";
                return $message;
            }
        } else {
            die('Failed to login' . mysqli_error($con));
        }
    }

    public function admin_logout() {
        unset($_SESSION['admin_id']);
        unset($_SESSION['admin_name']);

        header('Location: index.php');
    }

    public function add_category_info($data) {
        $con = $this->__constract();
        $query = "INSERT INTO tbl_category(category_name,category_description,publication_status) VALUES('$data[category_name]','$data[category_description]','$data[publication_status]')";
        if (mysqli_query($con, $query)) {
            $message = "Room Category info added successfully";
            return $message;
        } else {
            die('Ops there is an error' . mysqli_error($con));
        }
    }

    public function select_all_category_info() {
        $con = $this->__constract();
        $query = "SELECT * FROM tbl_category WHERE deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Ops there is an error' . mysqli_error($con));
        }
    }

    function update_category_info($data) {
        $con = $this->__constract();
        $sql = "UPDATE tbl_category SET category_name='$data[category_name]', category_description='$data[category_description]',  publication_status='$data[publication_status]' WHERE category_id='$data[category_id]' ";
        if (mysqli_query($con, $sql)) {
            $_SESSION['message'] = " Category info updated successfully !";
            header('Location: manage_room_category.php');
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    function select_category_info_by_id($data) {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_category WHERE category_id='$data'";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function unpublished_category_info($category_id) {
        $con = $this->__constract();
        $query = "UPDATE tbl_category SET publication_status= 0 WHERE category_id='$category_id' ";
        if (mysqli_query($con, $query)) {
            $message = "Category info unpublished successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function published_category_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_category SET publication_status= 1 WHERE category_id='$data' ";
        if (mysqli_query($con, $query)) {
            $message = "Category info published successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function delete_category_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_category SET deletion_status=0 WHERE category_id='$data' ";
        if (mysqli_query($con, $query)) {
            $message = "Category info Deleted successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    function add_room_info($data) {
        $con = $this->__constract();
        $directory = '../assets/admin_assets/room_image/';
        $target_file = $directory . $_FILES['room_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['room_image']['size'];
        $check = getimagesize($_FILES['room_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['room_image']['tmp_name'], $target_file);
                        $query = "INSERT INTO tbl_room (room_name, room_num,category_id,room_short_des,room_long_des,room_price,room_image,publication_status)VALUES('$data[room_name]','$data[room_num]','$data[category_id]','$data[room_short_des]','$data[room_long_des]','$data[room_price]','$target_file','$data[publication_status]')";

                        if (mysqli_query($con, $query)) {
                            $message = 'Room info added successfully';
                            return $message;
                        } else {
                            die('Query problem' . mysqli_error($con));
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

    function select_all_room_info() {
        $con = $this->__constract();
        $query = "SELECT p.*,c.category_name FROM tbl_room as p,tbl_category as c WHERE p.category_id=c.category_id AND p.deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Ops there is an error' . mysqli_error($con));
        }
    }

    function select_all_room_info_by_id($data) {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_room WHERE room_id='$data'";
        if (mysqli_query($con, $sql)) {
            $query_result1 = mysqli_query($con, $sql);
            return $query_result1;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    function update_room_info($data) {
        $con = $this->__constract();
        $directory = '../assets/admin_assets/room_image/';
        $target_file = $directory . $_FILES['room_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['room_image']['size'];
        $check = getimagesize($_FILES['room_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['room_image']['tmp_name'], $target_file);
                        $query = "UPDATE tbl_room SET room_name='$data[room_name]', category_id='$data[category_id]', room_short_des='$data[room_short_des]', room_long_des='$data[room_long_des]',room_price='$data[room_price]', room_image='$target_file', publication_status='$data[publication_status]' WHERE room_id='$data[room_id]' ";
                        if (mysqli_query($con, $query)) {
                            $_SESSION['message'] = " Room info updated successfully !";
                            header('Location: manage_room.php');
                        } else {
                            die('Query problem' . mysqli_error($con));
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

    public function unpublished_room_info($room_id) {
        $con = $this->__constract();
        $query = "UPDATE tbl_room SET publication_status= 0 WHERE room_id='$room_id' ";
        if (mysqli_query($con, $query)) {
            $message = "Room info unpublished successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function published_room_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_room SET publication_status= 1 WHERE room_id='$data' ";
        if (mysqli_query($con, $query)) {
            $message = "Room info published successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
	
	  public function delete_room_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_room SET deletion_status=0 WHERE room_id='$data' ";
        if (mysqli_query($con, $query)) {
            $_SESSION['$message'] = "Room info Deleted successfully !";
            return $message;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
	

    function add_slider_info($data) {
        $con = $this->__constract();
        $directory = '../assets/admin_assets/slider_image/';
        $target_file = $directory . $_FILES['slider_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['slider_image']['size'];
        $check = getimagesize($_FILES['slider_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['slider_image']['tmp_name'], $target_file);
                        $query = "INSERT INTO tbl_slider (slider_title,slider_subtitle,special_offer,slider_image,publication_status)VALUES('$data[slider_title]','$data[slider_subtitle]','$data[special_offer]','$target_file','$data[publication_status]')";

                        if (mysqli_query($con, $query)) {
                            $message = 'Slider info added successfully';
                            return $message;
                        } else {
                            die('Query problem' . mysqli_error($con));
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

    function select_all_slider_info() {
        $con = $this->__constract();
        $query = "SELECT * FROM tbl_slider WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
	
    public function unpublished_slider_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_slider SET publication_status= 0 WHERE slider_id='$data' ";
        if (mysqli_query($con, $query)) {
            $_SESSION['$message'] = "Slider info unpublished successfully !";
             return $_SESSION['$message'];
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function published_slider_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_slider SET publication_status= 1 WHERE slider_id='$data' ";
        if (mysqli_query($con, $query)) {
             $_SESSION['$message']  = "Slider info published successfully !";
             return $_SESSION['$message'];
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
	
	  public function delete_slider_info($data) {
        $con = $this->__constract();
        $query = "UPDATE tbl_slider SET deletion_status=0 WHERE slider_id='$data' ";
        if (mysqli_query($con, $query)) {
            $_SESSION['$message'] = "Slider info Deleted successfully !";
           
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
	

	
    function update_slider_info($data) {
        $con = $this->__constract();
        $directory = '../assets/admin_assets/slider_image/';
        $target_file = $directory . $_FILES['slider_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['slider_image']['size'];
        $check = getimagesize($_FILES['slider_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['slider_image']['tmp_name'], $target_file);
                        $query = "UPDATE  tbl_slider SET slider_title='$data[slider_title]',slider_subtitle='$data[slider_subtitle]',special_offer='$data[special_offer]',slider_image='$target_file',publication_status='$data[publication_status]' WHERE slider_id='$data[slider_id]'";

                        if (mysqli_query($con, $query)) {
                            $message = 'Slider info Updated successfully';
                            return $message;
                        } else {
                            die('Query problem' . mysqli_error($con));
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }
	
	  function select_all_slider_info_by_id($data) {
        $con = $this->__constract();
        $query = "SELECT * FROM tbl_slider WHERE slider_id='$data'";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

       function add_gallery_info($data) {
        $con = $this->__constract();
        $directory = '../assets/admin_assets/gallery_image/';
        $target_file = $directory . $_FILES['gallery_image']['name'];
        $file_type = pathinfo($target_file, PATHINFO_EXTENSION);
        $file_size = $_FILES['gallery_image']['size'];
        $check = getimagesize($_FILES['gallery_image']['tmp_name']);
        if ($check) {
            if (file_exists($target_file)) {
                echo 'This image is exists. Please try again later.';
            } else {
                if ($file_type != 'jpg' && $file_type != 'png') {
                    echo 'Your file type is not valid. Please try again';
                } else {
                    if ($file_size > 512000) {
                        echo 'Your file sixe is too large. Pleas try again';
                    } else {
                        move_uploaded_file($_FILES['gallery_image']['tmp_name'], $target_file);
                        $query = "INSERT INTO tbl_gallery (gallery_name,gallery_des, gallery_date,gallery_image,publication_status)VALUES('$data[gallery_name]','$data[gallery_des]','$data[gallery_date]','$target_file','$data[publication_status]')";

                        if (mysqli_query($con, $query)) {
                            $message = 'Gallery info added successfully';
                            return $message;
                        } else {
                            die('Query problem' . mysqli_error($con));
                        }
                    }
                }
            }
        } else {
            echo 'Your upload file is not an image !. Please try again';
        }
    }

 function select_all_gallery_info() {
        $con = $this->__constract();
        $query = "SELECT * FROM tbl_gallery WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
}

?>