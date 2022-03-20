<?php
    $filepath = realpath(dirname(__FILE__));  
    include_once ($filepath.'/../lib/session.php');
    Session::checkLogin(); 
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>

<?php
    class adminLogin{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($adminUser,$adminPass){
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);
            $connection = $this->db->conn;
            $adminUser =$connection -> real_escape_string($adminUser);
            $adminPass =$connection -> real_escape_string($adminPass);
            $query = "SELECT * FROM tbl_admin WHERE adminUSer = '$adminUser' AND adminPass = '$adminPass' LIMIT 1";
            $result = $this->db->select($query);
            if($result != false){
                $value = $result->fetch_assoc();
                Session::set('adminlogin',true);
                Session::set('adminID',$value['adminID']);
                Session::set('adminName',$value['adminName']);
                Session::set('adminUser',$value['adminUSer']);
                header('Location:dashboard.php');
            }
            else{
                $alert = 'Sai tài khoản hoặc mật khẩu!!!';
                return $alert;
            }
        }
    }
?>