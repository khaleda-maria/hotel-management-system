<?php

session_start();

class Application {

    //put your code here
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

    public function customer_login_check($data) {
        $con = $this->__constract();
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_customer WHERE email_address='$data[email_address]' AND password='$password' AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            $customer_info = mysqli_fetch_assoc($query_result);
            if ($customer_info) {
                session_start();
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['Customer_name'] = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
                header('Location: bill.php');
            } else {
                $message = "Please use valid email and password";
                return $message;
            }
        } else {
            die('Failed to login' . mysqli_error($con));
        }
    }
    
    public function customer_login_check__from_menu($data) {
        $con = $this->__constract();
        $password = md5($data['password']);
        $query = "SELECT * FROM tbl_customer WHERE email_address='$data[email_address]' AND password='$password' AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            $customer_info = mysqli_fetch_assoc($query_result);
            if ($customer_info) {
                session_start();
                $_SESSION['customer_id'] = $customer_info['customer_id'];
                $_SESSION['Customer_name'] = $customer_info['first_name'] . ' ' . $customer_info['last_name'];
                header('Location: index.php');
            } else {
                $message = "Please use valid email and password";
                return $message;
            }
        } else {
            die('Failed to login' . mysqli_error($con));
        }
    }

    public function select_all_published_category_info() {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_category WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_all_published_room_info() {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_room WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $sql)) {
            $query_result1 = mysqli_query($con, $sql);
            return $query_result1;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    function select_all_room_info_by_id($room_id) {
        $con = $this->__constract();
        $sql = "SELECT r.*,c.category_name FROM tbl_room as r,tbl_category as c WHERE r.category_id=c.category_id AND r.deletion_status=1 AND  r.room_id='$room_id' ";
        if (mysqli_query($con, $sql)) {
            $query_result1 = mysqli_query($con, $sql);
            return $query_result1;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_room_info_by_category_id($category_id) {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_room WHERE category_id='$category_id' AND publication_status=1 AND deletion_status= 1 ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_all_published_slider_info() {
        $con = $this->__constract();
        $sql = "SELECT * FROM tbl_slider WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $sql)) {
            $query_result1 = mysqli_query($con, $sql);
            return $query_result1;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function save_reservation_info($data) {
        $con = $this->__constract();
        $sql = "INSERT INTO tbl_reservation (`arrival_date`, `departure_date`,total_room, `category_id`, `adult`, `children`) VALUES ('$data[arrival_date]', '$data[departure_date]','$data[total_room]' ,'$data[category_id]','$data[adult]', '$data[children]')";
        if (mysqli_query($con, $sql)) {
          if (isset($_SESSION['customer_id'] ) ){
             header('Location: bill.php'); 
          }else{
             header('Location: login.php');  
          }
           
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    public function select_all_reservation_info() {
        $con = $this->__constract();
        $sql = "SELECT r.*,c.category_name, ro.room_price FROM tbl_reservation as r, tbl_category as c,tbl_room as ro WHERE r.category_id=ro.category_id AND r.category_id=c.category_id AND r.deletion_status=1 ";
        if (mysqli_query($con, $sql)) {
            $query_result = mysqli_query($con, $sql);
            return $query_result;
        } else {
            die('Querry problem' . mysqli_error($con));
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

    public function save_customer_info($data) {
        $con = $this->__constract();
        $password = md5($data['password']);
        $sql = "INSERT INTO tbl_customer (first_name, last_name, email_address, password, address, phone_number) VALUES ('$data[first_name]', '$data[last_name]', '$data[email_address]', '$password', '$data[address]', '$data[phone_number]')";
        if (mysqli_query($con, $sql)) {
            $customer_id = mysqli_insert_id($con);
            $_SESSION['customer_id'] = $customer_id;
            $_SESSION['customer_name'] = $data['first_name'] . ' ' . $data['last_name'];

            header('Location:login.php');
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }

    function select_all_published_gallery_info() {
        $con = $this->__constract();
        $query = "SELECT * FROM tbl_gallery WHERE publication_status=1 AND deletion_status=1";
        if (mysqli_query($con, $query)) {
            $query_result = mysqli_query($con, $query);
            return $query_result;
        } else {
            die('Query problem' . mysqli_error($con));
        }
    }
    
    public function save_booking_info($data){
          header('Location: customer_home_page.php');
    }



  public function customer_logout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
     
        
        header('Location: index.php');
    }
}