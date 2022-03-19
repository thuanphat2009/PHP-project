<?php
    include '../lib/database.php';
    include '../helper/format.php';
?>

<?php
    class brand{
        private $db;
        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_brand($brandName){
            $brandName = $this->fm->validation($brandName);
            $connection = $this->db->conn;
            if(empty($brandName)){
                $alert =  "<span class='text-danger'>Brand must be not empty</span>"; 
                 return $alert;
            }else{
                $query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName')";
                $result = $this->db->insert($query);
                if ($result){
                    $alert = "<span class='text-success'>Insert Brand Successfully</span>";             
                    return $alert;
                }else{
                    $alert = "<span class='text-danger'>Insert Brand Not Success</span>";
                    return $alert;            
             }
            
        }
    }
    public function show_brand(){
        $query = "SELECT * FROM tbl_brand order by brandId desc";
        $result = $this->db->select($query);
        return $result;
    }
    public function update_brand($brandName,$id){
        $brandName = $this->fm->validation($brandName);
        $connection = $this->db->conn;
        $brandName =$connection -> real_escape_string($brandName);
        $id =$connection -> real_escape_string($id);
   
        if(empty($brandName)){
            $alert =  "<span class='text-danger'>Brand must be not empty</span>"; 
             return $alert;
        }else{
            $query = "UPDATE tbl_brand SET brandName = '$brandName' WHERE brandId = '$id'";
            $result = $this->db->update($query);
            if ($result){
                $alert = "<span class='text-success'>Update Brand Successfully</span>";             
                return $alert;
            }else{
                $alert = "<span class='text-danger'>Update Brand Not Success</span>";
                return $alert;            
         }
        
    }
    }
    public function del_brand($id){
        $query = "DELETE FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->delete($query);
        if ($result){
            $alert = "<span class='text-success'>Delete Brand Successfully</span>";             
            return $alert;
        }else{
            $alert = "<span class='text-danger'>Delete Brand Not Success</span>";
            return $alert;            
     }
    }
    public function getbrandbyId($id){
        $query = "SELECT * FROM tbl_brand WHERE brandId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }         
}
?>