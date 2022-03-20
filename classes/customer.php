<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helper/format.php');
?>

<?php
    class customer{
        private $db;
        private $fm;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_customer($data){
            $connection = $this->db->conn;
            $name =$connection -> real_escape_string($data['name']);
            $email =$connection -> real_escape_string($data['email']);
            $pass =$connection -> real_escape_string(md5($data['pass']));

            if($name=="" ||  $email=="" || $pass==""){                                                                           
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                $check_email = "SELECT * FROM tbl_customer WHERE email='$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if($result_check){
                    $alert =  "<span class='text-danger'>Email đã tồn tại</span>"; 
                    return $alert;
                }else{
                    $query = "INSERT INTO tbl_customer(name,email,password) VALUES('$name','$email','$pass')";
                    $result = $this->db->insert($query);
                    if ($result){
                        $alert = "<span class='text-success'>Đăng Kí thành công</span>";             
                        return $alert;
                    }else{
                        $alert = "<span class='text-danger'>Đăng Kí thất bại</span>";
                        return $alert;            
                    }
                }
            }
        }
        public function login_customer($data){
            $connection = $this->db->conn;
            $email =$connection -> real_escape_string($data['email']);
            $pass =$connection -> real_escape_string(md5($data['password']));
            if($email=="" ||  $pass==""){                                                                           
                $alert =  "<span class='text-danger'>Không được để trống</span>"; 
                 return $alert;
            }else{
                $check_login = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$pass'";
                $result_check = $this->db->select($check_login);
                if($result_check != FALSE){
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login',true);
                    Session::set('customer_id',$value['Id']);
                    Session::set('customer_name',$value['name']);
                    echo "<script> window.location.href='products.php';</script>";
                }else{
                    $alert =  "<span class='text-danger'>Email hoặc Password không đúng</span>"; 
                    return $alert;
                }
            }
        }

}
?>