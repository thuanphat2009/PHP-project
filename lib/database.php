<?php
$filepath = realpath(dirname(__FILE__));
include_once ($filepath.'/../config/config.php');
?>
<?php
class Database
{
    public $host = DB_HOST;
    public $user = DB_USER;
    public $pass = DB_PASS;
    public $dbname = DB_NAME;

    public $conn;
    public $error;
    public function __construct()
    {
        $this->connectDB();
    }
    private function connectDB()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if(!$this->conn){
            $this->error = "Connection Fail".$this->conn->connect_error;
            return false;
        }
    }
    // Select or read data
    public function select($query){
        $result = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    // Insert
    public function insert($query){
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($insert_row){
            return $insert_row;
        }else{
            return false;
        }
    }

    // Update
    public function update($query){
        $update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($update_row){
            return $update_row;
        }else{
            return false;
        }
    }

    // Delete
    public function delete($query){
        $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);
        if($delete_row){
            return $delete_row;
        }else{
            return false;
        }
    }
     //hàm thực hiện trả về một mảng danh sách kết quả
     public function select_to_array($query)
     {
         $rows = array();
         $result = $this->select($query);
         if ($result == false) return false;
         //duyệt mỗi dòng trong kết quả, lưu vào mảng
         while ($item = $result->fetch_assoc()) {
             $rows[] = $item;
         }
         return $rows;
     }
}
?>